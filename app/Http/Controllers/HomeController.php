<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return view('home');
    }
    public function deshboard()
    {
        return view('dashboard',[
            'divisions' => Division::all()
        ]);
    }
    public function getDistrictListAjax(Request $request)
    {
        $stringToSend = "";
        $districts = District::where('division_id', $request->division_id)->get();
        foreach($districts as $district){
            $stringToSend .= "<option value='".$district->id."'>".$district->name."</option>";
        }
        return $stringToSend;
    }
    public function getUpazilatListAjax(Request $request)
    {

        $stringToSend = "";
        $upazilas = Upazila::where('district_id', $request->district_id)->get();
        foreach($upazilas as $upazila){
            $stringToSend .= "<option value='".$upazila->id."'>".$upazila->name."</option>";
        }
        return $stringToSend;
    }
}