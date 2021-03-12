@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="col shadow p-3 mb-5 bg-white rounded  mx-auto">
                <div id="carouselExampleControls" class="carousel slide" width="100%" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="{{url('/images/car-1.png')}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="h2">Looking for work?</h5>
                                <p>We've got you covered!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{url('/images/car-2.png')}}" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="h2">Need employees for your Start-Up?</h5>
                                <p>Some of the world's leading Start-Ups Come to us for Help!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{url('/images/car-3.png')}}" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="h2">Need Help Starting Up?</h5>
                                <p>We will help you manage you company to the greatest extent!</p>
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




            <div class="container">
                <div class="row">
                    <div class="col-6 mt-4 mb-5">
                        <img src="{{url('/images/home-1.jpg')}}" class="img-fluid">
                        <p class="heading">View Employers</p>
                        <p class="sub-heading">See all of the Employers currently using Self-Made.</p>
                        <a href="{{route('admin.employers.index')}}"><button class="btn home-btn-dark text-light col-8 ">Employers</button></a>
                        <!--other item and closing tags etc-->
                        <img src="{{url('/images/home-2.jpg')}}" class="img-fluid mt-5">
                        <p class="heading">View all Jobs</p>
                        <p class="sub-heading">Click here to see all of the jobs currently on the market.</p>
                        <a href="{{route('admin.jobs.index')}}"><button class="btn home-btn-dark text-light col-8 bike-img-btn">Jobs</button></a>
                    </div>
                    <div class="col-6 mt-4 border border-dark mb-5">
                        <p class="heading mt-2">Recommended Jobs</p>
                          <p><strong>Jobs for: </strong></p>
                          {{$user->name}}
                          <br>
                          {{$user->jobSeeker->personal_postal_address}}
                          <br>
                           {{-- // will show skill name --}}
                          Skills: {{$user->jobSeeker->skill}}

                        @if (count(array($jobs)) === 0)
                        <p> There are no jobs.</p>
                        @else


                        @foreach ($jobs as $job)
                        <div class="media text-muted pt-3">

                            <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
                                <a href="{{ route('jobSeeker.jobs.show', $job->id) }}"><strong class="d-block text-dark">{{$job->title}}</strong></a>
                                {{$job->description}}
                            </p>
                        </div>
                        @endforeach

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col">
    </div>
</div>
</div>
</div>

<style>
    .heading {
        font-size: 36px;
        font-weight: 700;
    }

    .home-btn-dark {
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
