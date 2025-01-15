<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\SendInvoicePdfMail;
use App\Models\Backend\Account;
use App\Models\Backend\Client;
use App\Models\Backend\Invoice;
use App\Models\Backend\Job;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DB;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index(){ 
        return view('backend.invoice.index', compact('client'));
    }
    public function create(Request $request){ 
        $account_list = Account::get(); 
        $job_type = $request->job_type;
        $start_date = $request->start_date;
        $end_date = $request->end_date; 
        $selected_client = $request->selected_client;
        $job_number = $request->job_number;
        $invoice_number = $request->invoice_number;
         $account_ids = [];
        $temp_data = [];

        if($job_type == 'job'){
         $job = Job::select('*');
         if($start_date != '' && $end_date != ''){
            $job = $job->whereBetween('job_date', [$start_date, $end_date]);
            } 
            if($selected_client != 'all_client'){
                $job = $job->where('account_id', $selected_client);
            }
            if($job_number != ''){
                $job = $job->where('job_number', $job_number);
            }
            $jobs = $job->where('invoice_flag', 0)->get();
 
            $account_ids = $jobs->pluck('account_id')->unique()->toArray();

           $result = Account::with('getJob')->whereIn('id', $account_ids)->get(); 
 
           $result = Account::with(['getJob' => function($job) use ($job_number) {
            if ($job_number != '') {
                $job->where('job_number', $job_number);
            }
            }])->whereIn('id', $account_ids)->get(); 
            }elseif($job_type == 'invoice'){ 
                $invoice = Invoice::select('*');
                if($start_date != '' && $end_date != ''){
                    $invoice = $invoice->whereBetween('created_at', [$start_date, $end_date]);
                }  
                if($selected_client != 'all_client'){
                    $invoice = $invoice->where('account_id', $selected_client);
                }
                if($invoice_number != ''){
                    $invoice = $invoice->where('invoice_number', $invoice_number);
                } 
                $result = $invoice = $invoice->with('getAccount')->get();
            }else{
                $result = Job::get();
            }
        return view('backend.invoice.create', compact('account_list', 'result'));
    }

    public function handleInvoice($id, $result_type, $job_ids){
         $data = [];
         $lastInvoice_number = DB::table('invoices')->max('invoice_number');  
         $newInvoice_number = $lastInvoice_number ? $lastInvoice_number + 1 : 9001;  
         
         $job_ids = explode(',', $job_ids);
        $account = Account::where('id', $id)->first();
        $invoice_date = Carbon::now()->format('d-m-Y');
        
        $total_amount = 0;
        $total_waiting_minutes = 0;
        $total_waiting_charges = 0;
        $adjustment = 0;
        $jobs = Job::with(['getCarCategory', 'getClient', 'getAirport', 'getAirportPickupLocation', 'getPriceDetail'])->whereIn('id', $job_ids)->get();
        foreach($jobs as $job){
            $total_amount += $job->total_price;
            $total_waiting_minutes += $job->wating_time;
            $total_waiting_charges += $job->getPriceDetail?->waiting_charge;
            $adjustment += $job->getPriceDetail?->adjustment;
        }
 
        $data['vat_amount'] = ($total_amount*20)/100;
        $data['job_ids'] = $job_ids;
        $data['account_detail'] = $account;
        $data['invoice_date'] = $invoice_date;
        $data['invoice_number'] = $newInvoice_number;
        $data['total_amount'] = $total_amount;
        $data['total_waiting_minutes'] = $total_waiting_minutes;
        $data['total_waiting_charges'] = $total_waiting_charges;
        $data['adjustment'] = $adjustment;
        $data['jobs'] = $jobs;
        $imagePath = public_path('assets/backend/images/brand_logo.png');
        $type = pathinfo($imagePath, PATHINFO_EXTENSION);
        $data['logo_base64'] = 'data:image/' . $type . ';base64,' . base64_encode(file_get_contents($imagePath));
       
        $html = view('backend.invoice.invoice_pdf', compact('data'))->render(); 
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); 
        $dompdf->render(); 
        $output = $dompdf->output();
        $pdfFilePath = 'invoices/invoice_'.$invoice_date.'_' . $newInvoice_number . '.pdf';
        $full_name = 'invoice_'.$invoice_date.'_' . $newInvoice_number . '.pdf';
        $fullPath = public_path($pdfFilePath);
        file_put_contents($fullPath, $output);
        $invoice_date = Invoice::create([
            "invoice" => $pdfFilePath,
            "invoice_number" => $newInvoice_number,
            "job_count" => count($job_ids),
            "account_id" => $id,
            "total_amount" => $total_amount
        ])->created_at;
        $data['invoice_date'] = $invoice_date;
        
        // Job::whereIn('id', $job_ids)->update([
        //     "invoice_flag" => 1
        // ]); 
            $invoice_pdf_data = [
                "message" => "Please find the attachment.",
                 "account_name" => $account->account_name,
                 "account_number" => $account->account_number,
                 "invoice_date" => $invoice_date,
                 "path" => 'public/invoices/'.$full_name,
                 "attachment_name" => $full_name
            ];
        Mail::to('anil.digitaldesign@gmail.com')->send(new SendInvoicePdfMail($invoice_pdf_data));
        return redirect()->back();     

        // return 'success';
        // return view('backend.invoice.invoice_pdf', compact('data'));
    }

    public function search(){
        return view('backend.invoice.search');
    }
    public function setting(){
        return view('backend.invoice.setting');
    }

    public function invoicePdf(){ 
        $clients = Client::paginate(50); 
        $job_type = 'job';
        $start_date = '$request->start_date';
        $end_date = ''; 
        $selected_client = 'all_client';
        $job_number = '';
        $invoice_number = '';
         $account_ids = [];
        $temp_data = [];
        $result_type = '';

         $job = Job::select('*');
         if($start_date != '' && $end_date != ''){
            $job = $job->whereBetween('job_date', [$start_date, $end_date]);
            } 
            if($selected_client != 'all_client'){
                $job = $job->where('client_id', $selected_client);
            }
            if($job_number != ''){
                $job = $job->where('job_number', $job_number);
            }

            if($job_type == 'job'){
            $jobs = $job->where('invoice_flag', 0)->get(); 
            $result_type = 'job';
            }elseif($job_type == 'invoice'){
                $jobs = $job->where('invoice_flag', 1)->get();
                $result_type = 'invoice';
            }else{
                $jobs = $job->get();
            }
            // else{  
            //     $job = Job::select('*');
            //         if($start_date != '' && $end_date != ''){
            //         $job = $job->whereBetween('job_date', [$start_date, $end_date]);
            //         } 
            //         if($selected_client != 'all_client'){
            //             $job = $job->where('client_id', $selected_client);
            //         }
            //         if($job_number != ''){
            //             $job = $job->where('job_number', $job_number);
            //         }
            // }
            foreach($jobs as $job){
                $account_ids[] = $job->account_id;  
            }

           $accounts = Account::with('getJob')->whereIn('id', $account_ids)->get();
            $temp_data['result'] = $accounts;
            $temp_data['resutl_type'] = $result_type;
            // return $temp_data;

        // $data = [
        //     'title' => 'Welcom to JustAirports',
        //     'date' => Carbon::now()
        // ];
        // $pdf = Pdf::loadView('backend.invoice.invoice_pdf', $data); 
        // $filename = 'invoice_' . Str::random(10) . '.pdf'; 
        // $pdf->save(public_path('invoices/' . $filename));
        // -----------------------------------------------------------------------------
        // Store the file path in the database (assuming you have an `invoices` table)
        // $invoice = new Invoice(); // Replace with your model
        // $invoice->file_path = 'storage/invoices/' . $filename;
        // $invoice->save(); 
        // Return the view if needed
        return view('backend.invoice.invoice_pdf');
    }
    
    // return $pdf->download('disney.pdf'); 
    public function viewPdfTest(){
        return view('backend.invoice.invoice_pdf_test');
    }



}
