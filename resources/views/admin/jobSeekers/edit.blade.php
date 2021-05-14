@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit Employer </div>

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
                            <label for="title"> <strong>Pick skills</strong> </label>
                          </div>
                            {{-- <select name="skill">
                                @foreach ($skills as $skill)

                                <option value="{{$skill->id}}">{{$skill->name}}</option>

                                @endforeach
                            </select> --}}
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
    </div>
</div>
@include('layouts.footer')
@endsection
