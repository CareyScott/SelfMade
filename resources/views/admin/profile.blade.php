@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{-- Profile Page --}}
            <div class="parallax shadow-sm" width="100%"></div>
            <img src="https://picsum.photos/140" class=" rounded-circle margintop-custom ml-4 border shadow-sm mx-auto " alt="Profile Picture">
            <p class="h2 mt-4 text-center">{{$user->name}}</p>
            <nav class="nav nav-masthead justify-content-end mb-3">
                <a class="nav-link btn btn-sm btn-outline-primary" href="{{route('admin.jobSeekers.edit', $user->id) }}">Edit Profile</a>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid pure-black mt-2">
    <div class="container">
        <div class="row">
            <div class="col-6 text-left overflow-hidden">
                <div class="bg-light shadow-sm mx-auto text-dark " style="width: 80%; border-radius: 21px 21px 21px 21px;">

                    <div class="list-grlight mt-5" style="border-radius: 21px 21px 21px 21px;">

                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Phone</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <p class="mb-1">{{$user->phone}}</p>
                            {{-- <small></small> --}}
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Email</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <a href="mailto:{{$user->email}}?subject=Job Query Via Self-Made" <p class="text-dark d-inline-flex">{{$user->email}}</p></a>
                            {{-- <small></small> --}}
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-6 text-left text-white overflow-hidden mb-5">
                <div class="d-flex justify-content-center shadow-sm mx-auto text-dark mt-5 mb-5" style="width:100%; "><iframe width="100%" height="300px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                      style="border-radius: 21px 21px 21px 21px; border: 1px solid black;" class=""
                      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{'Self-Made HQ'}}+(JobSeeker)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                    </iframe>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start " style="border-radius: 21px 21px 21px 21px; height: 75px;">
                    <div>
                        <p class="h5 ml-4 ">From:</p>
                        <p class="h6 ml-4">Self-Made HQ</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="float-right">

            {{-- <form style="display:inline-block" method="POST" action="{{route('employer.employers.destroy', $user->employer->id)}}"> --}}
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{-- <button type="submit" class="form-control btn btn-outline-danger">Delete</button> --}}
            {{-- </form> --}}
            <a href="{{route('jobSeeker.home') }}" class="btn btn-outline-primary"> Back</a>
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

    .margin-left-custom {
        margin-left: px !important;
    }

    .box-vertical-offset {
        margin-top: -250px !important;
    }
</style>

{{-- <script src="https://apps.elfsight.com/p/platform.js" defer></script> --}}

@include('layouts.footer')
@endsection
