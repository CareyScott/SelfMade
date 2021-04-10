@extends('layouts.app')
<link href="{{ asset('public\css\app.css') }}" rel="stylesheet">

@section('content')
<div class="container">

    <div class="row">
        <div class="col">




            {{-- `this hides the form not being used bugs out though` --}}
            {{-- <div class="form-group row ">
                <div class="mx-auto col-md-5">

                    <select class="form-control " name="form_split">
                        <option>I am an...</option>
                        <option value="employer">Employer</option>
                        <option value="jobSeeker">JobSeeker</option>
                    </select>


                    @error('skill')

                    @enderror
                </div>
            </div> --}}


            <h1 class="h1 title-font text-dark text-center mb-5 mt-5">SELF MADE.</h1>

            <h1 class="h3 mb-3 fw-normal text-center title-font">Sign Up</h1>


            <form method="POST" action="{{ route('register') }}">
                @csrf


                <div class="form-group row">

                    <div class="mx-auto col-md-5">
                        <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row ">

                    <div class="mx-auto col-md-5">
                        <input id="phone" type="phone" placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="mx-auto col-md-5">
                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="mx-auto col-md-5">
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">

                    <div class="mx-auto col-md-5">
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                {{-- <div class="form-group row col-md-6">
                            <label for="title"> Are you An Employer Or Job Seeker?</label>
                            <label>Yes
                                <input type="radio" name="jobSeeker" value="1" />

                                <input type="radio" name="employer" value="0" />
                            </label>
                        </div> --}}




                {{-- JobSeeker register form --}}

                {{-- <div class="form-group row jobSeeker box">

                    <div class="mx-auto col-md-5">
                        <input id="personal_postal_address" placeholder="Postal Address" type="text" class="form-control @error('personal_postal_address') is-invalid @enderror" name="personal_postal_address"
                        value="{{ old('personal_postal_address') }}" required autocomplete="personal_postal_address">

                        @error('personal_postal_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row jobSeeker box">

                    <div class="mx-auto col-md-5">
                        <input id="personal_bio" type="text" placeholder="Bio" class="form-control @error('personal_bio') is-invalid @enderror" name="personal_bio" value="{{ old('personal_bio') }}" required
                        autocomplete="personal_bio">

                        @error('personal_bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row jobSeeker box">

                    <div class="mx-auto col-md-5">
                        <input id="education" type="text" placeholder="Education" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required autocomplete="education">

                        @error('education')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row jobSeeker box">
                    <div class="mx-auto col-md-5">
                        <label for="skill" class="  text-md-right">{{ __('Skill') }}</label>

                        <select class="form-control " name="skill">
                            @foreach ($skills as $skill)
                            <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @endforeach
                        </select>


                        @error('skill')

                        @enderror
                    </div>
                </div> --}}



  {{-- JobSeeker register form END --}}





                {{-- <div class="form-group row jobSeeker box">
                    <div class="mx-auto col-md-5">
                        <label for="skill" class="  text-md-right">{{ __('Skill') }}</label>

                        <select class="form-control " name="skill">
                            @foreach ($skills as $skill)
                            <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @endforeach
                        </select>


                        @error('skill')

                        @enderror
                    </div>
                </div> --}}



                {{-- Employer register form--}}


                <div class="form-group row employer box">

                    <div class="mx-auto col-md-5">
                        <input id="company_postal_address" placeholder="Company Postal Address" type="text" class="form-control @error('company_postal_address') is-invalid @enderror" name="company_postal_address"
                        value="{{ old('company_postal_address') }}" required autocomplete="company_postal_address">

                @error('personal_postal_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
    </div>

    <div class="form-group row employer box">

        <div class="mx-auto col-md-5">
            <input id="category" type="text" placeholder="Category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('ccategory') }}" required
            autocomplete="category">

            @error('personal_bio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


{{-- Employer Register form END --}}




    <div class="form-group row">
        <div class="col-md-5 mx-auto">
            <button type="submit" class="w-100 btn btn-lg btn-dark">
                {{ __('Sign Up') }}
            </button>
        </div>
    </div>
    </form>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        $("select").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".box").hide();
                }
            });
        }).change();
    });
</script> --}}

@endsection
