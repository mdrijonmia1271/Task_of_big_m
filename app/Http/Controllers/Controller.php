<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function index(Request $request)
    {
        $divisions = Division::all();
        $registration_infos = Registration::all();
        if($request->search_name){
            $registration_infos = Registration::where('name','like','%'.$request->search_name.'%')->get();
        }
        if($request->search_email){
            $registration_infos = Registration::where('email','like','%'.$request->search_email.'%')->get();
        }
        if($request->search_division){
            $registration_infos = Registration::where('division_id','like','%'.$request->search_division.'%')->get();
        }
        if($request->search_district){
            $registration_infos = Registration::where('district_id','like','%'.$request->search_district.'%')->get();
        }
        if($request->search_upazila){
            $registration_infos = Registration::where('upazila_id','like','%'.$request->search_upazila.'%')->get();
        }
        if($request->search_name && $request->search_email){
            $registration_infos = Registration::where('name','like','%'.$request->search_name.'%')
                                  ->where('email','like','%'.$request->search_email.'%')
                                  ->get();
        }
        if($request->search_name && $request->search_email && $request->search_division && $request->search_district && $request->search_upazila){
            $registration_infos = Registration::where('name','like','%'.$request->search_name.'%')
                                  ->where('email','like','%'.$request->search_email.'%')
                                  ->where('division_id','like','%'.$request->search_division.'%')
                                  ->where('district_id','like','%'.$request->search_district.'%')
                                  ->where('upazila_id','like','%'.$request->search_upazila.'%')
                                  ->get();
        }
        
        return view('home',compact('divisions','registration_infos'));
    }
}
