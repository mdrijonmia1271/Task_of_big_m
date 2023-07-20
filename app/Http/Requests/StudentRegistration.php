<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegistration extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'address' => 'required',
            'exam_id' => 'required',
            'university_id' => 'required',
            'board_id' => 'required',
            // 'result' => 'required',
            'photo' => 'required|image|mimes:jpeg,png',
            'cv_attachemnt' => 'required|mimes:pdf',
        ];
    }
    public function messages(){
        return[
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email address',
            'division_id.required' => 'Please select division',
            'district_id.required' => 'Please select district',
            'upazila_id.required' => 'Please select upazila / thana',
            'address.required' => 'Please enter your address',
            'exam_id.required' => 'select exam name',
            'university_id.required' => 'Select university',
            'board_id.required' => 'Select board',
            // 'result.required' => 'Enter result',
            'photo.required' => 'Enter your photo',
            'cv_attachemnt.required' => 'Enter your CV',
        ];
    }
}
