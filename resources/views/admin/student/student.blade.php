@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Student </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Student </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">

                            @if (Session::has('success'))
                                <div class=" alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <div class="card-header">
                                <h3 class="card-title">Create Student </h3>
                            </div>


                            <form action="{{ route('student.store') }}" method="POST">
                                @csrf
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label> Select Academic Year</label>
                                            <select name="academic_year_id" class="form-control">
                                                <option value="" disabled selected>Select Academic Year</option>
                                                @foreach ($academic_years as $academic_year)
                                                    <option value="{{ $academic_year->id }}">{{ $academic_year->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label> Select Class</label>
                                            <select name="class_id" class="form-control">
                                                <option value="" disabled selected>Select Class</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label> Addmission Date </label>
                                            <input type="date" class="form-control" name="admission_date" id=""
                                                placeholder="Enter Admission Date">
                                            @error('admission_date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Student Name</label>
                                            <input type="text" class="form-control" name="name" id=""
                                                placeholder="Enter Student Name">

                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Student's Father Name</label>
                                            <input type="text" class="form-control" name="father_name" id=""
                                                placeholder="Enter Student's Father Name">

                                            @error('father_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Student's CNIC</label>
                                            <input type="text" class="form-control" name="cnic" id=""
                                                placeholder="Enter Student's CNIC">

                                            @error('cnic')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Mobile Nomber</label>
                                            <input type="text" class="form-control" name="mobno" id=""
                                                placeholder="Enter Mobile Nomber">

                                            @error('mobno')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Date Of Birth</label>
                                            <input type="date" class="form-control" name="dob" id="">

                                            @error('dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" name="address" id=""
                                                placeholder="Enter Student Address">

                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" name="email" id=""
                                                placeholder="Enter Email Address ">

                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Create Password</label>
                                            <input type="password" class="form-control" name="password" id=""
                                                placeholder="Enter Password">

                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Student</button>
                                </div>
                            </form>
                        </div>



                    </div>

                </div>
        </section>

    </div>
@endsection



{{-- <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">

                            @if (Session::has('success'))

                            <div class=" alert alert-success">
                                {{Session::get('success')}}
                            </div>
                                
                            @endif

                            <div class="card-header">
                                <h3 class="card-title">Add Student </h3>
                            </div>


                            <form action="{{ route('student.store') }}" method="POST">

                                @csrf
                                @method('POST')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Student Name</label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                            placeholder="Enter student Name">
                                    </div>
                                    @error('name') 
                                    <p class="text-danger">{{$message}}</p>
                                        
                                    @enderror

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                            placeholder="Enter email">
                                    </div>
                                    @error('father_name') 
                                    <p class="text-danger">{{$message}}</p>
                                        
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Father Name</label>
                                        <input type="text" class="form-control" name="father_name" id="exampleInputEmail1"
                                            placeholder="Enter student Name">
                                    </div>
                                    @error('father_name') 
                                    <p class="text-danger">{{$message}}</p>
                                        
                                    @enderror

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone number</label>
                                        <input type="text" class="form-control" name="mobno" id="exampleInputEmail1"
                                            placeholder="Enter student Name">
                                    </div>
                                    @error('mobno') 
                                    <p class="text-danger">{{$message}}</p>
                                        
                                    @enderror

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date of Birth </label>
                                        <input type="text" class="form-control" name="dob" id="exampleInputEmail1"
                                            placeholder="Enter student Name">
                                    </div>
                                    @error('dob') 
                                    <p class="text-danger">{{$message}}</p>
                                        
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password </label>
                                    <input type="password" class="form-control" name="password" id="exampleInputEmail1"
                                        placeholder="Enter student password">
                                </div>
                                @error('password') 
                                <p class="text-danger">{{$message}}</p>
                                    
                                @enderror
                            </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>



                    </div>

                </div>
        </section>

    </div> --}}
