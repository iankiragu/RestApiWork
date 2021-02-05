@extends('base')

@section('main')
    @if ($errors->any())
    <div class="message alert alert-danger fade in alert-dismissible show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="font-size:20px">×</span>
        </button>
        <strong>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </strong>.
    </div> <br>
    @endif
     @if (session()->has('success'))
    <div class="message alert alert-success fade in alert-dismissible show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="font-size:20px">×</span>
        </button>
        <strong>
            {{ session()->get('success') }}
        </strong>.
    </div> <br>
    @endif
    <div class="row justify-content-center mt-2">
        <div class="col-md-6 col-lg-6 bg-light p-3">
        <form method="POST" action='{{ route('students.store')}}'class="login100-form validate-form">
            {{ csrf_field() }}
                 
                <hr>
                <div class="wrap-input100 validate-input m-b-26" data-validate="student_id is required">
                    <span class="label-input100"><i class="fa fa-tasks"></i></span>
                    <input class="input100" type="text" class= "input"placeholder="Enter Student ID" name="student_id" id="student_id"required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100"><i class="fa fa-user"></i></span>
                    <input type="text" class="input100" placeholder="Enter Name" name="full_name" id="student_name"required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                    <span class="label-input100"><i class="fa fa-envelope"></i></span>
                    <input class="input100" type="text" placeholder="Enter Email" name="email" id= "email"required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-26" data-validate = "Phone is required">
                    <span class="label-input100"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <input type="number" class="input100" placeholder="Enter Phone Number" name="phone"id="phone"required>
                    <span class="focus-input100"></span>
                
                </div>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
                    <span class="label-input100"><i class="fa fa-home"></i></span>
                    <input type="text" class="input100" placeholder="Enter Address" name="address" id="address" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Entry Points are required">
                    <span class="label-input100"><i class="fa fa-book"></i></span>
                    <input type="text" class="input100" placeholder="Enter Entrypoints" name="entry_points" id="entrypoints" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="form-group">
                    <div  class="wrap-input100" validate-input m-b-26>
					<span class="label-input100"><i class="fa fa-folder"></i></span>
                    <select name="course_id" id="course_id">
                        @foreach ($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">Save Record</button>
            </div>
            </form>
        </div>
    </div>
     <div class="row justify-content-center mt-2">
        <div class="col-md-12 bg-light p-3">
            <table class="table">
                <p class="lead">View Students Table</p>
                <thead>
                    <tr>
                        <th scope="col">Student's Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Entry Point</th>
                        <th scope="col">Course</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td>{{$student->full_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->entry_points}}</td>
                            <td>{{$student->course->name}}</td>
                            <td>
                                <form action="{{ route('students.destroy', $student->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-primary btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
