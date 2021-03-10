@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{-- Profile Page --}}
            <div class="parallax shadow-sm" width="100%"></div>
            <img src="https://picsum.photos/140" class=" margin-left-custom rounded-circle margintop-custom ml-4 border shadow-sm " alt="Profile Picture">
            <p class="h2 mt-4 margin-left-custom">{{$user->name}}</p>
            <nav class="nav nav-masthead justify-content-end mb-3">
                {{-- <a class="nav-link btn btn-sm btn-outline-primary" href="{{route('jobSeeker.jobSeekers.edit', $user) }}">Edit Profile</a> --}}
            </nav>
        </div>

    </div>

    <div class="container bg-dark mt-2">
        <div class="row">
            <div class="col-6 text-left overflow-hidden mb-4">
                <div class="bg-light shadow-sm mx-auto text-dark " style="width: 80%; border-radius: 21px 21px 21px 21px;">

                    <div class="list-grlight bg-dark mt-5" style="border-radius: 21px 21px 21px 21px;">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Bio</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <p class="mb-1">{{$user->jobSeeker->personal_bio}}</p>
                            {{-- <small></small> --}}
                        </div>
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
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Education</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <p class="mb-1">{{$user->jobSeeker->education}}</p>
                            {{-- <small></small> --}}
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Skills</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <div>
                                <p class="mb-1 list-group-item text-light bg-dark ">{{$user->jobSeeker->skill_id_1}}</p>
                                <p class="mb-1 list-group-item text-light bg-dark ">{{$user->jobSeeker->skill_id_2}}</p>
                                <p class="mb-1 list-group-item text-light bg-dark ">{{$user->jobSeeker->skill_id_3}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 text-left text-white overflow-hidden mb-5">
                <div class="d-flex justify-content-center shadow-sm mx-auto text-dark mt-5 mb-5" style="width:100%; "><iframe width="100%" height="300px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                      style="border-radius: 21px 21px 21px 21px; border: 1px solid black;" class=""
                      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$user->jobSeeker->personal_postal_address}}+(JobSeeker)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                    </iframe>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start " style="border-radius: 21px 21px 21px 21px; height: 75px;">
                    <div>
                        <p class="h5 ml-4 ">From:</p>
                        <p class="h6 ml-4">{{$user->jobSeeker->personal_postal_address}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="float-right">
        {{-- <form style="display:inline-block" method="POST" action="{{route('jobSeeker.jobSeekers.destroy', $jobSeeker->id)}}"> --}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="form-control btn btn-outline-danger">Delete</button>
        </form>
        <a href="{{route('admin.jobSeekers.index') }}" class="btn btn-outline-dark"> Back</a>
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
