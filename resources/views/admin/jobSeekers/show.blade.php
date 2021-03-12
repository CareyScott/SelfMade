

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                {{-- Profile Page --}}
                <div class="parallax shadow-sm" width="100%"></div>
                <img src="https://picsum.photos/140" class=" rounded-circle margintop-custom ml-4 border shadow-sm mx-auto " alt="Profile Picture">
                <p class="h2 mt-4 text-center">{{$jobSeeker->user->name}}</p>
                <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#create">
                    Edit Job Seeker
                </button>
            </div>
        </div>
    </div>


    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pure-black text-light">
                    Edit Job Seeker
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

                        <form method="POST" action="{{route('admin.jobSeekers.update', $jobSeeker->id)}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="title"> Employer Name </label>
                                <input type="text" class="form-control" id='name' name='name' value='{{old('name' , $jobSeeker->user->name)}}' />
                            </div>

                            <div class="form-group">
                                <label for="title"> Phone </label>
                                <input type="text" class="form-control" id='phone' name='phone' value='{{old('phone' , $jobSeeker->user->phone)}}' />
                            </div>

                            <div class="form-group">
                                <label for="title"> Email </label>
                                <input type="text" class="form-control" id='email' name='email' value='{{old('email',$jobSeeker->user->email)}}'></input>
                              </div>

                            <div class="form-group">
                                <label for="title"> Postal Address </label>
                                <input type="text" class="form-control" id='personal_postal_address' name='personal_postal_address' value='{{old('personal_postal_address',$jobSeeker->personal_postal_address)}}'></input>
                            </div>

                            <div class="form-group">
                                <label for="title"> Bio </label>
                                <input type="text" class="form-control" id='personal_bio' name='personal_bio' value='{{old('personal_bio',$jobSeeker->personal_bio)}}'></input>
                            </div>

                            <div class="form-group">
                                <label for="title"> education </label>
                                <input type="text" class="form-control" id='education' name='education' value='{{old('education',$jobSeeker->education)}}'></input>
                            </div>

                            <div class="form-group">
                              <div>
                                <label for="title"> <strong>Pick three appropriate skills</strong> </label>
                              </div>
                                <select name="skill">
                                    @foreach ($skills as $skill)

                                    <option value="{{$skill->id}}">{{$skill->name}}</option>

                                    @endforeach
                                </select>
                                <select name="skill">
                                    @foreach ($skills as $skill)

                                    <option value="{{$skill->id}}">{{$skill->name}}</option>

                                    @endforeach
                                </select>
                                {{-- <select name="skill_id_2">
                                    @foreach ($skills as $skill)

                                    <option value="{{$skill->id}}">{{$skill->name}}</option>

                                    @endforeach
                                </select>
                                <select name="skill_id_3">
                                    @foreach ($skills as $skill)

                                    <option value="{{$skill->id}}">{{$skill->name}}</option>

                                    @endforeach
                                </select> --}}
                            </div>


                            <div class="float-right">
                                <a href="{{route('admin.jobSeekers.index')}}" class="btn btn-default"> Cancel </a>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
                    <div class="bg-light shadow-sm mx-auto text-dark " style="width: 80%; border-radius: 21px 21px 21px 21px;">

                      <div class="list-grlight bg-dark mt-5" style="border-radius: 21px 21px 21px 21px;">
                          <div class="list-group-item list-group-item-action flex-column align-items-start">
                              <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1"><strong>Bio</strong></h5>
                                  {{-- <small>3 days ago</small> --}}
                              </div>
                              <p class="mb-1">{{$jobSeeker->personal_bio}}</p>
                              {{-- <small></small> --}}
                          </div>
                          <div class="list-group-item list-group-item-action flex-column align-items-start ">
                              <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1"><strong>Phone</strong></h5>
                                  {{-- <small>3 days ago</small> --}}
                              </div>
                              <p class="mb-1">{{$jobSeeker->user->phone}}</p>
                              {{-- <small></small> --}}
                          </div>
                          <div class="list-group-item list-group-item-action flex-column align-items-start ">
                              <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1"><strong>Email</strong></h5>
                                  {{-- <small>3 days ago</small> --}}
                              </div>
                              <a href="mailto:{{$jobSeeker->user->email}}?subject=Job Query Via Self-Made" <p class="text-dark d-inline-flex">{{$jobSeeker->user->email}}</p></a>
                              {{-- <small></small> --}}
                          </div>
                          <div class="list-group-item list-group-item-action flex-column align-items-start ">
                              <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1"><strong>Skills</strong></h5>
                                  {{-- <small>3 days ago</small> --}}
                              </div>
                              <div>
                                  <p class="mb-1 list-group-item text-light bg-dark ">{{$jobSeeker->skill}}</p>


                              </div>
                          </div>
                      </div>
                    </div>

                </div>



                <div class="col-6 text-left text-white overflow-hidden mb-5">
                    <div class="d-flex justify-content-center shadow-sm mx-auto text-dark mt-5 mb-5" style="width:100%; "><iframe width="100%" height="300px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                          style="border-radius: 21px 21px 21px 21px; border: 1px solid black;" class=""
                          src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$jobSeeker->company_postal_address}}+(jobSeeker)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                        </iframe>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start " style="border-radius: 21px 21px 21px 21px; height: 75px;">
                        <div>
                            <p class="h5 ml-4 ">User is based in:</p>
                            <p class="h6 ml-4">{{$jobSeeker->personal_postal_address}}</p>
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

            <a href="{{route('admin.jobSeekers.index') }}" class="btn btn-outline-dark"> Back</a>
        </div>

        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header pure-black text-light">
                        Are you sure you want to delete this Job Seeker?
                    </div>
                    <div class="modal-body">
                        <p class="mb-1">{{$jobSeeker->user->name}}</p>
                        <p class="mb-1">User-Id: &nbsp; {{$jobSeeker->user->id}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <form style="display:inline-block" method="POST" action="{{route('admin.jobSeekers.destroy', $jobSeeker->id)}}">
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
