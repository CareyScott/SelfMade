@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        {{-- <select class="form-select form-select-sm col px-2 mr-3 " aria-label="Default select example" name="jobCategories">
            <option selected>Location</option>
            @foreach ($employers as $employer)
            <option value="{{$employer->id}}">{{$employer->user->name}}</option>
            @endforeach
        </select> --}}
        <form class="form-inline my-2 my-md-0 col">
            <input class="form-control" placeholder="Search"></input>
        </form>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <h6 class="border-bottom border-gray pb-2 mb-0"> Employers </h6>

                @if (count($employers) === 0)
                <p> There are no employers.</p>
                @else

                @foreach ($employers as $employer)
                <div class="media text-muted pt-3">
                    <img
                      src="{{url('public/images/job.png')}}"
                      class="mr-2 rounded" style="width: 32px; height: 32px;"></img>
                    <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
                        <a href="{{ route('jobSeeker.employers.show', $employer->id) }}"><strong class="d-block text-dark">{{$employer->user->name}}</strong></a>
                        {{$employer->company_postal_address}}
                    </p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="col-4">

            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <div class="card-body">
                    <h5 class="card-title">Promotional Listing</h5>
                    <p class="card-text">Employers! This could be your listing. Click see more to find out more.</p>
                    <a href="#" class="btn btn-primary">See More</a>
                </div>
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
</div>

@include('layouts.footer')
@endsection
