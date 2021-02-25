@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <h5>Doctor File</h5>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-dark text-white">
                        <tbody>
                            <tr>
                                <td>Patient: </td>
                                <td>{{ $doctor->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td>{{ $doctor->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td>{{ $doctor->user->postal_address }}</td>
                            </tr>
                            <tr>
                                <td>Date Started At Medical Centre: </td>
                                <td>{{ $doctor->date_started }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="float-right">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-light">Back</a>
                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="form-control btn btn-danger">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
