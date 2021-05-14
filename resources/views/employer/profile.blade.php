@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{-- Profile Page --}}
            <div class="parallax shadow-sm" width="100%"></div>
            <img src="https://picsum.photos/140" class=" rounded-circle margintop-custom ml-4 border shadow-sm mx-auto " alt="Profile Picture">
            <p class="h2 mt-4 text-center">{{$user->employer->user->name}}</p>
            <button class="btn btn-danger float-right " data-toggle="modal" data-target="#confirm-delete">
                Delete Profile
            </button>
            <button class="btn btn-info float-right mr-2" data-toggle="modal" data-target="#create">
                Edit Profile
            </button>
        </div>

    </div>

</div>



<div class="container-fluid pure-black mt-2">
    <div class="container">
        <div class="row">
            <div class="col-8 text-left overflow-hidden">
              <p class="h1 text-light mt-3">Personal Details</p>

                <div class="bg-light shadow-sm mx-auto text-dark">
                    <div class="list-grlight pure-black mt-3">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Name</strong></h5>
                            </div>
                            <p class="mb-1">{{$user->employer->user->name}}</p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Phone</strong></h5>
                            </div>
                            <p class="mb-1">{{$user->employer->user->phone}}</p>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Email</strong></h5>
                            </div>
                          <p class="text-dark d-inline-flex">{{$user->employer->user->email}}</p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Category</strong></h5>
                            </div>
                            <p class="mb-1">{{$user->employer->category}}</p>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Postal Address</strong></h5>
                            </div>
                            <p class="mb-1">{{$user->employer->company_postal_address}}</p>
                        </div>


                    </div>
                </div>

            </div>



            <div class="col-4 text-left text-white overflow-hidden mb-3">
              <p class="h1 text-light mt-3">Location</p>

                <div class="d-flex justify-content-center shadow-sm mx-auto text-dark mt-3 mb-5" style="width:100%; "><iframe width="100%" height="300px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                      style=" border: 1px solid black;" class=""
                      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$user->employer->company_postal_address}}+(jobSeeker)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                    </iframe>
                </div>

            </div>
        </div>

        <div class="float-right">


            <a href="{{route('employer.home') }}" class="btn btn-light"> Back</a>
        </div>
    </div>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pure-black text-light">
                    Are you sure?
                </div>
                <div class="modal-body">
                    <p class="mb-1">Are you sure you want to delete your account?</p>
                    <p class="mb-1">This action cannot be undone.</p>
                    <p class="mb-1">You will be logged out and brought to the home page.</p>
                    <p class="mb-1"><strong>Account Name: {{$user->employer->user->name}}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <form style="display:inline-block" method="POST" action="{{route('employer.employers.destroy', $user->employer->id)}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pure-black text-light">
                    Edit Profile
                </div>
                <div class="modal-body">
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

                        <form method="POST" action="{{route('employer.employers.update', $user->employer->id)}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="title"> Name </label>
                                <input type="text" class="form-control" id='name' name='name' value='{{old('name' , $user->employer->user->name)}}' />
                            </div>

                            <div class="form-group">
                                <label for="title"> Phone </label>
                                <input type="text" class="form-control" id='phone' name='phone' value='{{old('phone' , $user->employer->user->phone)}}' />
                            </div>

                            <div class="form-group">
                                <label for="title"> Email </label>
                                <input type="text" class="form-control" id='email' name='email' value='{{old('email',$user->employer->user->email)}}'></input>
                            </div>

                            <div class="form-group">
                                <label for="title"> Postal Address </label>
                                <input type="text" class="form-control" id='company_postal_address' name='company_postal_address' value='{{old('company_postal_address',$user->employer->company_postal_address)}}'></input>
                            </div>

                            <div class="form-group">
                                <label for="title"> Category </label>
                                <input type="text" class="form-control" id='category' name='category' value='{{old('category',$user->employer->category)}}'></input>
                            </div>

                            <div class="float-right">
                                <a button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </a>
                                <button type="submit" class="btn btn-success pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

{{-- @if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif --}}

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
