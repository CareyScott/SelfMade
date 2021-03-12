@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit Job </div>

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

                    <form method="POST" action="{{route('employer.jobs.update', $job->id)}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="title"> Job Title </label>
                            <input type="title" class="form-control" id='title' name='title' value='{{old('date_uploaded' , $job->title)}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Employer </label>
                            <select name="employer_id">

                                @foreach ($employers as $employer)

                                <option value="{{$employer->id}}" selected="{{$employer->user->name}}">{{$employer->user->name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title"> Date Uploaded </label>
                            <input type="date" class="form-control" id='date_uploaded' name='date_uploaded' value='{{old('date_uploaded' , $job->date_uploaded)}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Valid Until </label>
                            <input type="date" class="form-control" id='valid_until' name='valid_until' value='{{old('valid_until',$job->valid_until)}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Salary </label>
                            <input type="text" class="form-control" id='salary' name='salary' value='{{old('salary',$job->salary)}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> description </label>
                            <input type="text" class="form-control" id='description' name='description' value='{{old('description',$job->description)}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Job Category </label>
                            <select name="job_category_id">
                                @foreach ($jobCategories as $jobCategory)

                                <option value="{{$jobCategory->id}}">{{$jobCategory->title}}</option>

                                @endforeach
                            </select>
                        </div>


                        <div class="float-right">
                            <a href="{{route('employer.jobs.index')}}" class="btn btn-default"> Cancel </a>
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
