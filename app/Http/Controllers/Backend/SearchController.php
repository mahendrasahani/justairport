<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Client;
use App\Models\Backend\Driver;
use App\Models\Backend\DriverAccount;
use App\Models\Backend\Job;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $job_number = $request->job_number;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $jobs = Job::with(['getJobStatus', 'getDriver', 'getPaymentType', 'getAccount', 'getAirport']);
        if ($job_number != '') {
            $jobs = $jobs->where('job_number', $job_number);
        }
        if ($start_date != '' && $end_date != '') {
            $jobs = $jobs->whereBetween('job_date', [$start_date, $end_date]);
        }
        $jobs = $jobs->orderBy('id', 'desc')->get();
        return view('backend.search.search_job', compact('jobs'));
    }

    public function searchJob(Request $request)
    {
        $query = $request->input('query');
        $results = User::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->get();
        return view('search.results', compact('results'));
    }

    public function searchByNumber(){
        return view('backend.search.search_by_number');
    }

    public function searchByNumberData(Request $request)
    {
        try {
            $job_number = $request->job_number;
            $jobs = Job::with(['getClient'])->where('job_number', 'LIKE', $job_number . '%')->get();
            return response()->json([
                "status" => "success",
                "data" => $jobs
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function searchbyreferenceData(Request $request)
    {
        try {
            $ref_number = $request->ref_number;
            $jobs = Job::where('ref', 'LIKE', $ref_number . '%')->get();
            return response()->json([
                "status" => "success",
                "data" => $jobs
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function client(Request $request){
        $name = $request->name;
        $jobs = Job::get();
        $clients = Client::get();
        return view('backend.search.for_client', compact('jobs', 'clients'));
    }

    public function clientSearch(Request $request){
        try {
            $client_name = $request->client_name;
            $client_number = $request->client_number;
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $jobs = Job::with(['getClient', 'getAccount', 'getPaymentType', 'getCarCategory'])->whereHas('getClient', function ($query) use ($client_name, $client_number) {
                $query->where('name', 'LIKE', $client_name . '%')->where('phone', 'LIKE', $client_number . '%');
            })->whereBetween('job_date', [$from_date, $to_date])
                ->get();
            return response()->json([
                "status" => "success",
                "data" => $jobs
            ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    "status" => "failed",
                    "error" => $e->getMessage()
                ], 400);
            }
    }

  

    public function searchbydatetime()
    {
        return view('backend.search.search_by_date_time');
    }

    public function searchbydatetimeData(Request $request)
    {
        try {
            $job_date = $request->job_date;
            $job_time = $request->job_time;
            $jobs = Job::where('job_date', $job_date)->where('job_time',  $job_time)->get();
            return response()->json([
                "status" => "success",
                "data" => $jobs
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function searchByTelephonist(){
        return view('backend.search.search_by_telephonist');
    }

    public function searchbyreference()
    {
        return view('backend.search.search_by_x_reference');
    } 
    
    public function getAllClient(Request $request)
    {
        $limit = $request->input('limit', 10);
        $clients = Client::select('phone')->paginate($limit);
        return response()->json([
            'client' => $clients
        ]);
    }

    public function searchForDriver(Request $request){
        // return $request;   
        if ($request->from_date != '' && $request->to_date != '') { 
            $c_s = $request->c_s;
            $from_date = Carbon::createFromFormat('d/m/Y', trim($request->from_date))->format('Y-m-d');
            $to_date = Carbon::createFromFormat('d/m/Y', trim($request->to_date))->format('Y-m-d');     
            // $from_date = Carbon::parse($request->from_date)->format('Y-m-d');
            // $to_date = Carbon::parse($request->to_date)->format('Y-m-d');
            $driver_id = '';
            $driver = Driver::where('call_Sign', $c_s)->first();
            if ($c_s != '') {
                $driver_id = $driver->id;
            }
            $driver_account = DriverAccount::where('start_date', $from_date)->where('end_date', $to_date)->where('driver_id', $driver_id)->first();

            $jobs = Job::with('getJobStatus')->where('driver_id', $driver_id)
                ->where('topi_job', 0);
            if ($from_date != '' && $to_date != '') {
                $jobs = $jobs->whereBetween('job_date', [$from_date, $to_date]);
            }
            $jobs = $jobs->get();

            $calculation = Job::select(
                DB::raw('SUM(jobs.total_price) as total_amount'), //total amount of all jobs
                DB::raw('SUM(drop_off_charge) as total_drop_off_charge'), // drop of charge
                DB::raw('SUM(CASE WHEN account_id = 2 AND job_status_type_id != 4 AND job_status_type_id != 7 THEN jobs.total_price ELSE 0 END) as cash_collection'), // total amount of cash jobs except No Pickup and Canceled job status 
                DB::raw('SUM(CASE WHEN account_id = 3 AND job_status_type_id != 4 AND job_status_type_id != 7 THEN jobs.total_price ELSE 0 END) as card_collection'), //total amount of online jobs (card jobs) except No Pickup and Canceled job status
                DB::raw('SUM(CASE WHEN job_status_type_id = 4 THEN jobs.total_price ELSE 0 END) as canceled_collection'), // all canceled jobs total amount
                DB::raw('SUM(CASE WHEN job_status_type_id = 7 THEN jobs.total_price ELSE 0 END) as nopickup_collection'), // all no_pickup jobs total amount
                DB::raw('SUM(CASE WHEN account_id = 2 THEN cash_parking ELSE 0 END) as cash_parking_collection'), // only cash jobs parking amount
                DB::raw('SUM(price_details.congestion_charges) as total_congestion_charge'), // all jobs total congestion charge amount
                DB::raw('SUM(price_details.parking_charges) as total_parking_charges'), // all jobs total parking charge
                DB::raw('SUM(parking_collected) as total_amount_parking_collection'), // Total amount of all jobs parking collection from driver
                DB::raw('COUNT(CASE WHEN account_id != 2 THEN 1 END) as count_acc_and_online_jobs'), // online jobs and account jobs total count
                DB::raw('COUNT(CASE WHEN topi_job = 1 THEN 1 END) as count_topi_jobs'), // total topi jobs count
                DB::raw('SUM(CASE WHEN topi_job = 1 THEN jobs.total_price END) as total_topi_jobs_amount'), // total amount of all topi jobs
                DB::raw('SUM(CASE WHEN account_id != 2 AND account_id != 3 AND job_status_type_id != 4 AND job_status_type_id != 7 THEN jobs.total_price ELSE 0 END) as account_collection'), // only account jobs total amount except No Pickup and Canceled job status 
                'drivers.balance as driver_b_f', // amount to driver balance from driver table
            )
                ->leftjoin('price_details', 'jobs.price_detail_id', '=', 'price_details.id')
                ->leftjoin('drivers', 'jobs.driver_id', '=', 'drivers.id')
                ->where('driver_id', $driver_id)
                ->whereBetween('job_date', [$from_date, $to_date])
                ->groupBy('drivers.balance')
                ->get();

            // return $calculation;

            return view(
                'backend.search.for_driver',
                compact(
                    'jobs',
                    'driver_account',
                    'calculation',
                    'from_date',
                    'to_date',
                    'driver',
                    'c_s'
                )
            );





            /////////////////////

        }else{
            $jobs = [];
            $driver_account = [];
              return view('backend.search.for_driver', compact('jobs', 'driver_account'));
        }
    }


    public function driverAccount(Request $request){ 
                $driver_code =  $request->driver_code;
                $start_date =  $request->start_date;
                $end_date =  $request->end_date;
                $total_job_count =  $request->total_job_count;
                $total_job_amount =  $request->total_job_amount;
                $congestion_charge =  $request->congestion_charge;
                $drop_off_charge =  $request->drop_off_charge;
                $parking_charge =  $request->parking_charge;
                $hotel_commission =  $request->hotel_commission;
                $driver_earning =  $request->driver_earning;
                $rate = $request->rate;
                $rent =  $request->rent;
                $count_acc_and_online_jobs =  $request->count_acc_and_online_jobs;
                $count_topi_jobs =  $request->count_topi_jobs;
                $driver_b_f =  $request->driver_b_f;
                $parking_adjustment =  $request->parking_adjustment;
                $commission_adjustment =  $request->commission_adjustment;
                $other_adjustment =  $request->other_adjustment;
                $adjustment_detail =  $request->adjustment_detail;
                $total_payable =  $request->total_payable;
                $payment_type =  $request->payment_type;
                $payment_detail =  $request->payment_detail;
                $payment =  $request->payment;
                $balance_c_f =  $request->balance_c_f;
                $remark =  $request->remark;

            $driver = Driver::where('call_Sign', $driver_code)->first();
             DriverAccount::create([
                "driver_code" => $driver_code,
                "start_date" => $start_date,
                "end_date" => $end_date,
                "total_jobs_count" => $total_job_count,
                "total_jobs_amount" => $total_job_amount,
                "congestion_charge" => $congestion_charge,
                "drop_off_charge" => $drop_off_charge,
                "parking_charge" => $parking_charge,
                "hotel_commission" => $hotel_commission,
                "driver_earning" => $driver_earning,
                "rate_percent" => $rate,
                "rent" => $rent,
                "accounts_count" => $count_acc_and_online_jobs,
                "topi_jobs_count" => $count_topi_jobs,
                "driver_b_f" => $driver_b_f,
                "parking_adjustment" => $parking_adjustment,
                "commission_adjustment" => $commission_adjustment,
                "other_adjustments" => $other_adjustment,
                "adjustment_detail" => $adjustment_detail,
                "total" => $total_payable,
                "payment_type" => $payment_type,
                "payment_details" => $payment_detail,
                "payment" => $payment,
                "balance_c_f" => $balance_c_f,
                "remark" => $remark,
                "driver_id" => $driver->id
             ]); 
             Driver::where('id', $driver->id)->update(['balance' => $balance_c_f]);
             return back();
    }


}