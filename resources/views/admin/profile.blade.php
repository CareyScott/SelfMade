@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{-- Profile Page --}}
            <div class="parallax shadow-sm" width="100%"></div>
            <img src="https://picsum.photos/140" class=" rounded-circle margintop-custom ml-4 border shadow-sm mx-auto " alt="Profile Picture">
            <p class="h2 mt-4 text-center">{{$user->name}}</p>

        </div>
    </div>
</div>
<div class="container-fluid pure-black mt-2">
    <div class="container">
        <div class="row">
            <div class="col-8 text-left overflow-hidden">
              <p class="h1 text-light mt-3">Admin Details</p>

                <div class="bg-light shadow-sm mx-auto text-dark">
                    <div class="list-grlight pure-black mt-3">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Name</strong></h5>
                            </div>
                            <p class="mb-1">{{$user->name}}</p>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Email</strong></h5>
                            </div>
                          <p class="text-dark d-inline-flex">{{$user->email}}</p>
                        </div>
                    </div>
                </div>

            </div>



            <div class="col-4 text-left text-white overflow-hidden mb-3">
              <p class="h1 text-light mt-3">Location</p>
{{-- map recieved from google -- location is inputted inside the link --}}
                <div class="d-flex justify-content-center shadow-sm mx-auto text-dark mt-3 mb-5" style="width:100%; "><iframe width="100%" height="300px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                      style=" border: 1px solid black;" class=""
                      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{'SelfMade HQ'}}+&amp;z=14&amp;ie=UTF8&amp;output=embed">
                    </iframe>
                </div>

            </div>
        </div>

        <div class="float-right">
            <a href="{{route('admin.home') }}" class="btn btn-light"> Back</a>
        </div>
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
