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
                    <div class="card-header">{{ __('View') }}</div>

                    <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Name:</strong>
                                        <p>{{ $company->Name }}</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Email:</strong>
                                        <p>{{ $company->Email }}</p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Logo:</strong>
                                        <br>
                                        <img src="{{ asset('storage/'.$company->Logo) }}" height="100" width="100"></img>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Company Website:</strong>
                                        <p><a href="{{ url($company->Website) }}">{{ $company->Website }}</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <a class="btn btn-warning" href="{{ route('company.index') }}" title="Go back">Go Back <i class="fas fa-backward "></i> </a>
                                </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@stop
