@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
          {{-- Profile Page --}}
          <div class="parallax shadow-sm" width="100%"></div>
          <img src="https://picsum.photos/140" class=" rounded-circle margintop-custom ml-4 border shadow-sm mx-auto " alt="Profile Picture">
          <p class="h2 mt-4 text-center">{{$employer->user->name}}</p>
          <div class=" col-1 mt-4 float-right">
              <a href="mailto:{{$employer->user->email}}?subject=Job Query Via Self-Made" <p class=" col btn btn-info ">Contact</p></a>
          </div>
      </div>

    </div>
</div>

<div class="container-fluid pure-black">
    <div class="container mt-2">
        <div class="row mt-3">
            <div class="col-8 text-left mt-2">
                <p class="h1 text-light">Employer Details</p>
                <div class="bg-light shadow-sm text-dark">
                    <div class="list-grlight">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Name</strong></h5>
                            </div>
                                <p class="mb-1">{{$employer->user->name}}</p>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Phone</strong></h5>
                            </div>
                            <p class="mb-1">{{$employer->user->phone}}</p>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Email</strong></h5>
                            </div>
                            <p class="text-dark d-inline-flex">{{$employer->user->email}}</p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Category</strong></h5>
                            </div>
                            <p class="mb-1">{{$employer->category}}</p>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col text-left text-white mt-5">
                <div class="d-flex justify-content-center shadow-sm mt-2"><iframe width="100%" height="290px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" style="border: 1px solid black;"
                      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$employer->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                    </iframe>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="bg-light col-6 shadow-sm text-dark mt-5 mb-5 ml-3 p-2">
                <div class="justify-content-center">
                    <h5 class="mb-1"><strong>Jobs by this Employer</strong></h5>
                </div>
                @if (count($jobs) === 0)
                <p> This employer hasn't posted any jobs yet. Check back soon!</p>

                @else
                @foreach ($jobs as $job)
                <div class="media text-muted pt-3">
                    <img
                      src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_177d4556b39%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_177d4556b39%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                      class="mr-2 rounded" style="width: 32px; height: 32px;"></img>
                    <p class="media-body pb-3 mb-0 medium lh-125 border-gray">
                        <a href="{{ route('jobSeeker.jobs.show', $job) }}"><strong class="d-block text-dark">{{$job->title}}</strong></a>
                        {{$job->description}}
                    </p>
                </div>
                @endforeach
                    @endif
            </div>
        </div>
        <div class="float-right">

            {{-- <form style="display:inline-block" method="POST" action="{{route('jobSeeker.employers.destroy', $employer->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="form-control btn btn-outline-danger">Delete</button>
            </form> --}}
            <a href="{{route('jobSeeker.home') }}" class="btn btn-light "> Back</a>
        </div>
        {{-- <div class="elfsight-app-bfda0810-0763-4d23-9ebb-f9d9042556aa"></div> --}}
    </div>
</div>

<style>
    .parallax {
        /* The image used */
        background-image: url("https://picsum.photos/1920/1080") !important;

        /* Set a specific height */
        min-height: 300px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .margintop-custom {
        margin-top: -100px !important;
    }

    .margin-bottom-custom {
        margin-bottom: -30px !important;
    }

    .margin-left-custom {
        margin-left: px !important;
    }

    .box-vertical-offset {
        margin-top: -250px !important;
    }

    .pure-black {
        background-color: #000000
    }
</style>

{{-- <script src="https://apps.elfsight.com/p/platform.js" defer></script> --}}

@include('layouts.footer')
@endsection
