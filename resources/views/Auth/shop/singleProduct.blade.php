@extends('Auth.test')
@section('content')
    <!-- single product area start -->
    <div class="Single-product-location home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong>{{ $product->nameProduct }}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single product area end -->
    <!-- single product details start -->
    <div class="single-product-details">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="single-product-img tab-content">
                        <div class="single-pro-main-image tab-pane active" id="pro-large-img-1">
                            <a href="#"><img src="{{ asset($product->imgProduct) }}" class="optima_zoom"
                                    style="width: 500px" data-zoom-image="{{ asset($product->imgProduct) }}"
                                    alt="optima" /></a>
                        </div>
                    </div>
                    <div class="product-page-slider">
                        <div class="single-product-slider" style="border: 1px solid #eeeeee">
                            <a href="#pro-large-img-1" data-toggle="tab">
                                <img src="{{ asset($product->imgProduct) }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="single-product-details">
                        <a href="#" class="product-name">{{ $product->nameProduct }}</a>
                        <div class="list-product-info">
                            <div class="price-rating">
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    {{-- <a href="#" class="review">1 Review(s)</a> --}}
                                    {{-- <a href="#" class="add-review">Add Your Review</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="avalable">
                            <p>Tình trạng:<span> còn hàng</span></p>
                        </div>
                        <div class="item-price">
                            <span>{{ number_format($product->priceProduct) }} VND</span>
                        </div>
                        <div class="single-product-info">
                            <p>{{ $product->descriptionProduct }}</p>
                            <div class="share">
                                <img src="img/product/share.png" alt="">
                            </div>
                        </div>
                        <div class="action">
                            <ul class="add-to-links">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <form action="{{route('client.addCart')}}">
                            @csrf
                            <input type="hidden" name="idProduct" value="{{$product->idProduct}}">
                            <div class="select-catagory">
                                <div class="size-select">
                                    <label class="required">
                                        <em>*</em> Size
                                    </label>
                                    <div class="input-box">
                                        <select id="select-2" name="size">
                                            @foreach ($product->sizeProduct as $size)
                                                <option value="{{$size}}" {{ $product->sizeProduct == 'Liên hệ Order' ? 'selected' : ''}}>{{$size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-item">
                                <div class="single-cart">
                                    <label>Slg:</label>
                                    <div class="cart-plus-minus" >
                                        <input class="cart-plus-minus-box" type="text" name="sol" value="1" style="left: 28px">
                                    </div>
                                    <button type="submit" class="cart-btn">Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single product details end -->
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
