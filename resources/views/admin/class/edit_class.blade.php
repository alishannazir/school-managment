@extends('admin.layout')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Academic Year</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Academic Year</li>
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

                            @if (Session::has ('success'))

                            <div class=" alert alert-success">
                                {{Session::get('success')}}
                            </div>
                                
                            @endif

                            <div class="card-header">
                                <h3 class="card-title">Add Academic Year</h3>
                            </div>


                            <form action="{{route('class.update')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$class->id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Class Name </label>
                                        <input type="text" class="form-control" name="name" value="{{old('name', $class->name)}}"
                                        id="exampleInputEmail1"
                                            placeholder="Enter Academic Yeaar">
                                    </div>
                                    @error('name') 
                                    <p class="text-danger">{{$message}}</p>
                                        
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Class Name</button>
                                </div>
                            </form>
                        </div>



                    </div>

                </div>
        </section>

    </div>
@endsection

@section('customjs')
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection 
