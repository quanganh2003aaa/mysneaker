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
                            <li><strong> Blog</strong></li>
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
                        <div class="banner-left">
                            <img src="https://i.pinimg.com/564x/08/62/17/0862175616b6714b91855838dbbf0631.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sidebar-title">
                                <h2>Blog Posts</h2>
                            </div>
                            <div class="blog-area" style="padding-top: 0px">
                                @foreach ($blogs as $blog)
                                <div class="single-blog-post-page">
                                    <div class="blog-img">
                                        <a href="blog-details.html">
                                            <img src="{{asset($blog->imgBlog)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <a href="{{route('shop.detailBlog', $blog)}}" class="blog-title">{{$blog->title}}</a>
                                        <span><a href="#">By {{$blog->author}} - </a>{{$blog->created_at}}</span>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna...</p>
                                        <a href="blog-details.html" class="readmore">read more &gt;</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="toolbar-bottom">
                                <ul>
                                    <li><span>Pages:</span></li>
                                    <li class="current"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"> <img src="{{asset('assetsClient/img/product/pager_arrow_right.gif')}}" alt=""> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product main items area end -->
@endsection
