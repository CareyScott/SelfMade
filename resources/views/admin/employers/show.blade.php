@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Profile Page --}}
    <div class="col">
        <div class="parallax shadow-sm" width="100%">
        </div>
        <img src="https://picsum.photos/140" class="rounded-circle margintop-custom ml-4 border shadow-sm " alt="Profile Picture">
    </div>

    <div class="row">
        <div class="col-12">
            <label for="title"><strong> Name </strong></label>
            <h2 class="text-dark bg-light rounded d-inline-flex ml-3 mt-3">{{$employer->user->name}}</h2>
        </div>
        <div class="col-12">
            <label for="title"><strong> Phone: </strong></label>
            <h5 class="text-dark bg-light rounded d-inline-flex ml-3 mt-3">{{$employer->user->phone}}</h5>
        </div>
        <div class="col-12">
            <label for="title"><strong> Email: </strong></label>
            <a href="mailto:{{$employer->user->email}}?subject=Job Query Via Self-Made" <h5 class="text-dark d-inline-flex ml-3 mt-3">{{$employer->user->email}}</h5></a>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col" style="width:100%"><iframe width="100%" height="300" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
              src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$employer->company_postal_address}}+(Employer)&amp;z=14&amp;ie=UTF8&amp;output=embed">
            </iframe>
        </div>
    </div>

    <div class="float-right mt-5">
        <form style="display:inline-block" method="POST" action="{{route('admin.employers.destroy', $employer->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="form-control btn btn-outline-danger">Delete</button>
        </form>
        <a href="{{route('admin.employers.edit', $employer->id) }}" class="btn btn-outline-info"> Edit</a>
        <a href="{{route('admin.employers.index') }}" class="btn btn-outline-dark"> Back</a>
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
