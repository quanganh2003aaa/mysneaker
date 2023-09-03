@extends('Admin.welcome')
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/img/home_slider_image_1.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/home_slider_image_3.jpg') }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/home_slider_image_4.jpg') }}" class="d-block w-100"
                                alt="...">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
