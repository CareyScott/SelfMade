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
                    <img src="https://picsum.photos/140" class="rounded-circle margintop-custom ml-4 border shadow-sm " alt="Profile Picture">
                </div>


                <div class="row">
                    <div class="col-12">
                        <h2 class="text-dark bg-light rounded d-inline-flex ml-3 mt-3">{{$jobSeeker->user->name}}</h2>
                    </div>
                    <div class="col-12">
                        <h5 class="text-dark bg-light rounded d-inline-flex ml-3 mt-3">+{{$jobSeeker->user->phone}}</h5>
                    </div>
                    <div class="col-12">
                        <a href="mailto:{{$jobSeeker->user->email}}?subject=Job Query Via Self-Made" <h5 class="text-dark d-inline-flex ml-3 mt-3">{{$jobSeeker->user->email}}</h5></a>
                    </div>
                    <div class="col-12">
                        <h5 class="text-dark d-inline-flex ml-3 mt-3">{{$jobSeeker->personal_bio}}</h5>
                    </div>
                    <div class="col-12">
                       <h5 class="text-dark d-inline-flex ml-3 mt-3">{{$jobSeeker->skill_id_1}}</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4" style="width:100%"><iframe width="100%" height="300" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                          src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$jobSeeker->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
                        </iframe>
                    </div>
                </div>
            </div>



            {{-- <table class="table table-striped table-dark text-white">
                        <tbody>
                            <tr>
                                <td>Name </td>
                                <td>{{ $jobSeeker->user->name }}</td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td>{{ $jobSeeker->user->phone }}</td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>{{$jobSeeker->user->email }}</td>
            </tr>
            <tr>
                <td>Postal Address </td>
                <td>{{ $jobSeeker->company_postal_address }}</td>
            </tr>
            <tr>
                <td>Employer Category</td>
                <td>{{ $jobSeeker->category }}</td>
            </tr>
            </tbody>
            </table> --}}

            {{-- <div class="col" style="width:100%"><iframe width="100%" height="300" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
                  src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$jobSeeker->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
            </iframe>
        </div> --}}

        <div class="float-right">
            <form style="display:inline-block" method="POST" action="{{route('admin.jobSeekers.destroy', $jobSeeker->id)}}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="form-control btn btn-outline-danger">Delete</button>
            </form>
            <a href="{{route('admin.jobSeekers.edit', $jobSeeker->id) }}" class="btn btn-outline-info"> Edit</a>
            <a href="{{route('admin.jobSeekers.index') }}" class="btn btn-outline-dark"> Back</a>
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
@endsection
