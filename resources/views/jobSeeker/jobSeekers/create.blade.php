@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Create Job Seeker </div>

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

                    <form method="POST" action="{{route('jobSeeker.jobSeekers.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="title"><strong> Name </strong></label>
                            <input type="text" class="form-control" id='name' name='name' value='{{old('name' )}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> <strong>Phone </strong></label>
                            <input type="text" class="form-control" id='phone' name='phone' value='{{old('phone' )}}' />
                        </div>

                        <div class="form-group">
                            <label for="title"> <strong>Email </strong></label>
                            <input type="text" class="form-control" id='email' name='email' value='{{old('email')}}'></input>
                          </div>

                        <div class="form-group">
                            <label for="title"><strong> Postal Address </strong></label>
                            <input type="text" class="form-control" id='personal_postal_address' name='personal_postal_address' value='{{old('personal_postal_address')}}'></input>
                        </div>

                        <div class="form-group">
                            <label for="title"><strong> Bio </label>
                            <textarea type="text" class="form-control" id='personal_bio' name='personal_bio' value='{{old('personal_bio')}}'></textarea>
                        </div>

                        <div class="form-group">
                            <label for="title"><strong> Education </strong></label>
                            <input  type="text" class="form-control" id='education' name='education' value='{{old('education')}}'></input >
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
                            <a href="{{route('jobSeeker.jobSeekers.index')}}" class="btn btn-outline-default"> Cancel </a>
                            <button type="submit" class="btn btn-outline-primary pull-right">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
