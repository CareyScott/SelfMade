@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
  <div class="col">
    <h1 class="h1 ml-2">Employers</h1>
  </div>
  </div>

    <div class="row">
        <div class="col-8">
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <h6 class="border-bottom border-gray pb-2 mb-0"> Employers </h6>

{{-- show all employers from db in list --}}
                @if (count($employers) === 0)
                <p> There are no employers.</p>
                @else

                @foreach ($employers as $employer)
                <div class="media text-muted pt-3">
                    <img
                      src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_177d4556b39%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_177d4556b39%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                      class="mr-2 rounded" style="width: 32px; height: 32px;"></img>
                    <p class="media-body pb-3 mb-0 medium lh-125 border-bottom border-gray">
                        <a href="{{ route('admin.employers.show', $employer->id) }}"><strong class="d-block text-dark">{{$employer->user->name}}</strong></a>
                        {{$employer->company_postal_address}}
                    </p>
                </div>
                @endforeach
                <div class="col mt-5">
                    {{ $employers->links() }}
                </div>
                @endif
            </div>
        </div>
        <div class="col-4">
            <div class="my-3 p-3 bg-white rounded box-shadow col">
                <div class="card-body">
                    <h5 class="card-title">Create an Employer</h5>
                    <p class="card-text">Administrators, follow the link below to create a new Employer.</p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#create">
                        Create Employer
                    </button>

                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header pure-black text-light">
                                    Create Employer
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

                                            <form method="POST" action="{{route('admin.employers.store')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <div class="form-group">
                                                    <label for="title"> Employer Name </label>
                                                    <input type="text" class="form-control" id='name' name='name' value='{{old('name' )}}' />
                                                </div>

                                                <div class="form-group">
                                                    <label for="title"> Phone </label>
                                                    <input type="text" class="form-control" id='phone' name='phone' value='{{old('phone' )}}' />
                                                </div>

                                                <div class="form-group">
                                                    <label for="title"> Email </label>
                                                    <input type="text" class="form-control" id='email' name='email' value='{{old('email')}}'></input>
                                                  </div>

                                                <div class="form-group">
                                                    <label for="title"> Postal Address </label>
                                                    <input type="text" class="form-control" id='company_postal_address' name='company_postal_address' value='{{old('company_postal_address')}}'></input>
                                                </div>

                                                <div class="form-group">
                                                    <label for="title"> Category </label>
                                                    <input type="text" class="form-control" id='category' name='category' value='{{old('category')}}'></input>
                                                </div>


                                                <div class="float-right">
                                                    <a data-dismiss="modal" class="btn btn-default"> Cancel </a>
                                                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                </div>

                            </div>
                        </div>
                    </div>
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



</div>
{{-- </div> --}}
{{-- </div> --}}
@include('layouts.footer')
@endsection
