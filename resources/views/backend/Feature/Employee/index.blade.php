@extends('backend.master')
@section('content')

<!--start content-->
<main class="page-content">
    <main class="page-content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded" style="margin-top: 20px;">
                            <!--Create form  -->
                            <form id="employeeForm"  enctype="multipart/form-data">
                                @csrf
                                <div class="row g-5 ">
                                    <div class="col-auto">
                                        <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Name</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" name="name" style="width:450px !important" id="" class="form-control">
                                    </div>

                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <div class="row g-5 ">
                                    <div class="col-auto">
                                        <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Email</label>
                                    </div>

                                    <div class="col-auto">
                                        <input type="email" name="email" style="width:455px !important;padding-left:5px !important" id="" class="form-control mt-2">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="row g-5 ">
                                    <div class="col-auto">
                                        <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Image</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="file" name="image" style="width:450px !important" class="form-control mt-2">
                                    </div>
                                </div>
                                <div class="row g-5">
                                    <div class="col-auto">
                                        <label class="col-form-label" style="padding-right: 45px; font-size:20px;">Gender</label>
                                    </div>
                                    <div class="col-auto pt-3 pb-3">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio1" name="gender" value="male">Male
                                            <label class="form-check-label" for="radio1"></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">Female
                                            <label class="form-check-label" for="radio2"></label>
                                        </div>
                                    </div>
                                </div>

                                @error('gender')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror

                                <div class="row g-5 " style="margin-top:-30px">
                                    <div class="col-auto">
                                        <label class="col-form-label" style="padding-right: 100px; font-size:20px; padding-left: 180px;">Skills</label>
                                    </div>
                                    <div class="col-auto">
                                        <div class="row g-5">
                                            <div class="col-auto">
                                                @foreach($skills as $skill)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="skill[]" value="{{$skill->id}}">
                                                    <label class="form-check-label">
                                                        {{$skill->name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" onclick="saveEmployee()" class="btn btn-primary mt-5  ">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <center>
                                <h3>Skill List</h3>
                            </center>
                            <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Skills</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </main>

    </body>
    <script>
        function saveEmployee() {

            $.ajax({
                type: "POST",
                url: "{{ route('employee.store') }}",
                data: $("#employeeForm").serialize(),
                success: function(response) {
                    alert(response.message);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
    @endsection