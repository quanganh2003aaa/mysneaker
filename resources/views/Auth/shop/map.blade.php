@extends('Auth.test')
@section('content')
    <!-- product items banner start -->
    <div class="product-banner">
        <img src="{{ asset('assetsClient/img/product/banner.jpg') }}" alt="">
    </div>
    <!-- product items banner end -->
    <!-- product main items area start -->
    <div class="product-main-items">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="{{ route('shop.index') }}" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong> Map</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="product-sidebar">
                        <div class="banner-left">
                            <img src="{{ asset('assetsClient/img/product/banner_left.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5344.949100574728!2d105.78789592636828!3d20.982028572103136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ade83ba9e115%3A0x6f4fdb5e1e9e39ed!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaeG6v24gdHLDumMgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1693562315849!5m2!1svi!2s" width="100%" height="450" style="border:0;padding: 45px 0px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- product main items area end -->
@endsection
