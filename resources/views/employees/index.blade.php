@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Employees</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="{{ route('employee.create') }}" class="btn btn-success">Add New</a></div>

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
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Picture</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->FirstName }} {{ $employee->LastName }}</td>
                                <td>{{ $employee->Email }}</td>
                                <td>{{ $employee->Phone }}</td>
                                <td>{{ $employee->Company->Name }}</td>
                                <td><img src="{{ asset('storage/'.$employee->Picture) }}" height="50" width="50"></img></td>
                                <td>
                                    <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">   
                                        <a class="btn btn-primary" href="{{ route('employee.show',$employee->id) }}">Show</a>    
                                        <a class="btn btn-success" href="{{ route('employee.edit',$employee->id) }}">Edit</a>   
                                        @csrf
                                        @method('DELETE')      
                                        <button type="submit" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </table>

                        {!! $employees->links() !!}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop

