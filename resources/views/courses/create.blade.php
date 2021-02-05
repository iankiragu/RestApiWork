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
        <div class="col-md-6 bg-light p-3">
            <form method="POST" action='{{ route('courses.store')}}' class="login100-form validate-form">
                {{ csrf_field() }}
                <p class="lead">Course Registration</p>
                <br>
                <br><br>
                <div class="wrap-input100 validate-input m-b-26" data-validate="Course is required">
						<span class="label-input100"><i class="fa fa-book"></i></span>
						<input name='name' type="text"class="input100" id="name" placeholder="Course name">
						<span class="focus-input100"></span>
				</div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">Update Course</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-6 bg-light p-3">
            <table class="table">
                <p class="lead">View Courses Table</p>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <th scope="row">{{$course->id}}</th>
                            <td>{{$course->name}}</td>
                            <td>
                                <form action="{{ route('courses.destroy', $course->id)}}" method="post">
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
