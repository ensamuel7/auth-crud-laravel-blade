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
                    <div class="card-header">{{ __('View') }}</div>

                    <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee Name:</strong>
                                        <p>{{ $employee->FirstName }} {{ $employee->LastName }}</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee Email:</strong>
                                        <p>{{ $employee->Email }}</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee Phone:</strong>
                                        <p>{{ $employee->Phone }}</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employer:</strong>
                                        <p>{{ $employee->Company->Name }}</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Employee Picture:</strong>
                                        <br>
                                        <img src="{{ asset('storage/'.$employee->Picture) }}" height="100" width="100"></img>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <a class="btn btn-warning" href="{{ route('employee.index') }}" title="Go back">Go Back <i class="fas fa-backward "></i> </a>
                                </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@stop
