@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">



            {{-- Profile Page --}}
            <div class="container">
                <div class="col">
                    <div class="parallax shadow-sm" width="100%">
                    </div>

                </div>


                <div class="row">
                    <div class="col">
                      <h3 class="text-dark font-weight-bold ml-2 mt-4">Job Details</h3>
                        <div class="col-12">
                            <label class="text-dark font-weight-bold mt-2" for="title"> Job Title: </label>
                            <h5 class="text-dark bg-light rounded d-inline-flex ml-3 ">{{$job->title}}</h5>
                        </div>
                        <div class="col-12">
                            <label class="text-dark font-weight-bold" for="title"> Approximate Salary: </label>
                            <h5 class="text-dark bg-light rounded d-inline-flex ml-3 ">{{$job->salary}}</h5>
                        </div>
                        <div class="col-12">
                            <label class="text-dark font-weight-bold" for="title"> Description: </label>
                            <h5 class="text-dark bg-light rounded d-inline-flex ml-3 ">{{$job->description}}</h5>
                        </div>
                        <div class="col-12">
                            <label class="text-dark font-weight-bold" for="title"> Date Uploaded: </label>
                            <h5 class="text-dark bg-light rounded d-inline-flex ml-3">{{$job->date_uploaded}}</h5>
                        </div>
                        <div class="col-12">
                            <label class="text-dark font-weight-bold" for="title"> Valid Until: </label>
                            <h5 class="text-dark bg-light rounded d-inline-flex ml-3">{{$job->valid_until}}</h5>
                        </div>
                    </div>
                    <div class="col">
                        <img src="https://picsum.photos/140" class="rounded-circle border shadow-sm float-right mt-3" alt="Profile Picture">
                        <h3 class="text-dark font-weight-bold ml-2 mt-4">Employer Details</h3>
                        <div class="col-12">
                            <label class="text-dark font-weight-bold" for="title"> Employer Name: </label>
                            <h5 class="text-dark bg-light rounded d-inline-flex ml-3">{{$job->employer->user->name}}</h5>
                        </div>
                        <div class="col-12">
                            <label class="text-dark font-weight-bold" for="title"> Employer Phone: </label>
                            <h5 class="text-dark bg-light rounded d-inline-flex ml-3">{{$job->employer->user->phone}}</h5>
                        </div>
                        <div class="col-12">
                            <label class="text-dark font-weight-bold" for="title"> Employer Email: </label>
                            <a href="mailto:{{$job->employer->user->email}}?subject=Job Query Via Self-Made" <h5 class="text-dark d-inline-flex ml-3">{{$job->employer->user->email}}</h5></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4" style="width:100%"><iframe width="100%" height="300" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                          src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$job->employer->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                        </iframe>
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

        <div class="float-right">
            <form style="display:inline-block" method="POST" action="{{route('admin.jobs.destroy', $job->id)}}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="form-control btn btn-outline-danger">Delete</button>
            </form>
            <a href="{{route('admin.jobs.edit', $job->id) }}" class="btn btn-outline-info"> Edit</a>
            <a href="{{route('admin.jobs.index') }}" class="btn btn-outline-dark"> Back</a>
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
</style>
@include('layouts.footer')

@endsection
