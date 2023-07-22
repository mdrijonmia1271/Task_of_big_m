<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Registration;
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
        return view('home',[
            'registration_infos' => Registration::all(),
            'divisions' => Division::all(),
        ]);
    }
    public function edit($id)
    {
        $regiData = Registration::find($id);
        // return $regiData;
        if($regiData){
            return response()->json([
                'status' => 200,
                'regi' =>$regiData,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "Registration Data Not Found",
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $regiData = Registration::find($id);
        $regiData->name = $request->input('name');
        $regiData->email = $request->input('email');
        $regiData->division_id = $request->input('division_id');
        $regiData->district_id = $request->input('district_id');
        $regiData->upazila_id = $request->input('upazila_id');
        $regiData->save();

        return response()->json([
            'success' => "Registration Data Updated Successfully!",
        ]);
    }
    
   
}