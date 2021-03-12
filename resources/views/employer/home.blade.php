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
              <p class="heading title-font">Create A Listing</p>
              <p class="sub-heading">Create a job listing on Self-Made.</p>
              <a href="{{route('employer.jobs.create')}}"><button class="btn home-btn-dark text-light col-8 ">Jobs</button></a>
          <!--other item and closing tags etc-->
              <img src="{{url('/images/home-2.jpg')}}" class="img-fluid mt-5">
              <p class="heading title-font">View all Jobs</p>
              <p class="sub-heading">Click here to see all of the jobs currently on the market.</p>
              <a href="{{route('employer.jobs.index')}}"><button class="btn home-btn-dark text-light col-8 bike-img-btn">Jobs</button></a>
          </div>
          <div class="col-6 mt-4 border border-dark mb-5">
            <p class="heading title-font mt-2">Job Seeker Engagement</p>
            <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1016" height="428" style="display: block; width: 1016px; height: 428px;"></canvas>
            <p class="heading title-font">My Job Statistics</p>
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
                  <td><a href="{{ route('employer.jobSeekers.show', $jobSeeker->id) }}"><strong class="d-block text-dark">{{$jobSeeker->user->name}}</strong></a>
</td>
                  <td>{{$jobSeeker->user->email}}</td>
                  <td>{{$jobSeeker->user_id}}</td>
                  <td>{{$jobSeeker->user->phone}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="bg-light shadow-sm mx-auto text-dark mt-5 mb-5" style="width: 100%; ">
                <div class="justify-content-center">
                    <h5 class="mb-1 h5 justify-content-center"><strong>My Jobs</strong></h5>
                </div>
                @foreach ($jobs as $job)
                <div class="media text-muted pt-3">
                    <img
                      src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_177d4556b39%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_177d4556b39%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.5390625%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                      class="mr-2 rounded" style="width: 32px; height: 32px;"></img>
                    <p class="media-body pb-3 mb-0 medium lh-125 border-gray">
                        <a href="{{ route('employer.jobs.show', $job) }}"><strong class="d-block text-dark">{{$job->title}}</strong></a>
                        {{$job->description}}
                    </p>
                </div>
                @endforeach
                {{-- {{ $jobs->links() }} --}}
            </div>


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
