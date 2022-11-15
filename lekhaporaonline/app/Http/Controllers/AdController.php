<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
class AdController extends Controller
{
    public function index()
    {
        $files = DB::table('files')->get();
        return view('admin_dashboard_view_ads',compact('files'));
    }
     public function index2()
    {
        $files = DB::table('files')->get();
        return view('welcome_test',compact('files'));
    }
    public function show($id)
    {
       
    }

    public function storeAd(Request $request)
    {
        //add ad data to db
        $ad_title=$request->ad_title;
        $ad_description=$request->ad_description;
        $ad_slot_no=$request->ad_slot_no; 
        $payment_amount=$request->payment_amount;       
        $ad_duration_day=$request->ad_duration_day;
        $ad_duration_sec=(int)$request->ad_duration_sec*1000;
        $file_name=$request->ad_banner_file->getClientOriginalName();
        $ad_date=$request->ad_date;
        $ad_month=$request->ad_month;
        $ad_year=$request->ad_year;
        $ad_year=$request->ad_year;
        $ad_start_date = $ad_year.'-'.$ad_month.'-'.$ad_date.' '.'00:00:00';
//        dd($ad_start_date);
        $query = DB::table('files')
                      ->insert([
                          'ad_title'=>$ad_title,
                          'ad_description'=>$ad_description,
                          'created_at'=>DB::raw('now()'),
                          'updated_at'=>DB::raw('now()'),
                          'payment_amount'=>$request->payment_amount,
                          'ad_start_date'=>$ad_start_date,
                          'ad_duration_day'=>$request->ad_duration_day,
                          'ad_duration_sec'=>$request->ad_duration_sec,
                          'file_name'=>$file_name,
                          'slot_no'=>$ad_slot_no,
                      ]);
        
        //store ad file
        $request->ad_banner_file->storeAs('ads',$file_name);
        //following command to be execute to link local storage to public create a sym link
        //php artisan storage:link
        //at this point images should be in storage/app/ads folder
        //to access the image some tweeks should be done in config/filesystems
        // this default filesystem to be changed
        //'default' => env('FILESYSTEM_DRIVER', 'local'),
        // then it should look like this
        //'default' => env('FILESYSTEM_DRIVER', 'public'),
        // now images should be stored in storage/app/public/ads
        //to get images in blade following codes could be used
        // src="{{ url('storage/ads/'.$file->file_name) }}"

        return view('admin_dashboard_add_ads');
        
        
    }


    public function delete(Request $request, $id)
    {
        // $article = Article::findOrFail($id);
        // $article->delete();

        // return 204;
    }
}

