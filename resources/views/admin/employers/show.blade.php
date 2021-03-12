@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{-- Profile Page --}}
            <div class="parallax shadow-sm" width="100%"></div>
            <img src="https://picsum.photos/140" class=" rounded-circle margintop-custom ml-4 border shadow-sm mx-auto " alt="Profile Picture">
            <p class="h2 mt-4 text-center">{{$employer->user->name}}</p>
            <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#create">
                Edit Employer
            </button>
        </div>
    </div>
</div>


<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pure-black text-light">
                Edit Employer
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

                    <form method="POST" action="{{route('admin.employers.update', $employer->id)}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="title"> Employer Name </label>
                            <input type="text" class="form-control" id='name' name='name' value='{{old('name' , $employer->user->name)}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Phone </label>
                            <input type="text" class="form-control" id='phone' name='phone' value='{{old('phone' , $employer->user->phone)}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Email </label>
                            <input type="text" class="form-control" id='email' name='email' value='{{old('email',$employer->user->email)}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Postal Address </label>
                            <input type="text" class="form-control" id='company_postal_address' name='company_postal_address' value='{{old('company_postal_address',$employer->company_postal_address)}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Category </label>
                            <input type="text" class="form-control" id='category' name='category' value='{{old('category',$employer->category)}}'></input>
                        </div>


                        <div class="float-right">
                            <a type="button" class="btn btn-default" data-dismiss="modal"> Cancel </a>
                            <button type="submit" class="btn btn-outline-primary pull-right">Submit</button>
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

<div class="container-fluid pure-black mt-2">
    <div class="container">

        <div class="row">
            <div class="col-6 text-left overflow-hidden">
                <div class="bg-light shadow-sm mx-auto text-dark " style="width: 80%; border-radius: 10px 10px 10px 10px;">

                    <div class="list-grlight pure-black mt-5" style="border-radius: 10px 10px 10px 10px;">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Name</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <p class="mb-1">{{$employer->user->name}}</p>
                            {{-- <small></small> --}}
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Phone</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <p class="mb-1">{{$employer->user->phone}}</p>
                            {{-- <small></small> --}}
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Email</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <a href="mailto:{{$employer->user->email}}?subject=Job Query Via Self-Made" <p class="text-dark d-inline-flex">{{$employer->user->email}}</p></a>
                            {{-- <small></small> --}}
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Category</strong></h5>
                                {{-- <small>3 days ago</small> --}}
                            </div>
                            <p class="mb-1">{{$employer->category}}</p>
                            {{-- <small></small> --}}
                        </div>

                    </div>
                </div>
                <div class="bg-light shadow-sm mx-auto text-dark mt-5 mb-5" style="width: 80%; border-radius: 10px 10px 10px 10px;">
                    <div class="justify-content-center">
                        <h5 class="mb-1 justify-content-center"><strong>Jobs By this Employer</strong></h5>
                    </div>
                    @foreach ($jobs as $job)
                    <div class="media text-muted pt-3">
                        <img
                          src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_177d4556b39%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_177d4556b39%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                          class="mr-2 rounded" style="width: 32px; height: 32px;"></img>
                        <p class="media-body pb-3 mb-0 medium lh-125 border-gray">
                            <a href="{{ route('admin.jobs.show', $job) }}"><strong class="d-block text-dark">{{$job->title}}</strong></a>
                            {{$job->description}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>



            <div class="col-6 text-left text-white overflow-hidden mb-5">
                <div class="d-flex justify-content-center shadow-sm mx-auto text-dark mt-5 mb-5" style="width:100%; "><iframe width="100%" height="300px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                      style="border-radius: 10px 10px 10px 10px; border: 1px solid black;" class=""
                      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$employer->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                    </iframe>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start " style="border-radius: 10px 10px 10px 10px; height: 75px;">
                    <div>
                        <p class="h5 ml-4 ">Company is based in:</p>
                        <p class="h6 ml-4">{{$employer->company_postal_address}}</p>
                    </div>
                </div>
            </div>
        </div>



        {{-- <div class="row">
        <div class="col-6 text-left text-white overflow-hidden box-vertical-offset">
            <div class="bg-light shadow-sm mx-auto text-dark mt-5 mb-5" style="width: 80%; height: 300px; border-radius: 21px 21px 21px 21px;">

            </div>
        </div>

    </div> --}}
    </div>

    <div class="float-right">

        <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
            Delete
        </button>

        <a href="{{route('admin.employers.index') }}" class="btn btn-outline-dark"> Back</a>
    </div>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pure-black text-light">
                    Are you sure you want to delete this Employer?
                </div>
                <div class="modal-body">
                    <p class="mb-1">{{$employer->user->name}}</p>
                    <p class="mb-1">User-Id: &nbsp; {{$employer->user->id}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <form style="display:inline-block" method="POST" action="{{route('admin.employers.destroy', $employer->id)}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="elfsight-app-bfda0810-0763-4d23-9ebb-f9d9042556aa"></div> --}}

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
