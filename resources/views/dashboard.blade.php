@extends('layouts/frontend_app')


@section('frontend_content')
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3 style="text-align: center">Registration Form</h3>
                        <form id="quickForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <p>Applicant's Name</p>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}">
                                </div>
                                <div class="col-12">
                                    <p>Email Address</p>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}"> 
                                </div>
                                <div class="col-sm-4 col-12">
                                    <p>Division</p>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select id="division" name="division_id" class="form-control">
                                        <option value="">Select A Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <p>District</p>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select id="district" name="district_id" class="form-control">
                                        <option value="">Select A District</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <p>Upazila / Thana </p>
                                    @error('upazila_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select id="upazila" name="upazila_id" class="form-control">
                                        <option value="">Select A Upazila</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <p style="margin-top: 25px">Address Details </p>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <textarea name="address" id="" class="form-control" cols="30" rows="10"></textarea><br>
                                </div>
                                <div class="col-12">
                                    <label for="">Language Proficiency :</label><br>
                                    <input type="checkbox" id="" name="language[]" value="Bangla">
                                    <label for="">Bangla</label><br>
                                    <input type="checkbox" name="language[]" value="English">
                                    <label for="">English</label><br>
                                    <input type="checkbox" name="language[]" value="French">
                                    <label for="">French</label><br>
                                </div>
                                <table id="table" class="table table-striped table-bordered">
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
                                                @error('exam_id[]')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <select id="exam_name" name="exam_id[]" class="form-control">
                                                    <option value="">Select Option</option>
                                                    @foreach ($exam_names as $exam_name)
                                                        <option value="{{ $exam_name->id }}">
                                                            {{ $exam_name->exam_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                @error('university_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <select id="university" name="university_id[]" class="form-control">
                                                    <option value="">Select Option</option>
                                                    @foreach ($universities as $universitie)
                                                        <option value="{{ $universitie->id }}">
                                                            {{ $universitie->university_name }}</option>
                                                    @endforeach
                                            </td>
                                            <td>
                                                @error('board_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <select id="board" name="board_id[]" class="form-control">
                                                    <option value="">Select Option</option>
                                                    @foreach ($all_boards as $board)
                                                        <option value="{{ $board->id }}">
                                                            {{ $board->board_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                @error('result')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="result[]" class="form-control" placeholder="CGPA">
                                            </td>
                                            <td>
                                                <button type="button" name="add" id="add" onclick="addInputFunc()" class="btn btn-primary">Add More</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="mb-3 col-md-12">
                                    <label class="mb-2">Photo</label><br>
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="file" name="photo" class="form-control">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="mb-2">CV Attachment</label><br>
                                    @error('cv_attachemnt')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="file" name="cv_attachemnt" class="form-control">
                                </div>

                                <div class="col-12">
                                    <p>Traning :</p><br>
                                    <input id="toggle2" type="radio" name="traning_option" value="yes">
                                    <label for="toggle2">Yes</label>
                                    <input style="margin-left: 12px" type="radio" name="traning_option"
                                        value="no">
                                    <label for="">No</label>
                                </div>
                                <div class="col-12">
                                    <div class="row" id="open2">
                                        <table id="traning_table" class="table table-striped table-bordered">
                                            <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                                                <tr>
                                                    <th class="het" scope="col">Traning Name</th>
                                                    <th class="het" scope="col">Traning Details</th>
                                                    <th class="het" scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="traning_name[]" class="form-control" placeholder="Enter traning name"></td>
                                                    <td><input type="text" name="traning_details[]" class="form-control" placeholder="Enter traning details"></td>
                                                    <td><button type="button" onclick="addTraningInput()" class="btn btn-primary">Add More</button></td>
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
        jQuery('#quickForm').submit(function(e){
            console.log('submit form');
            e.preventDefault();
            var formData = new FormData(this);
            jQuery.ajax({
                url:"submit-form",
                data:formData,
                type:'POST',
                processData: false, // Set processData to false
                contentType: false, // Set contentType to false
                success:function(result){
                    toastr.success(result.success);
                }
            });
        });
        function addInputFunc(){
             $('#table').append(
                `<tr>
                    <td>
                        <select id="exam_name_2" name="exam_id[]" class="form-control">
                             <option value="">Select Option</option>
                                @foreach ($exam_names as $exam_name)
                                    <option value="{{ $exam_name->id }}">
                                        {{ $exam_name->exam_name }}</option>
                                @endforeach
                        </select>
                    </td>
                    <td>
                         <select id="university_2" name="university_id[]" class="form-control">
                            <option value="">Select Option</option>
                                @foreach ($universities as $universitie)
                                    <option value="{{ $universitie->id }}">
                                        {{ $universitie->university_name }}</option>
                                @endforeach
                        </select>
                    </td>
                    <td>
                        <select id="board_name_2" name="board_id[]" class="form-control">
                            <option value="">Select Option</option>
                                @foreach ($all_boards as $board)
                                    <option value="{{ $board->id }}">
                                        {{ $board->board_name }}</option>
                                @endforeach
                         </select>
                    </td>
                    <td>
                        <input type="text" name="result[]" class="form-control" placeholder="CGPA">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove_table_row">Delete</button>
                    </td>
                <tr>`
            );
        }
        $(document).on('click', '.remove_table_row', function() {
            $(this).parents('tr').remove();
        });

        function addTraningInput(){
            $('#traning_table').append(
                `<tr>
                    <td><input type="text" name="traning_name[]" class="form-control" placeholder="Enter traning name"></td>
                    <td><input type="text" name="traning_details[]" class="form-control" placeholder="Enter traning details"></td>
                    <td><button type="button" class="btn btn-danger delete_table_row">Delete</button></td>
                <tr>`
            );
        }
        $(document).on('click', '.delete_table_row', function() {
            $(this).parents('tr').remove();
        });

        $(document).ready(function() {
            // $('#university').select2();
            // $('#university_2').select2();
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
        });

        $(document).ready(function() {
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    division_id: {
                        required: true,
                    },
                    district_id: {
                        required: true,
                    },
                    upazila_id: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    photo: {
                        required: true,
                    },
                    cv_attachemnt: {
                        required: true,
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
