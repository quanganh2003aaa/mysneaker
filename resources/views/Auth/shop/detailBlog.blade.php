@extends('Auth.test')
@section('content')
    <!-- product main items area start -->
    <div class="product-main-items">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="{{ route('shop.index') }}" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong> {{$blog->title}}</strong></li>
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
                                <h2>Details Post</h2>
                            </div>
                            <div class="blog-area" style="padding-top: 0px">
                                <div class="blog-post-details">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{asset($blog->imgBlog)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <a href="#" class="blog-title">{{$blog->title}}</a>

                                        <span><a href="#">By {{$blog->author}} - </a>{{$blog->created_at}}</span>
                                        <p v-html="html">{{$blog->content}}</p>

                                        <div class="about-author">
                                            <div class="author-img">
                                                <img src="img/blog/admin.jpg" alt="">
                                            </div>
                                            <div class="author-content">
                                                <h3>About the Author: <a href="#">Admin</a> </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product main items area end -->
@endsection
