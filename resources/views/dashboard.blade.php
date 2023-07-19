@extends('layouts/frontend_app')

{{-- @section('title')
    Deshboard Page
@endsection  --}}

@section('frontend_content')
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3 style="text-align: center">Registration Form</h3>
                        <form action="{{ url('checkout/post') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <p>Applicant's Name</p>
                                    <input type="text" name="name" value="" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <p>Email Address</p>
                                    <input type="email" name="email" value="" class="form-control" required>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <p>Division</p>
                                    <select id="division" name="division_id" class="form-control" required>
                                        <option value="">Select A Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <p>District</p>
                                    <select id="district" name="district_id" class="form-control" required>
                                        <option value="">Select A District</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <p>Upazila / Thana </p>
                                    <select id="upazila" name="upazila-id" class="form-control" required>
                                        <option value="">Select A Upazila</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <p style="margin-top: 25px">Address Details </p>
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label for="">Language Proficiency :</label><br>
                                    <input type="checkbox" name="bangla" value="bangla">
                                    <label for="">Bangla</label><br>
                                    <input type="checkbox" name="english" value="english">
                                    <label for="">English</label><br>
                                    <input type="checkbox" name="" value="english">
                                    <label for="">French</label><br>
                                </div>
                                <table id="dataTable" class="table table-striped table-bordered">

                                    <label for="">Education Qualification</label>
                                    <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                                        <tr>
                                            <th class="het" scope="col">Exam Name</th>
                                            <th class="het" scope="col">University</th>
                                            <th class="het" scope="col">Board</th>
                                            <th class="het" scope="col">Result</th>
                                            <th class="het" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select id="city_list_1" name="city_id" class="form-control" required>
                                                    <option value="">Select Option</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="city_list_1" name="city_id" class="form-control" required>
                                                    <option value="">Select Option</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="city_list_1" name="city_id" class="form-control" required>
                                                    <option value="">Select Option</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="address" class="form-control" required>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select id="city_list_1" name="city_id" class="form-control" required>
                                                    <option value="">Select Option</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="city_list_1" name="city_id" class="form-control" required>
                                                    <option value="">Select Option</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="city_list_1" name="city_id" class="form-control" required>
                                                    <option value="">Select Option</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="address" class="form-control" required>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="mb-3 col-md-12">
                                    <label class="mb-2">Photo</label>
                                    <input type="file" name="category_photo" class="form-control">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="mb-2">CV Attachment</label>
                                    <input type="file" name="category_photo" class="form-control">
                                </div>
                                
                                <div class="col-12">
                                    <p>Traning :</p><br>
                                    <input id="toggle2" type="radio" name="traning_option" value="yes">
                                    <label for="toggle2">Yes</label>
                                    <input style="margin-left: 12px" type="radio" name="traning_option" value="no">
                                    <label for="">No</label>
                                </div>
                                <div class="col-12">
                                    <div class="row" id="open2">
                                        <table class="table table-striped table-bordered">
                                            <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                                                <tr>
                                                    <th class="het" scope="col">Traning Name</th>
                                                    <th class="het" scope="col">Traning Details</th>
                                                    <th class="het" scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="address" class="form-control" required></td>
                                                    <td><input type="text" name="address" class="form-control" required></td>
                                                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="address" class="form-control" required></td>
                                                    <td><input type="text" name="address" class="form-control" required></td>
                                                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               
                            </div>
                            <div style="text-align: right">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function() {
            // $('#division').select2();
            // $('#district').select2();
            // $('#upazila').select2();
            $('#division').change(function() {
                var division_id = $(this).val();
                //ajax setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //ajax response start
                $.ajax({
                    type: 'POST',
                    url: '/get/district/list/ajax',
                    data: {
                        division_id: division_id
                    },
                    success: function(data) {
                        // alert(data);
                        $('#district').html(data);
                        
                    }
                });
            })
            $('#district').change(function() {
                var district_id = $(this).val();
                //ajax setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //ajax response start
                $.ajax({
                    type: 'POST',
                    url: '/get/upazila/list/ajax',
                    data: {
                        district_id: district_id
                    },
                    success: function(data) {
                        $('#upazila').html(data);
                    }
                });
            })
        })
    </script>
@endsection
