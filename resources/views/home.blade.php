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
                    <ul id="updateErrorList"></ul>
                    <div>
                        <input type="hidden" id="regi_id">
                        <label>Applicant's Name</label>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter your name">

                    </div>
                    <div style="margin-top:10px">
                        <label>Email Address</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Enter your email address">
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
    <!-- Modal  End-->



    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div style="margin-bottom:29px; margin-top:10px">
                    <form action="{{ route('home') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" name="search_name" class="form-control" placeholder="Search name">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="search_email" class="form-control" placeholder="Search email">
                            </div>
                            <div class="col-md-2">
                                <select id="division_2" name="search_division" class="form-control">
                                    <option value="">Search division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select id="district_2" name="search_district" class="form-control">
                                    <option value="">Search district</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select id="upazila_2" name="search_upazila" class="form-control">
                                    <option value="">Search upazila</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <ul id="editedData"></ul>
                <div class="card">
                    <div class="card-header">{{ __('Registration List') }}</div>

                    <div class="card-body">
                        <table id="DataTable" class="table table-striped table-bordered">
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
                                            <button type="button" value="{{ $registration_info->id }}"
                                                class="btn btn-sm btn-outline-primary edit_table_data"
                                                data-bs-toggle="modal" data-bs-target="#editDataModal">
                                                Edit
                                            </button>
                                            <a href="{{ url('details/regi_info') }}/{{ $registration_info->id }}"
                                                type="button" class="btn btn-sm btn-outline-success">Details</a>
                                            <a href="{{ url('delete/regi_info') }}/{{ $registration_info->id }}"
                                                type="button" onclick="return confirm('Are you sure to delete')"
                                                class="btn btn-sm btn-outline-danger">Delete</a>
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
        $(document).ready(function() {
            $('#DataTable').DataTable();
        });
        $(document).on('click', '.edit_table_data', function(e) {
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
                url: '/get/regi_data/' + regi_id,
                success: function(data) {
                    // console.log(data);
                    $('#name').val(data.regi.name);
                    $('#email').val(data.regi.email);
                    $('#regi_id').val(data.regi.id);

                }
            });
        });
        $(document).on('click', '.update_regiData', function(e) {
            e.preventDefault();
            var regi_id = $("#regi_id").val();
            var data = {
                'name': $('#name').val(),
                'email': $('#email').val(),
                'division_id': $('#division').val(),
                'district_id': $('#district').val(),
                'upazila_id': $('#upazila').val(),
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
                url: '/update/regi_data/' + regi_id,
                data: data,
                dataType: 'json',
                success: function(data) {
                    // toastr.success(data.success);
                    // console.log(data);
                    if (data.status == 400) {
                        $('#updateErrorList').html("");
                        $('#updateErrorList').addClass('alert alert-danger');
                        $.each(data.errors, function(key, arr_values) {
                            $('#updateErrorList').append('<li>' + arr_values + '<li>');
                        });
                    } else {
                        $('#updateErrorList').html("");
                        $('#editDataModal').modal('hide');
                    }
                    if (data.status == 200) {
                        $('#editedData').html("");
                        $('#editedData').addClass('alert alert-success');
                        $('#editedData').append('<li>' + data.success + '<li>');
                    }


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
        $(document).ready(function() {
            // $('#division_2').select2();
            // $('#district').select2();
            // $('#upazila').select2();
            $('#division_2').change(function() {
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
                        $('#district_2').html(data);

                    }
                });
            })
            $('#district_2').change(function() {
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
                        $('#upazila_2').html(data);
                    }
                });
            })
        });
    </script>
@endsection
