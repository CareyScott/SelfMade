@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row shadow mb-5">
        <div class="col  mt-4 mb-5">
            <p class="h2">Welcome, {{$user->name}} </p>
            <br>
            <p class="title-font h5 mt-2"><strong>Jobs for you..</strong></p>


            @if (count($jobs) === 0)

            <p class="mt-5 h5"> We Can't find any jobs for you at this time. Check back later.</p>
            @else

            @foreach ($jobs as $job)
            <div class="media text-muted pt-3">
              <img
                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_177d4556b39%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_177d4556b39%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                class="mr-2 rounded" style="width: 32px; height: 32px;"></img>
                <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
                    <a href="{{ route('jobSeeker.jobs.show', $job->id) }}"><strong class="d-block text-dark">{{$job->title}}</strong></a>
                    {{$job->description}}
                </p>
            </div>
            @endforeach

            @endif
        </div>

        <div class="col p-2">
            <p class="h2 mt-4">What's new?</p>
            <div id="carouselExampleControls" class="carousel slide" width="100%" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block" src="{{url('/images/car-8.png')}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="h2">Looking for work?</h5>
                            <p>We've got you covered!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="{{url('/images/car-2.png')}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="h2">Android, We've landed!</h5>
                            <p>Check out our new android app available from the app dtore.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="{{url('/images/car-3.png')}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="h2">Need Help Starting Up?</h5>
                            <p>We will help you get a position no matter what.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="{{url('/images/car-4.png')}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="h2">No matter the profession.</h5>
                            <p>We will help you find the right place for you.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>


    <div class="container">
        {{-- <div class="row">
      <div class="col"> <div class="col bg-dark text-light text-center">
              <p class="h1">Total Employers: {{count($employers)}}</p>
    </div>
</div>
<div class="col">
    <div class="col bg-dark text-light text-center">
        <p class="h1">Available Jobs: {{count($job)}}</p>
    </div>
</div>

</div> --}}
<div class="row mb-5">
    <div class="col">
        <img src="{{url('/images/home-1.jpg')}}" class="img-fluid">
        <p class="heading">View Employers</p>
        <p class="sub-heading">See all of the Employers currently using Self-Made.</p>
        {{-- <p class="sub-heading">Total Employers: {{count($employers)}}</p> --}}

        <a href="{{route('jobSeeker.employers.index')}}"><button class="btn btn-dark text-light col-8 ">Employers</button></a>
    </div>
    <div class="col">
        <!--other item and closing tags etc-->
        <img src="{{url('/images/home-2.jpg')}}" class="img-fluid">
        <p class="heading">View Jobs</p>
        <p class="sub-heading">Click here to see all of the jobs currently on the market.</p>
        {{-- <p class="sub-heading">Available Jobs: {{count($job)}}</p> --}}

        <a href="{{route('jobSeeker.jobs.index')}}"><button class="btn btn-dark text-light col-8 bike-img-btn">Jobs</button></a>
    </div>

    {{-- <div class="col"> <button class="col btn-dark text-light p-3 ml-5 mr-5 mt-3 text-center">
            <p class="h1">Available Jobs: {{count($job)}}</p>
    </button>
</div>
<div class="col"> <button class="col btn-dark text-light p-3 ml-5 mr-5 mt-3 text-center">
        <p class="h1">Total Employers: {{count($employers)}}</p>
    </button>
</div>
</div>
<div class="row mb-5">
    <a class="col" href="{{route('jobSeeker.jobs.index')}}"> <button class="col btn-dark text-light p-3 ml-5 mr-5 mt-3 text-center">
            <p class="h1">View Jobs Market</p>
        </button></a>
    <a class="col" href="{{route('jobSeeker.employers.index')}}"> <button class="col btn-dark text-light p-3 ml-5 mr-5 mt-3 text-center">
            <p class="h1">View All Employers </p>
        </button></a>
</div> --}}

</div>
</div>
</div>


<style>
    .heading {
        font-size: 36px;
        font-weight: 700;
    }

    .btn-dark {
        background-color: #000000;
    }

    .sub-heading {
        font-size: 16px;
        font-weight: 400;
        letter-spacing: .02rem;
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
@include('layouts.footer')

@endsection
