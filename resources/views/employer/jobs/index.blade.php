@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


        {{-- <select class="form-select form-select-sm col px-2 mr-1" aria-label="Default select example" name="jobCategories">
            <option selected>Job Category</option>
            @foreach ($jobCategories as $jobCategory)
            <option value="{{$jobCategory->id}}">{{$jobCategory->title}}</option>
            @endforeach
        </select>
        <select class="form-select form-select-sm col px-2 mr-1" aria-label="Default select example" name="jobCategories">
            <option selected>Companies</option>
            @foreach ($jobs as $job)
            <option value="{{$job->id}}">{{$job->employer->user->name}}</option>
            @endforeach
        </select>
        <select class="form-select form-select-sm col px-2 mr-3 " aria-label="Default select example" name="jobCategories">
            <option selected>Location</option>
            @foreach ($jobs as $job)
            <option value="{{$job->id}}">{{$job->employer->company_postal_address}}</option>
            @endforeach
        </select> --}}
        {{-- <form class="form-inline my-2 my-md-0 col">
            <input class="form-control" placeholder="Search"></input>
        </form> --}}
    </div>

    <div class="row">
        <div class="col-8">
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <h6 class="border-bottom border-gray pb-2 mb-0"> Jobs </h6>


                @if (count($jobs) === 0)
                <p> There are no jobs.</p>
                @else

                @foreach ($jobs as $job)
                <div class="media text-muted pt-3">
                    <img
                      src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_177d4556b39%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_177d4556b39%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                      class="mr-2 rounded" style="width: 32px; height: 32px;"></img>
                    <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
                        <a href="{{ route('employer.jobs.show', $job->id) }}"><strong class="d-block text-dark">{{$job->title}}</strong></a>
                        {{$job->description}}


                    </p>
                      {{-- <small class="date-only">{{$job->updated_at}}</small> --}}
                </div>
                @endforeach
                <div class="col mt-5">
                    {{-- {{ $jobs->links() }} --}}
                </div>
                @endif
            </div>

        </div>
        <div class="col-4">
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <div class="card-body">
                    <h5 class="card-title">Create a Listing</h5>
                    <p class="card-text">If you would like to create your own job listing follow the link below.</p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#create">
                        Create Job
                    </button>                </div>
            </div>
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <div class="card-body">
                    <h5 class="card-title">Promotional Listing</h5>
                    <p class="card-text">Employers! This could be your listing. Click see more to find out more.</p>
                    <a href="#" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pure-black text-light">
                    Create Job
                </div>
                <div class="modal-body">
                    {{-- @include('admin.employers.create') --}}



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
                                    <label for="title"> Valid Until </label>
                                    <input type="date" class="form-control" id='valid_until' name='valid_until' value='{{old('valid_until')}}'></input>
                                </div>

                                <div class="form-group">
                                    <label for="title"> Salary </label>
                                    <input type="text" class="form-control" id='salary' name='salary' value='{{old('salary')}}'></input>
                                </div>

                                <div class="form-group">
                                    <label for="title"> description </label>
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
                                    <label for="title"> Job Category </label>
                                    <select name="skill_id">
                                        @foreach ($skills as $skill)

                                        <option value="{{$skill->id}}">{{$skill->name}}</option>

                                        @endforeach
                                    </select>
                                </div>


                                <div class="float-right">
                                    <a class="btn btn-default" data-dismiss="modal"> Cancel </a>
                                    <button type="submit" class="btn btn-outline-primary pull-right">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <form style="display:inline-block" method="POST" action="{{route('admin.employers.destroy', $employer->id)}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-outline-danger">Delete</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
</div>
{{-- </div> --}}
{{-- </div> --}}
@include('layouts.footer')
@endsection
