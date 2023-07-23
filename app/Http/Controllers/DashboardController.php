<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\District;
use App\Models\Division;
use App\Models\Educational_qualification;
use App\Models\Examination_name;
use App\Models\Language;
use App\Models\Registration;
use App\Models\Traning;
use App\Models\University;
use App\Models\Upazila;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function deshboard()
    {
        return view('dashboard',[
            'divisions' => Division::all(),
            'exam_names' => Examination_name::all(),
            'universities' => University::all(),
            'all_boards' => Board::all(),
        ]);
    }
    public function getDistrictListAjax(Request $request)
    {
        $stringToSend = "";
        $districts = District::where('division_id', $request->division_id)->get();
        $stringToSend .= "<option value=''>Select Option</option>";
        foreach($districts as $district){
            $stringToSend .= "<option value='".$district->id."'>".$district->name."</option>";
        }
        return $stringToSend;
    }
    public function getUpazilatListAjax(Request $request)
    {

        $stringToSend = "";
        $upazilas = Upazila::where('district_id', $request->district_id)->get();
        $stringToSend .= "<option value=''>Select Option</option>";
        foreach($upazilas as $upazila){
            $stringToSend .= "<option value='".$upazila->id."'>".$upazila->name."</option>";
        }
        return $stringToSend;
    }
     public function formSubmit(Request $request)
     {
        // dd($request);
        $registration_id = Registration::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('photo')) {
            $uploaded_photo = $request->file('photo');
            $new_upload_name = $registration_id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_upload_location = 'public/uploads/student_photos/' . $new_upload_name;
            Image::make($uploaded_photo)->resize(200, 200)->save(base_path($new_upload_location), 50);
            Registration::find($registration_id)->update([
                'photo' => $new_upload_name,
            ]);
        }
        if ($request->hasFile('cv_attachemnt')) {
            $uploaded_photo = $request->file('cv_attachemnt');
            $new_upload_name = $registration_id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_upload_location = 'public/uploads/pdf' . $new_upload_name;
            $request->file('cv_attachemnt')->storeAs('public/cv_attachment',$new_upload_name);
            Registration::where('id',$registration_id)->update([
                'cv_attachment' => $new_upload_name,
            ]);
        }

        foreach($request->exam_id as $key => $value){
            $education_qualification = new Educational_qualification();
            $education_qualification->registration_id =  $registration_id;
            $education_qualification->exam_id =  $request->exam_id[$key];
            $education_qualification->university_id =  $request->university_id[$key];
            $education_qualification->board_id =  $request->board_id[$key];
            $education_qualification->result =  $request->result[$key];
            $education_qualification->save();
        }
        foreach($request->traning_name as $key => $value){
            $traning = new Traning();
            $traning->registration_id = $registration_id;
            $traning->traning_name = $request->traning_name[$key];
            $traning->traning_details = $request->traning_details[$key];
            $traning->save();
        }
        foreach($request->language as $key => $value){
            $languages = new Language();
            $languages->registration_id = $registration_id;
            $languages->language = $request->language[$key];
            $languages->save();
        }

        return response()->json([
            'success' => 'Form Submitted Successfully done!.'
        ]);
     }
}
