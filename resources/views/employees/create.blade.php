@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Employee</h1>
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
                    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee First Name:</strong>
                                        <input type="text" name="FirstName" class="form-control" placeholder="Enter First Name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee Last Name:</strong>
                                        <input type="text" name="LastName" class="form-control" placeholder="Enter Last Name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee Email:</strong>
                                        <input type="email" name="Email" class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee Phone:</strong>
                                        <input type="text" name="Phone" class="form-control" placeholder="Enter Phone Number">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employer:</strong>
                                        <select class="form-control" name="CompanyId">
                                            <option>Select Company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"> 
                                                    {{ $company->Name }} 
                                                </option>
                                            @endforeach    
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee Picture:</strong>
                                        <input type="file" name="Picture" placeholder="Upload Image">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <a class="btn btn-warning" href="{{ route('employee.index') }}" title="Go back">Go Back <i class="fas fa-backward "></i> </a>
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
