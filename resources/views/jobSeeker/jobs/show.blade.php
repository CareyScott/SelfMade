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



<div class="container-fluid pure-black">
    <div class="container">
        <div class="row">
          <div class="col-7 mt-3 mx-auto list-group-item" style="width: 100%; border-radius: 10px 10px 10px 10px;">
              <p class="heading text-center">Job Listing</p>

              <div class=" shadow-sm mx-auto  " style="width: 90%; border-radius: 10px 10px 10px 10px;">
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
                        <h5 class="mb-1"><strong>Date Uploaded</strong></h5>
                    </div>
                    <p class="mb-1">{{$job->date_uploaded}}</p>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><strong>Application Deadline </strong></h5>
                    </div>
                    <p class="mb-1 ">{{$job->valid_until}}</p>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><strong>Skills Required</strong></h5>
                    </div>
                        <p>{{$job->skill_id}}</p>

                </div>
              </div>
          </div>

            <div class="col-4 mt-3  list-group-item mx-auto" style="width: 100%; border-radius: 10px 10px 10px 10px;">
                <p class="heading text-center">Employer</p>

              <a href="{{ route('jobSeeker.employers.show', $job->employer->id) }}">  <img src="https://picsum.photos/140" class=" rounded-circle mt-3 mb-2 border shadow-sm mx-auto " alt="Profile Picture"></a>
                <div class=" shadow-sm mx-auto text-dark " style="width: 100%; border-radius: 10px 10px 10px 10px;">


                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">

                            <h5 class="mb-1"><strong>Name</strong></h5>
                        </div>
                      <a href="{{ route('jobSeeker.employers.show', $job->employer->id) }}">  <p class="mb-1" >{{$job->employer->user->name}}</p> </a>
                    </div>
                    <div class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><strong>Email</strong></h5>
                        </div>
                        <a href="mailto:{{$job->employer->user->email}}?subject=Job Query Via Self-Made" <p class="text-dark d-inline-flex">{{$job->employer->user->email}}</p></a>
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
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col text-left text-white overflow-hidden mb-5">
                <div class="d-flex justify-content-center shadow-sm mx-auto text-dark mt-5 mb-5" style="width:100%; "><iframe width="100%" height="300px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                      style="border-radius: 10px 10px 10px 10px; border: 1px solid black;" class=""
                      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$job->employer->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                    </iframe>
                </div>
                <div class="list-group-item col-4 list-group-item-action flex-column align-items-start " style="border-radius: 10px 10px 10px 10px; height: 75px;">
                    <div>
                        <p class="h5 ml-3 ">Company is based in:</p>
                        <p class="h6 ml-3">{{$job->employer->company_postal_address}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right">

            <a href="{{route('admin.jobs.index') }}" class="btn btn-outline-light"> Back</a>
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



<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pure-black text-light">
                Are you sure you want to delete this Job?
            </div>
            <div class="modal-body">
                <p class="mb-1">{{$job->title}}</p>
                <p class="mb-1">Job-Id: &nbsp; {{$job->id}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <form style="display:inline-block" method="POST" action="{{route('admin.jobs.destroy', $job->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-outline-danger">Delete</button>
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
