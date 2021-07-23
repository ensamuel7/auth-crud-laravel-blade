@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Company</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add') }}</div>

                    <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Sorry!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Name:</strong>
                                        <input type="text" name="Name" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Email:</strong>
                                        <input type="email" name="Email" class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Logo:</strong>
                                        <input type="file" name="Logo" placeholder="Upload Image">
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Website:</strong>
                                        <input type="text" name="Website" class="form-control" placeholder="Enter Website">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <a class="btn btn-warning" href="{{ route('company.index') }}" title="Go back">Go Back <i class="fas fa-backward "></i> </a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop
