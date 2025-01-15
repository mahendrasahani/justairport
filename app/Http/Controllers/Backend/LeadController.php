<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Campaign;
use App\Models\Leads;
use Illuminate\Http\Request;

class LeadController extends Controller{
    public function websiteLeads(){
        $leads = Leads::orderBy('id', 'desc')->paginate(25); 
        return view('backend.leads.website_leads', compact('leads'));
    }
    public function landingPageOne(){
        $leads = Campaign::where('landing_page_identity', 1)->orderBy('id', 'desc')->paginate(25);
        return view('backend.leads.landing_page_one', compact('leads'));
    }

    public function updateComment(Request $request){
        try{
            Campaign::where('id', $request->id)->update([
                "comment" => $request->comment
            ]);
            return redirect()->back()->with("comment_updated", "Comment has been updated successfully.");
        }catch(\Exception $e){
            abort('404');
        }
    }
}
