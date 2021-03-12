@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <img src="{{url('/images/logo1.png')}}" alt="Image" class="mx-auto col-2 mt-5 mb-2" />

            <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>


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

                <div class="form-group row">

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





                <div class="form-group row">

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

                <div class="form-group row">

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

                <div class="form-group row">

                    <div class="mx-auto col-md-5">
                        <input id="education" type="text" placeholder="education" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required autocomplete="education">

                        @error('personal_bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Skill') }}</label>
                    <div class="mx-auto col-md-5">
                        <select name="skill">
                            <option value="{{2}}">pick me</option>
                        </select>
                        @error('skill')

                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Skill') }}</label>
                    <div class="mx-auto col-md-5">
                        <select name="skill">
                            {{-- @foreach ($skill as $skill) --}}

                            <option value="{{2}}">skill 2</option>


                        </select>
                        @error('skill')

                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5 mx-auto">
                        <button type="submit" class="w-100 btn btn-lg btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
