@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit Employer </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{route('employer.employers.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="title"> Employer Name </label>
                            <input type="text" class="form-control" id='name' name='name' value='{{old('name' )}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Phone </label>
                            <input type="text" class="form-control" id='phone' name='phone' value='{{old('phone' )}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Email </label>
                            <input type="text" class="form-control" id='email' name='email' value='{{old('email')}}'></input>
                          </div>

                        <div class="form-group">
                            <label for="title"> Postal Address </label>
                            <input type="text" class="form-control" id='company_postal_address' name='company_postal_address' value='{{old('company_postal_address')}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Category </label>
                            <input type="text" class="form-control" id='category' name='category' value='{{old('category')}}'></input>
                        </div>


                        <div class="float-right">
                            <a href="{{route('employer.employers.index')}}" class="btn btn-default"> Cancel </a>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
