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


                            <form action="{{ route('student.update', $student->id) }}" method="POST">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label> Select Academic Year</label>
                                            <select name="academic_year_id" class="form-control">
                                                <option value="" disabled selected>Select Academic Year</option>
                                                @foreach ($academic_years as $academic_year)
                                                    <option value="{{ $academic_year->id }}"{{ $student->academic_year_id == $academic_year->id ? 'selected' :null}}>{{ $academic_year->name }}
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
                                                    <option value="{{ $class->id }}"{{ $student->class_id == $class->id ? 'selected' :null}}>{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label> Addmission Date </label>
                                            <input type="date" class="form-control" name="admission_date" value="{{old('admission_date',$student->admission_date)}}">
                                            @error('admission_date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Student Name</label>
                                            <input type="text" class="form-control" name="name" value="{{old('name',$student->name)}}">

                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Student's Father Name</label>
                                            <input type="text" class="form-control" name="father_name" value="{{old('father_name',$student->father_name)}}">

                                            @error('father_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Student's CNIC</label>
                                            <input type="text" class="form-control" name="cnic" value="{{old('cnic',$student->cnic)}}">

                                            @error('cnic')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Mobile Nomber</label>
                                            <input type="text" class="form-control" name="mobno" value="{{old('mobno',$student->mobno)}}">

                                            @error('mobno')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Date Of Birth</label>
                                            <input type="date" class="form-control" name="dob" value="{{old('dob',$student->dob)}}">

                                            @error('dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{old('address',$student->address)}}">

                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" name="email" value="{{old('email',$student->email)}}">

                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
        
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Student</button>
                                </div>
                            </form>
                        </div>



                    </div>

                </div>
        </section>

    </div>
@endsection