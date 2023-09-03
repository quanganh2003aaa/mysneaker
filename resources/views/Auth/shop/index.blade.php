<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Home || MySneaker </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assetsClient/img/PQTA (1).png') }}">

    @include('Auth.layouts.css')

</head>

<body>
    <header>
        <div class="top-link">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3 col-sm-9 hidden-xs">
                        <div class="call-support">
                            <p>Call support free: <span> (+84) 123 456 789</span></p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="dashboard">
                            <div class="account-menu">
                                <ul>
                                    <li class="search">
                                        <a href="#">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <ul class="search">
                                            <li>
                                                <form action="{{route('shop.search')}}" method="GET">
                                                    <input type="text" name="search">
                                                    <button type="submit"> <i class="fa fa-search"></i> </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-menu">
                                <ul>
                                    <li><a href="{{ route('client.cart') }}"> <img
                                                src="{{ asset('assetsClient/img/icon-cart.png') }}" alt="">
                                            @if (client()->check() && Auth::guard('client')->user()->cartClient != null)
                                                <span>{{ countCartData() }}</span>
                                            @else
                                                <span>0</span>
                                            @endif
                                        </a>
                                        <div class="cart-info">
                                            @if (client()->check() && Auth::guard('client')->user()->cartClient != null)
                                                <ul>
                                                    @foreach (cartData() as $pro)
                                                        <li>
                                                            <div class="cart-img">
                                                                <img src="{{ asset($pro->imgProduct) }}"
                                                                    style="width: 70px" alt="">
                                                            </div>
                                                            <div class="cart-details">
                                                                <a href="{{ route('shop.singleProduct', $pro->idProduct) }}"
                                                                    style="text-align: left">Code:
                                                                    {{ $pro->idProduct }}</a>
                                                                <p>{{ $pro->sol }} x
                                                                    {{ number_format($pro->priceProduct) }} VND
                                                                </p>
                                                                <p>Size: {{ $pro->sizeProduct }}</p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    @if (countCartData() > 5)
                                                        <p>Nhấn vào giỏ hàng để xem chi tiết</p>
                                                    @endif
                                                </ul>
                                                <a href="{{ route('client.cart') }}" class="checkout">Đi đến giỏ
                                                    hàng</a>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mainmenu-area home2 bg-color-tr product-items">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{ route('shop.index') }}">
                                <img src="{{ asset('assetsClient/img/PQTA (1).png') }}" alt=""
                                    style="height: 134px">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="mainmenu">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ route('shop.index') }}">Trang chủ</a>
                                    </li>
                                    <li class="mega-women"><a href="{{ route('shop.listShopAll', 'All') }}">Sneaker</a>
                                        <div class="sub-menu pages">
                                            <div class="part-1">
                                                <span>
                                                    <h6></h6>
                                                    @foreach ($brands as $brand)
                                                        <a
                                                            href="{{ route('shop.listShopAll', $brand->brand) }}">{{ $brand->brand }}</a>
                                                        <hr>
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="{{route('shop.map')}}">Địa chỉ</a></li>
                                    <li><a href="{{route('shop.blog')}}">Tin tức</a></li>
                                    <li><a href="#">Cá nhân</a>
                                        <div class="sub-menu pages">
                                            @if (client()->check())
                                                <span>
                                                    <a href="{{ route('client.infor') }}">{{ client()->user()->nameClient }}</a>
                                                </span>
                                                <hr>
                                                <span>
                                                    <a href="{{ route('client.cart') }}">Giỏ hàng</a>
                                                </span>
                                                <hr>
                                                <span>
                                                    <a href="{{ route('orderListClient') }}">Đơn hàng</a>
                                                </span>
                                                <hr>
                                                <form action="{{ route('clientLogout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        style="background:none; color:#fff; border:none; outline:none; padding:15px">
                                                        <span class="logout">Sign Out</span>
                                                    </button>
                                                </form>
                                            @else
                                                <span>
                                                    <a href="{{ route('get.clientLogin') }}">Đăng nhập</a>
                                                </span>
                                                <hr>
                                                <span>
                                                    <a href="{{ route('get.clientRegister') }}">Đăng kí</a>
                                                </span>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <!-- slider area start -->
    <div class="slider-area home2">
        <div class="bend niceties preview-2">
            <div id="nivoslider" class="slides">
                <img src="{{ asset('assetsClient/img/slider/slider-3.jpg') }}" alt=""
                    title="#slider-direction-1" />
                <img src="{{ asset('assetsClient/img/slider/slider-4.jpg') }}" alt=""
                    title="#slider-direction-2" />
            </div>
            <!-- direction 1 -->
            <div id="slider-direction-1" class="t-cn slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-lfl s-tb slider-1">
                    <div class="title-container s-tb-c title-compress">
                        <img src="{{ asset('assetsClient/img/slider/PQTA__2_-removebg-preview (1).png') }}"
                            alt="" style="width: 400px">
                        <h1 class="title1"></h1>
                        <h2 class="title2">sneaker center Việt Nam</h2>
                        <h3 class="title3">Đảm bảo sản phẩm chính hãng 100%</h3>
                        {{-- <a href="#"><span>read more</span></a> --}}
                    </div>
                </div>
            </div>
            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-lfl s-tb slider-2">
                    <div class="title-container s-tb-c">
                        <img src="{{ asset('assetsClient/img/slider/PQTA__2_-removebg-preview (1).png') }}"
                            alt="" style="width: 400px">
                        <h1 class="title1"></h1>
                        <h2 class="title2">sneaker center Việt Nam</h2>
                        <h3 class="title3">Đảm bảo sản phẩm chính hãng 100%</h3>
                        {{-- <a href="#"><span>read more</span></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider area end -->
    <!-- service area start -->
    <div class="service-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single-service">
                        <div class="sirvice-img">
                            <img src="{{ asset('assetsClient/img/service/Ảnh_chụp_màn_hình_2023-08-14_225106-removebg-preview (2).png') }}"
                                alt="">
                        </div>
                        <div class="service-info">
                            <h3>FREE SHIPPING</h3>
                            <p>Shop hỗ trợ miễn phí vận chuyển đơn hàng từ 10 triệu</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-service">
                        <div class="sirvice-img">
                            <img src="{{ asset('assetsClient/img/service/Ảnh_chụp_màn_hình_2023-08-14_230406-removebg-preview.png') }}"
                                alt="">
                        </div>
                        <div class="service-info">
                            <h3>UY TÍN 100%</h3>
                            <p>Shop đảm bảo về sự chính hãng và xuất sứ của sản phẩm</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-service">
                        <div class="sirvice-img">
                            <img src="{{ asset('assetsClient/img/service/Ảnh_chụp_màn_hình_2023-08-14_231114-removebg-preview.png') }}"
                                alt="">
                        </div>
                        <div class="service-info">
                            <h3>THANH TOÁN</h3>
                            <p>Shop chấp nhận mọi hình thức thanh toán</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->
    <!-- sell area start -->
    <div class="sell-area home2">
        <div class="sell-heading">
            <h2>Best seller</h2>
            <p>Subcribe to the Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                tincidunt ut laoreet dolore magna aliquam erat</p>
        </div>
        <div class="sell-slider">
            @foreach ($bss as $bs)
                <div class="single-product">
                    <div class="level-pro-new">
                        <span>new</span>
                    </div>
                    <div class="product-img">
                        <a href="{{ route('shop.singleProduct', $bs->idProduct) }}">
                            <img src="{{ $bs->imgProduct }}" alt="" class="primary-img"
                                style="transition: all 2s linear;">
                        </a>
                    </div>
                    <div class="actions">
                        <a href="{{ route('client.addCart', ['idProduct' => $bs->idProduct]) }}" class="addCart"
                            title="Add to cart">Thêm vào giỏ hàng</a>
                        <ul class="add-to-link">
                            <li><a href="#"> <i class="fa fa-heart-o"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-price">
                        <div class="product-name">
                            <a href="{{ route('shop.singleProduct', $bs->idProduct) }}"
                                title="Fusce aliquam">{{ $bs->nameProduct }}</a>
                        </div>
                        <div class="price-rating">
                            <span>{{ number_format($bs->priceProduct) }} VND</span>
                            <div class="ratings">
                                <i class="fa-solid fa-circle-check" style="color: #1e5cc8;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- sell area end -->
    <!-- feature products area start -->
    <div class="features-product home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="features-home2-slider">
                    @foreach ($products as $product)
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="level-pro-new">
                                    <span>new</span>
                                </div>
                                <div class="product-img">
                                    <a href="{{ route('shop.singleProduct', $product->idProduct) }}">
                                        <img src="{{ $product->imgProduct }}" alt="" class="primary-img"
                                            style="transition: all 2s linear;">
                                    </a>
                                </div>
                                <div class="actions">
                                    <a href="{{ route('client.addCart', ['idProduct' => $product->idProduct]) }}"
                                        class="addCart" title="Add to cart">Thêm vào giỏ hàng</a>
                                    <ul class="add-to-link">
                                        <li><a href="#"> <i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-price">
                                    <div class="product-name">
                                        <a href="{{ route('shop.singleProduct', $product->idProduct) }}"
                                            title="Fusce aliquam">{{ $product->nameProduct }}</a>
                                    </div>
                                    <div class="price-rating">
                                        <span>{{ number_format($product->priceProduct) }} VND</span>
                                        <div class="ratings">
                                            <i class="fa-solid fa-circle-check" style="color: #1e5cc8;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="features-home2-slider">
                    @foreach ($products2 as $product2)
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="level-pro-new">
                                    <span>new</span>
                                </div>
                                <div class="product-img">
                                    <a href="{{ route('shop.singleProduct', $product2->idProduct) }}">
                                        <img src="{{ $product2->imgProduct }}" alt="" class="primary-img"
                                            style="transition: all 2s linear;">
                                    </a>
                                </div>
                                <div class="actions">
                                    <a href="{{ route('client.addCart', ['idProduct' => $product2->idProduct]) }}"
                                        class="addCart" title="Add to cart">Thêm vào giỏ hàng</a>
                                    <ul class="add-to-link">
                                        <li><a href="#"> <i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-price">
                                    <div class="product-name">
                                        <a href="{{ route('shop.singleProduct', $product2->idProduct) }}"
                                            title="Fusce aliquam">{{ $product2->nameProduct }}</a>
                                    </div>
                                    <div class="price-rating">
                                        <span>{{ number_format($product2->priceProduct) }} VND</span>
                                        <div class="ratings">
                                            <i class="fa-solid fa-circle-check" style="color: #1e5cc8;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- feature products area end -->
    <hr>
    <!-- another banner area start -->
    <div class=" another-banner-area">
        <div class="container">
        </div>
    </div>
    <!-- another banner area end -->
    <!-- blog area start -->
    <div class="blog-area home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-heading">
                        <h2>From <strong> The Blog</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-sm-6">
                        <div class="single-home2-blog-post">
                            <div class="blog-img">
                                <a href="{{route('shop.detailBlog', $blog)}}">
                                    <img src="{{ asset($blog->imgBlog) }}" alt="">
                                    <i class="fa fa-file-photo-o"></i>
                                </a>
                            </div>
                            <div class="blog-content">
                                <a href="{{route('shop.detailBlog', $blog)}}" class="blog-title">{{$blog->title}}</a>
                                <span><a href="#">By {{$blog->author}} - </a>{{$blog->created_at}}</span>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna...</p>
                                <a href="{{route('shop.detailBlog', $blog)}}" class="readmore">read more ></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- blog area end -->
    <!-- quickview product start -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="" src="{{ asset('assetsClient/img/product/quick-view.jpg') }}">
                                </div>
                            </div>

                            <div class="product-info">
                                <h1>Diam quis cursus</h1>
                                <div class="price-box">
                                    <p class="price"><span class="special-price"><span
                                                class="amount">$132.00</span></span></p>
                                </div>
                                <a href="shop.html" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">
                                    <form method="post" class="cart">
                                        <div class="numbers-row">
                                            <input type="number" id="french-hens" value="3">
                                        </div>
                                        <button class="single_add_to_cart_button" type="submit">Add to
                                            cart</button>
                                    </form>
                                </div>
                                <div class="quick-desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec
                                        est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare
                                        lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus
                                        eu, suscipit id nulla.</p>
                                </div>
                                <div class="share-post">
                                    <div class="share-title">
                                        <h3>share this product</h3>
                                    </div>
                                    <div class="share-social">
                                        <ul>
                                            <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-pinterest"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Auth.layouts.footer')
    @include('Auth.layouts.js')
</body>

</html>

@section('content')
@endsection
