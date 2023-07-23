@extends('layouts/frontend_app')

@section('frontend_content')
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <a href="{{ url('/home') }}" class="btn-sm btn btn-primary">back</a>
                    <div class="checkout-form form-style">
                        <h3 style="text-align: center">Details information</h3>
                    </div>
                    <div style="margin-bottom: 70px; text-align:center">
                        <img src="{{ asset('uploads/student_photos') }}/{{ $regi_infos->photo }}" alt="Not found">
                    </div>
                    <div>
                        <p class="applicant"><strong>Applicant's Name</strong> : {{ $regi_infos->name }}</p>
                        <p class="applicant"><strong>Email Address</strong> : {{ $regi_infos->email }}</p>
                        <p class="applicant"><strong>Divison</strong> : {{ $regi_infos->RelationWithDivision->name }}</p>
                        <p class="applicant"><strong>District</strong> : {{ $regi_infos->RelationWithDistrict->name }}</p>
                        <p class="applicant"><strong>Upazila / Thana</strong> : {{ $regi_infos->RelationWithUpazila->name }}
                        </p>
                        <p class="applicant"><strong>Address</strong> : {{ $regi_infos->address }}</p>
                        <p class="applicant"><strong>CV Attachment</strong> :
                            <a target="_blank" href="{{ url('cv_view') }}/{{ $regi_infos->id }}">View |</a>
                            <a href="{{ url('cv_download') }}/{{ $regi_infos->cv_attachment }}"> Download</a>
                        </p>
                        <p class="applicant"><strong>Language</strong> :
                            @foreach ($languages as $singleLanguage)
                                <span>{{ $singleLanguage->language }}</span>,
                            @endforeach
                        </p>

                        <h5 style="margin-top: 65px">Education Qualification :</h5>
                        <table class="table table-striped table-bordered">
                            <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                                <tr>
                                    <th class="het" scope="col">Exam Name</th>
                                    <th class="het" scope="col">University</th>
                                    <th class="het" scope="col">Board</th>
                                    <th class="het" scope="col">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($edu_qualifications as $edu_qualifications)
                                    <tr>
                                        <td>{{ $edu_qualifications->RelationWithExam->exam_name }}</td>
                                        <td>{{ $edu_qualifications->RelationWithVersity->university_name }}</td>
                                        <td>{{ $edu_qualifications->RelationWithBoard->board_name }}</td>
                                        <td>{{ $edu_qualifications->result }}</td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="50" class="text-center text-danger">No Data Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <h5 style="margin-top: 35px">Traning :</h5>
                        <table class="table table-striped table-bordered">
                            <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                                <tr>
                                    <th class="het" scope="col">Traning Name</th>
                                    <th class="het" scope="col">Traning Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tranings as $traning)
                                    <tr>
                                        <td>{{ $traning->traning_name }}</td>
                                        <td>{{ $traning->traning_details }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50" class="text-center text-danger">No Data Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection
@section('footer_scripts')
@endsection
