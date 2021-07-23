@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Companies</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="{{ route('company.create') }}" class="btn btn-success">Add New</a></div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->Name }}</td>
                                <td>{{ $company->Email }}</td>
                                <td><img src="{{ asset('storage/'.$company->Logo) }}" height="50" width="50"></img></td>
                                <td>{{ $company->Website }}</td>
                                <td>
                                    <form action="{{ route('company.destroy',$company->id) }}" method="POST">   
                                        <a class="btn btn-primary" href="{{ route('company.show',$company->id) }}">Show</a>    
                                        <a class="btn btn-success" href="{{ route('company.edit',$company->id) }}">Edit</a>   
                                        @csrf
                                        @method('DELETE')      
                                        <button type="submit" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </table>

                        {!! $companies->links() !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop

