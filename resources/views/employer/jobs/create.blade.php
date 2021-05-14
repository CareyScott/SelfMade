@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-6 mx-auto">
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
                <div class="card">
                  <div class="card-header pure-black text-light">
                    <p>Create Job Listing</p>
                  </div>
                <div class="card-body">

                    <form method="POST" action="{{route('employer.jobs.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="title"> Job Title </label>
                            <input type="title" class="form-control" id='title' name='title' value='{{old('title')}}' />
                        </div>



                        <div class="form-group">
                            <label for="title"> Date Uploaded </label>
                            <input type="date" class="form-control" id='date_uploaded' name='date_uploaded' value='{{old('date_uploaded')}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Application Deadline </label>
                            <input type="date" class="form-control" id='valid_until' name='valid_until' value='{{old('valid_until')}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Salary (€/h) </label>
                            <input type="text" class="form-control" id='salary' name='salary' value='{{old('salary')}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Description </label>
                            <input type="text" class="form-control" id='description' name='description' value='{{old('description')}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Job Category </label>
                            <select name="job_category_id">
                                @foreach ($jobCategories as $jobCategory)

                                <option value="{{$jobCategory->id}}">{{$jobCategory->title}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title"> Skills Required</label>
                            <select name="skill_id">
                                @foreach ($skills as $skill)

                                <option value="{{$skill->id}}">{{$skill->name}}</option>

                                @endforeach
                            </select>
                        </div>


                        <div class="float-right">
                            <a href="{{route('home')}}" class="btn btn-default"> Cancel </a>
                            <button type="submit" class="btn btn-success pull-right">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
