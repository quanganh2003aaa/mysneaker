@extends('Admin.welcome')
@section('contents')
    <!-- News & Updates Traffic -->
    <div class="card">
        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body pb-0">
          <h5 class="card-title">Blog <span>| Today</span></h5>

          <div class="news">
            @foreach ($blogs as $blog)
            <div class="post-item clearfix">
                <img src="{{asset( $blog->imgBlog )}}" alt="">
                <h4><a href="#">{{$blog->title}}</a></h4>
                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
              </div>
            @endforeach
          </div><!-- End sidebar recent posts-->

        </div>
      </div><!-- End News & Updates -->
@endsection
