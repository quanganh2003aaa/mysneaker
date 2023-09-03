@extends('Auth.test')
@section('content')
    <div style="height: 380px" class="thank row">
        <div class="col-md-12">
            <h3 class="thank1">Thank You</h3>
        </div>
        <div class="thank2 col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8 thank2-1" style="background-color:#6c6c6c; height: 120px">
                <div class="part1">
                    <h3>My Sneaker sẽ cố gắng giao sản phẩm đến tay bạn một cách nhanh nhất</h3>
                </div>
                <div class="part2">
                    <h5>Chúng tôi xin đảm bảo uy tín về chất lượng sản phẩm.</h5>
                    <h5>Nếu sản phẩm có vấn đề hãy liên hệ với My Sneaker để chúng tôi hỗ trợ bạn.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <a class="back-home col-md-12" href="{{route('shop.index')}}" style="">Home</a>
        </div>
        <div class="col-md-4">
            <a class="back-home col-md-12" href="{{route('orderListClient')}}" style="">Đơn hàng</a>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- feature products area start -->
    <div class="features-product home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-title">
                        <h2>Sản phẩm có thể bạn quan tâm</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="features-home2-slider">
                    @foreach ($tests as $test)
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="level-pro-new">
                                    <span>new</span>
                                </div>
                                <div class="product-img">
                                    <a href="{{ route('shop.singleProduct', $test->idProduct) }}">
                                        <img src="{{ asset($test->imgProduct) }}" alt="" class="primary-img"
                                            style="transition: all 2s linear;">
                                    </a>
                                </div>
                                <div class="actions">
                                    <a href="{{ route('client.addCart', ['idProduct' => $test->idProduct]) }}"
                                        class="addCart" title="Add to cart">Thêm vào giỏ hàng</a>
                                    <ul class="add-to-link">
                                        <li><a href="#"> <i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-price">
                                    <div class="product-name">
                                        <a href="{{ route('shop.singleProduct', $test->idProduct) }}"
                                            title="Fusce aliquam">{{ $test->nameProduct }}</a>
                                    </div>
                                    <div class="price-rating">
                                        <span>{{ number_format($test->priceProduct) }} VND</span>
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
    <!-- related product area end-->
@endsection
