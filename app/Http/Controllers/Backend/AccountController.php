<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Account;
use App\Models\Backend\AccountStatusType;
use DB;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function accounts(){
        $accounts = Account::with('getAccountStatusType')->get();
        $account_status = AccountStatusType::get();
        // return $accounts;   
        return view('backend.accounts.accounts', compact('accounts', 'account_status'));
    }

    public function getAccountWithAccNo(Request $request){
        try{
            $id = $request->id;
            $accounts = Account::with(['getAccountStatusType', 'getClient'])->where('id', $id)->first();
            if($accounts!=null || $accounts!=""){
                return response()->json([
                    "status" => "success",
                    "data" => $accounts
                ], 200);
            }else{
                return response()->json([
                    "status" => "no_record_found", 
                ], 200);
            } 
        }catch(\Exception $e){
            return response()->json([
                "status" => "something_went_wrong",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function getAccountwithAccName(Request $request){
        try{
            $acc_name = $request->acc_name;
            $accounts = Account::where('account_name', 'LIKE', '%'.$acc_name.'%')->get();
            if(count($accounts) > 0){
                return response()->json([
                    "status" => "success",
                    "data" => $accounts
                ], 200);
            }else{
                return response()->json([
                    "status" => "no_record_found", 
                ], 200);
            } 
        }catch(\Exception $e){
            return response()->json([
                "status" => "something_went_wrong",
                "error" => $e->getMessage()
            ], 400);
        }
        
    }
    public function getAccountwithAccDName(Request $request){
        try{
            $acc_d_name = $request->acc_d_name;
            $accounts = Account::where('display_name', 'LIKE', '%'.$acc_d_name.'%')->get();
            if(count($accounts) > 0){
                return response()->json([
                    "status" => "success",
                    "data" => $accounts
                ], 200);
            }else{
                return response()->json([
                    "status" => "no_record_found", 
                ], 200);
            } 
        }catch(\Exception $e){
            return response()->json([
                "status" => "something_went_wrong",
                "error" => $e->getMessage()
            ], 400);
        }
        
    }

    public function users(){
        $app_user = DB::table('tbl_app_users')->get();
        return view('backend.accounts.users', compact('app_user'));
    }

    public function admins()
    {
        return view('backend.accounts.admins');
    }

    public function viewAccounts(Request $request){
        $id = $request->id;
        $account = Account::with('getAccountStatusType')->where('id', $id)->first();
        return response()->json([
            "status" => "success",
            "account" => $account
        ]);
    }

    public function editAccounts(Request $request){
        $id = $request->id;
        $account = Account::with('getAccountStatusType')->where('id', $id)->first();
        return response()->json([
            "status" => "success",
            "account" => $account
        ]);
    }


    public function updateAccount(Request $request){
        $id = $request->account_id;
        $account_name = $request->edit_account_name;
        $display_name = $request->edit_display_name;
        $contact_name = $request->edit_contact_name;
        $account_number = $request->edit_account_number;
        $contact_phone = $request->edit_mobile;
        $email = $request->edit_email;
        $address = $request->edit_address;
        $status = $request->edit_account_status; 
        Account::where('id', $id)->update([
            "account_number" => $account_number,
            "account_name" => $account_name,
            "display_name" => $display_name,
            "address" => $address,
            "contact_name" => $contact_name,
            "email" => $email,
            "contact_phone" => $contact_name,
            "account_status_type_id" => $status
        ]); 
        return redirect()->back()->with('updated', "Account has been updated successfully.");
    }

    public function viewAppUser(Request $request){
        $id = $request->user_id;
        $app_user = DB::table('tbl_app_users')->where('id', $id)->first();
        return response()->json([
            "status" => "success",
            "user" => $app_user
        ], 200); 
    }

     
}
