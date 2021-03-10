@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="col shadow p-3 mb-5 bg-white rounded">
                <div class="p-3  bg-white">
                    <div class="row">
                        <div class="col-5">
                            <a href="#"><img src="https://images.unsplash.com/photo-1484807352052-23338990c6c6?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid"></a>
                        </div>
                        <div class="col">
                            <a href="#">
                                <h2>Who are we?</h2>
                            </a>
                            <h5>Read this article to read more about us, and how we can help Kick Start your company to success.</h5>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row row-cols-2 row-cols-lg-2 g-2 g-lg-3">
                <div class="col shadow p-3 mb-5 bg-white rounded">
                    <div class="p-3  bg-white">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{route('login')}}"><img src="https://images.unsplash.com/photo-1509822929063-6b6cfc9b42f2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                      class="img-fluid"></a>
                            </div>
                            <div class="col">
                                <a href="{{route('login')}}">
                                    <h2>Login</h2>
                                </a>
                                <h5>Got an account with us? Login here.</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col shadow p-3 mb-5 bg-white rounded">
                    <div class="p-3  bg-white">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{route('register')}}"><img src="https://images.unsplash.com/photo-1517817748493-49ec54a32465?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                      class="img-fluid"></a>
                            </div>
                            <div class="col">
                                <a href="{{route('register')}}">
                                    <h2>Register</h2>
                                </a>
                                <h5>Dont have an account? Register here!</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col shadow p-3 mb-5 bg-white rounded">
                    <div class="p-3  bg-white">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{route('about')}}"><img src="https://images.unsplash.com/photo-1563906267088-b029e7101114?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                      class="img-fluid"></a>
                            </div>
                            <div class="col">
                                <a href="{{route('about')}}">
                                    <h2>About</h2>
                                </a>
                                <h5>Want to know more about us?</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <div class="col">
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

@endsection
