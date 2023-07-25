<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Educational_qualification;
use App\Models\Language;
use App\Models\Registration;
use App\Models\Traning;
use Illuminate\Support\Facades\Validator;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $regiData = Registration::find($id);
        $regiData->name = $request->input('name');
        $regiData->email = $request->input('email');
        $regiData->division_id = $request->input('division_id');
        $regiData->district_id = $request->input('district_id');
        $regiData->upazila_id = $request->input('upazila_id');
        $regiData->save();

        return response()->json([
            'status' => 200,
            'success' => "Registration Data Updated Successfully!",
        ]);
    }

    public function details($id)
    {
        return view('Regi_details',[
            'regi_infos' => Registration::find($id),
            'edu_qualifications' => Educational_qualification::where('registration_id', $id)->get(),
            'tranings' => Traning::where('registration_id', $id)->get(),
            'languages' => Language::where('registration_id', $id)->get(),
        ]);
    }
    public function delete($id)
    {
        // dd($id);
        Registration::find($id)->delete();
        Educational_qualification::where('registration_id', $id)->delete();
        Traning::where('registration_id', $id)->delete();
        Language::where('registration_id', $id)->delete();
        return back()->with('delete', 'Successfully Data Deleted!');
    }
    
    public function view($id)
    
    {
        return view('cv_attachment',[
            'data' => Registration::find($id),
        ]);
    }
    public function download($file)
    {
        return response()->download(public_path('uploads/pdf/'.$file));
    }

    
   
}