@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Registration List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="hidden" id="regi_id">
                        <label>Applicant's Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter your name">
                    </div>
                    <div style="margin-top:10px">
                        <label>Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address">
                    </div>
                    <div style="margin-top:10px">
                        <label>Division</label>
                        <select id="division" name="division_id" class="form-control">
                            <option value="">Select A Division</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-top:10px">
                        <label>District</label>
                        <select id="district" name="district_id" class="form-control">
                            <option value="">Select A District</option>
                        </select>
                    </div>
                    <div style="margin-top:10px">
                        <label>Upazila / Thana </label>
                        <select id="upazila" name="upazila_id" class="form-control">
                            <option value="">Select A Upazila</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_regiData">Update</button>
                </div>
            </div>
        </div>
    </div>



    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registration List') }}</div>

                    <div class="card-body">
                        <table id="table" class="table table-striped table-bordered">
                            <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                                <tr>
                                    <th class="het" scope="col">Applicant's Name</th>
                                    <th class="het" scope="col">Email Address</th>
                                    <th class="het" scope="col">Division</th>
                                    <th class="het" scope="col">District</th>
                                    <th class="het" scope="col">Upazila / Thana</th>
                                    <th class="het" scope="col">Insert Date</th>
                                    <th class="het" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($registration_infos as $registration_info)
                                    <tr>
                                        <td>{{ $registration_info->name }}</td>
                                        <td>{{ $registration_info->email }}</td>
                                        <td>{{ $registration_info->RelationWithDivision->name }}</td>
                                        <td>{{ $registration_info->RelationWithDistrict->name }}</td>
                                        <td>{{ $registration_info->RelationWithUpazila->name }}</td>
                                        <td>{{ $registration_info->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" value="{{ $registration_info->id }}" class="btn btn-primary edit_table_data" data-bs-toggle="modal"
                                                data-bs-target="#editDataModal">
                                                Edit
                                            </button><br>
                                            <button style="margin-top:10px" type="button" name="" id=""
                                                class="btn btn-success">Details</button><br>
                                            <button style="margin-top:10px" type="button" name="" id=""
                                                class="btn btn-danger">Delete</button>
                                        </td>
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
@endsection
@section('footer_scripts')
    <script>
        $(document).on('click','.edit_table_data', function(e){
            e.preventDefault();
            var regi_id = $(this).val();
            //ajax setup
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //ajax response start
                $.ajax({
                    type: 'GET',
                    url: '/get/regi_data/'+regi_id,
                    success: function(data) {
                        // console.log(data);
                        $('#name').val(data.regi.name);
                        $('#email').val(data.regi.email);
                        $('#regi_id').val(data.regi.id);

                    }
                });
        });
        $(document).on('click', '.update_regiData', function(e){
            e.preventDefault();
            var regi_id = $("#regi_id").val();
            var data = {
                'name' : $('#name').val(),
                'email' : $('#email').val(),
                'division_id' : $('#division').val(),
                'district_id' : $('#district').val(),
                'upazila_id' : $('#upazila').val(),
            }
            //ajax setup
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //ajax response start
                $.ajax({
                    type: 'PUT',
                    url: '/update/regi_data/'+regi_id,
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data.success);
                        toastr.success(data.success);
                    }
                });
        });


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
        });
    </script>
@endsection
