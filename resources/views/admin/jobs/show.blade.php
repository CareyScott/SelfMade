 @extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="parallax shadow-sm mb-4" width="100%">
              </div>
          </div>
      </div>

  </div>
<div class="container">
    <div class="row">
        <div class="col mb-3">
          <button class="btn btn-danger float-right ml-2" data-toggle="modal" data-target="#confirm-delete">
              Delete Job
          </button>
            <button class="btn btn-primary float-right ml-2" data-toggle="modal" data-target="#editEmployer">
                Edit Employer
            </button>
            <button class="btn btn-primary float-right " data-toggle="modal" data-target="#editJob">
                Edit Job
            </button>

        </div>
    </div>
</div>

<div class="modal fade" id="editJob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pure-black text-light">
                Edit Job
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
{{-- edit job form --}}
                    <form method="POST" action="{{route('admin.jobs.update', $job->id)}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="title"> Job Title </label>
                            <input type="title" class="form-control" id='title' name='title' value='{{old('title' , $job->title)}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Employer </label>
                            <select name="employer_id">

                                @foreach ($employers as $employer)

                                <option value="{{$employer->id}}" selected="{{$employer->user->name}}">{{$employer->user->name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title"> Date Uploaded </label>
                            <input type="date" class="form-control" id='date_uploaded' name='date_uploaded' value='{{old('date_uploaded' , $job->date_uploaded)}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> Application Deadline </label>
                            <input type="date" class="form-control" id='valid_until' name='valid_until' value='{{old('valid_until',$job->valid_until)}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Salary </label>
                            <input type="text" class="form-control" id='salary' name='salary' value='{{old('salary',$job->salary)}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Description </label>
                            <input type="text" class="form-control" id='description' name='description' value='{{old('description',$job->description)}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"> Job Category </label>
                            <select name="job_category_id">
                                @foreach ($jobCategories as $jobCategory)

                                <option value="{{$jobCategory->id}}">{{$jobCategory->title}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title"> Skills Required </label>
                            <select name="skill_id">
                                @foreach ($skills as $skill)

                                <option value="{{$skill->id}}">{{$skill->name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="float-right">
                            <a data-dismiss="modal" class="btn btn-default"> Cancel </a>
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
<div class="modal fade" id="editEmployer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
{{-- edit employer form --}}
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

{{-- display job details --}}
<div class="container-fluid pure-black">
    <div class="container">

        <div class="row">
            <div class="col-8 mt-3">
                <p class=" h1 title-font text-light">Job Details</p>

                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><strong>Title</strong></h5>
                    </div>
                    <p class="mb-1">{{$job->title}}</p>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><strong>Description</strong></h5>
                    </div>
                    <p class="mb-1">{{$job->description}}</p>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><strong>Application Deadline</strong></h5>
                    </div>
                    <p class="mb-1">{{$job->date_uploaded}}</p>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><strong>Valid Until</strong></h5>
                    </div>
                    <p class="mb-1 ">{{$job->valid_until}}</p>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><strong>Skills Required</strong></h5>
                    </div>
                    <p>{{$job->skill_id}}</p>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><strong>  Salary (€/h) </strong></h5>
                    </div>
                    <p>{{$job->salary}}</p>
                </div>
            </div>
            <div class="col  ml-3 pb-5">
                <div class="row mt-4 pb-2">
                    <a href="mailto:{{$job->employer->user->email}}?subject=Job Query Via Self-Made" <p class=" col btn btn-secondary disabled ">Apply Now!</p></a>
                </div>
                <div class="row">
                    <img class="img-fluid" src="https://picsum.photos/410/360">
                </div>

            </div>
        </div>

        <div class="row mt-2">
          <div class="col text-left text-white overflow-hidden mb-5">
              <p class="h1 text-light">Job Location</p>
                <div class="d-flex justify-content-center shadow-sm mx-auto text-dark mb-5" style="width:100%; "><iframe width="100%" height="300px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                      style=" border: 1px solid black;" class="" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$employer->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                    </iframe>
                </div>

    </div>
{{-- show employer details --}}
    <div class="col-4 mx-auto">
        <p class="title-font h1 text-light">Employer Details</p>

        {{-- <img src="https://picsum.photos/140" class=" rounded-circle mt-3 mb-2 border shadow-sm mx-auto " alt="Profile Picture"> --}}
        <div class=" shadow-sm mx-auto text-dark " style="width: 100%">


            <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">

                    <h5 class="mb-1"><strong>Name</strong></h5>
                </div>
                <p class="mb-1">{{$job->employer->user->name}}</p>
            </div>
            <div class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><strong>Email</strong></h5>
                </div>
                <p class="mb-1">{{$job->employer->user->email}}</p>
            </div>
            <div class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><strong>Phone</strong></h5>
                </div>
                <p class="mb-1">{{$job->employer->user->phone}}</p>
            </div>
            <div class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><strong>Category</strong></h5>
                </div>
                <p class="mb-1 ">{{$job->employer->category}}</p>
            </div>
            <div class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><strong>Address</strong></h5>
                </div>
                <p class="h6 ml-3">{{$job->employer->company_postal_address}}</p>
            </div>

            <a  href="{{ route('admin.employers.show', $job->employer) }}"<p class=" col ml-2 mb-3 mt-3 btn btn-info float-right">View Employer Profile</p></a>

        </div>
    </div>
</div>

{{-- open delete modal --}}
<div class="float-right">
    {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
        Delete
    </button> --}}
    <a href="{{route('admin.jobs.index') }}" class="btn btn-light"> Back</a>
</div>
</div>
</div>




{{-- <table class="table table-striped table-dark text-white">
                        <tbody>
                            <tr>
                                <td>Name </td>
                                <td>{{ $employer->user->name }}</td>
</tr>
<tr>
    <td>Phone: </td>
    <td>{{ $employer->user->phone }}</td>
</tr>
<tr>
    <td>Email: </td>
    <td>{{$employer->user->email }}</td>
</tr>
<tr>
    <td>Postal Address </td>
    <td>{{ $employer->company_postal_address }}</td>
</tr>
<tr>
    <td>Employer Category</td>
    <td>{{ $employer->category }}</td>
</tr>
</tbody>
</table> --}}

{{-- <div class="col" style="width:100%"><iframe width="100%" height="300" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                  src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$employer->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
</iframe>
</div> --}}


{{-- delete job using delete in job controller --}}
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header pure-black">
          <h5 class="modal-title text-light" id="exampleModalLabel">Are you sure?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-light">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this job? </p>
          <p>This action cannot be undone.</p>
          <p class="mt-2"><strong>Job: {{$job->title}}</strong></p>
          <p><strong>Employer: {{$job->employer->user->name}}</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn " data-dismiss="modal">Close</button>
          <form style="display:inline-block" method="POST" action="{{route('admin.jobs.destroy', $job->id)}}">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="form-control btn btn-danger">Delete</button>
          </form>
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

    .heading {
        font-size: 36px;
        font-weight: 700;
    }
</style>
@include('layouts.footer')

@endsection
