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



            <div class="col shadow p-3 mb-5 bg-white rounded  mx-auto">
                <div id="carouselExampleControls" class="carousel slide" width="100%" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="{{url('/images/car-1.png')}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="h2">Looking for work?</h5>
                                <p>We've got you covered!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{url('/images/car-2.png')}}" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="h2">Need employees for your Start-Up?</h5>
                                <p>Some of the world's leading Start-Ups Come to us for Help!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="{{url('/images/car-3.png')}}" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="h2">Need Help Starting Up?</h5>
                                <p>We will help you manage you company to the greatest extent!</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            </div>
            </div>
<div class="container">
      <div class="row">
          <div class="col-6 mt-4 mb-5">
              <img src="{{url('/images/home-1.jpg')}}" class="img-fluid">
              <p class="heading">View Employers</p>
              <p class="sub-heading">See all of the Employers currently using Self-Made.</p>
              <a href="{{route('admin.employers.index')}}"><button class="btn home-btn-dark text-light col-8 ">Employers</button></a>
          <!--other item and closing tags etc-->
              <img src="{{url('/images/home-2.jpg')}}" class="img-fluid mt-5">
              <p class="heading">View all Jobs</p>
              <p class="sub-heading">Click here to see all of the jobs currently on the market.</p>
              <a href="{{route('admin.jobs.index')}}"><button class="btn home-btn-dark text-light col-8 bike-img-btn">Jobs</button></a>
          </div>
          <div class="col-6 mt-4 border border-dark mb-5">
            <p class="heading mt-2">Active Employers</p>
            <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1016" height="428" style="display: block; width: 1016px; height: 428px;"></canvas>
            <p class="heading">Job Seeker Statistics</p>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Id</th>
                  <th>Phone</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jobSeekers as $jobSeeker)
                  <tr>
                  <td>{{$jobSeeker->id}}</td>
                  <td>{{$jobSeeker->user->name}}</td>
                  <td>{{$jobSeeker->user->email}}</td>
                  <td>{{$jobSeeker->user_id}}</td>
                  <td>{{$jobSeeker->user->phone}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
  </div>
  </div>


<style>
.heading {
    font-size: 36px;
    font-weight: 700;
}

.home-btn-dark {
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

<script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [1, 4, 3, 6, 3, 2, {{count($employers)}}],
            lineTension: 0,
            backgroundColor: '',
            borderColor: '#fffff',
            borderWidth: 5,
            pointBackgroundColor: '#000000'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
@include('layouts.footer')

@endsection
