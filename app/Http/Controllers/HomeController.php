<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRegistration;
use App\Models\Board;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use App\Models\Educational_qualification;
use App\Models\Examination_name;
use App\Models\Registration;
use App\Models\University;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
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
            'divisions' => Division::all(),
            'exam_names' => Examination_name::all(),
            'universities' => University::all(),
            'all_boards' => Board::all(),
            // 'educational_infos' => Education::all()
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
    // public function getExamNameListAjax(Request $request)
    // {

    //     $stringToSend = "";
    //     $stringToSendBoard = "";
    //     $uiversities = University::where('exam_id', $request->exam_id)->get();
    //     foreach($uiversities as $uiversity){
    //         $stringToSend .= "<option value='".$uiversity->id."'>".$uiversity->university_name."</option>";
    //     }
        
    //     $boards = Board::where('exam_id', $request->exam_id)->get();
    //     // $option = "Select Option";
    //     // $stringToSend .= "<option value=''>".$option."</option>";
    //     foreach($boards as $board){
    //         $stringToSendBoard .= "<option value='".$board->id."'>".$board->board_name."</option>";
    //     }

    //     return array(
    //         'university' => $stringToSend,
    //         'board' => $stringToSendBoard 
    //     );
    // }
    
     public function studentRegistration(StudentRegistration $request)
     {
        // dd($request->all());
        
        // $registration_id = Registration::insertGetId([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'division_id' => $request->division_id,
        //     'district_id' => $request->district_id,
        //     'upazila_id' => $request->upazila_id,
        //     'address' => $request->address,
        //     'language' => $request->language,
        //     'created_at' => Carbon::now(),
        // ]);
        // Educational_qualification::insert([
        //     'registration_id' => $registration_id,
        //     'exam_id' => $request->exam_id[],
        //     'university_id' => $request->university_id[],
        //     'board_id' => $request->board_id[],
        //     'result' => $request->result[],
        // ]);
        // if ($request->hasFile('photo')) {
        //     $uploaded_photo = $request->file('photo');
        //     $new_upload_name = $registration_id . "." . $uploaded_photo->getClientOriginalExtension();
        //     $new_upload_location = 'public/uploads/student_photos/' . $new_upload_name;
        //     Image::make($uploaded_photo)->resize(200, 200)->save(base_path($new_upload_location), 50);
        //     Registration::find($registration_id)->update([
        //         'photo' => $new_upload_name,
        //     ]);
        // }
        // if ($request->hasFile('cv_attachemnt')) {
        //     $uploaded_photo = $request->file('cv_attachemnt');
        //     $new_upload_name = $registration_id . "." . $uploaded_photo->getClientOriginalExtension();
        //     $new_upload_location = 'public/uploads/pdf' . $new_upload_name;
        //     $request->file('cv_attachemnt')->storeAs('public/cv_attachment',$new_upload_name);
        //     Registration::where('id',$registration_id)->update([
        //         'cv_attachment' => $new_upload_name,
        //     ]);
        // }

     }
     public function formSubmit(Request $request){
        $registration_id = Registration::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'address' => $request->address,
            'language' => $request->language,
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


        return response()->json([
            'success' => 'Form Submitted Successfully done!.'
        ]);
     }



     
// $university_ids = ['15', '17'];
// $board_ids = ['15', '17'];
// $results_1 = ['15', '17'];
// $results_2 = ['15', '17'];

// // Assuming the arrays have the same length and you have already validated them to ensure consistency.

// // Loop through the arrays and insert values into the database
// for ($i = 0; $i < count($university_ids); $i++) {
//     $studentResult = new StudentResult();
//      $registration_id = get registration id
//     $studentResult->university_id = $university_ids[$i];
//     $studentResult->board_id = $board_ids[$i];
//     $studentResult->result_1 = $results_1[$i];
//     $studentResult->result_2 = $results_2[$i];
//     $studentResult->save();
// }
}