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
              <div class="container shadow">
                  <div class="text-white">
                      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                              {{-- <div class="carousel-item active">
                                      <img class="d-block" src="{{url('/images/car-8.png')}}" alt="First slide">

                          </div> --}}
                          <div class="carousel-item active">
                              <img class="d-block" src="{{url('/images/car-2.png')}}" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                              <img class="d-block" src="{{url('/images/car-3.png')}}" alt="Third slide">

                          </div>
                          <div class="carousel-item">
                              <img class="d-block" src="{{url('/images/car-4.png')}}" alt="Fourth slide">
                          </div>
                      </div>
                      {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                              </a> --}}
                      {{-- <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                              </a> --}}
                  </div>
                  <div class="card-img-overlay mt-5 ml-5  ">
                      <h5 class="card-title h1 mt-5">Register Now</h5>
                      <p class="card-text h3 mt-5">Join the thousands of people who have found work using Self Made!</p>
                      {{-- <p class="card-text h4">Last updated 3 mins ago</p> --}}
                      <button type="button" class="btn btn-info mt-4" data-toggle="modal" data-target="#homeModal">Sign Up Free!</button>
                  </div>
              </div>

              <div class="modal fade" id="homeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                  <a class="col" href="{{route('register')}}"><button class=" mt-3 mb-3 p-5 text-center  btn-primary" >
                                      <p class="h5"> Register as Employer</p>
                                  </button></a>
                                  <a class="col" href="{{route('register')}}"><button class=" mt-3 mb-3 p-5 text-center  btn-primary" >
                                      <p class="h5"> Register as Job Seeker</p>
                                  </button></a>

                              </div>
                          </div>

                      </div>
                  </div>
              </div>

              {{-- <div class="row row-cols-2 row-cols-lg-2 g-2 g-lg-3">
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
                  <a href="{{route('register')}}"><img src="https://images.unsplash.com/photo-1517817748493-49ec54a32465?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid"></a>
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
                  <a href="{{route('about')}}"><img src="https://images.unsplash.com/photo-1563906267088-b029e7101114?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid"></a>
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

  </div> --}}
  <div class="row">
      <div class="col m-5">
          <p class="h2 mt-5 text-center">"Self Made are leading the industry to success. <br> Great platform!!"</p>
          <p class="h4 float-right">~ Forbes</p>
      </div>
  </div>

  <div class="row">
      <div class="col-6 mt-4">
          <img src="{{url('/images/home-1.jpg')}}" class="img-fluid">
          <p class="heading">About Us</p>
          <p class="sub-heading">Learn more About Self-Made Here.</p>
          <a href="{{route('about')}}"><button class="btn btn-dark text-light col-8 ">Learn More</button></a>
      </div>

      <!--other item and closing tags etc-->
      <div class="col-6 mt-4">
          <img src="{{url('/images/home-6.jpg')}}" class="img-fluid">
          <p class="heading">Looking For a Job?</p>
          <p class="sub-heading">Sign up here to begin finding grat jobs in the Start-Up Industry</p>
          <a href="{{route('register')}}"><button class="btn btn-dark text-light col-8 bike-img-btn">Sign Up</button></a>
      </div>
  </div>

  <div class="row">
      <div class="col-6 mt-4">
          <img src="{{url('/images/home-5.jpg')}}" class="img-fluid">
          <p class="heading">Are you an Employer?</p>
          <p class="sub-heading">Employers can create accounts and post listings easy!</p>
          <a href="{{route('about')}}"><button class="btn btn-dark text-light col-8 bike-img-btn">Learn More</button></a>
      </div>

      <!--other item and closing tags etc-->
      <div class="col-6 mt-4 mb-4">
          <img src="{{url('/images/home-4.jpg')}}" class="img-fluid">
          <p class="heading">Not registered?</p>
          <p class="sub-heading">Click below to begin your professional journey</p>
          <a href="{{route('register')}}"><button class="btn btn-dark text-light col-8 bike-img-btn">Click Here</button></a>
      </div>
  </div>

  </div>

  <br>
  <div class="col">
  </div>
  </div>
  </div>
  </div>

  <style>
      .heading {
          font-size: 36px;
          font-weight: 700;
      }

      .btn-dark {
          background-color: #000000;
      }

      .sub-heading {
          font-size: 16px;
          font-weight: 400;
          letter-spacing: .02rem;
          margin-top: 20px;
          margin-bottom: 20px;
      }
  </style>
  @include('layouts.footer')

  @endsection
