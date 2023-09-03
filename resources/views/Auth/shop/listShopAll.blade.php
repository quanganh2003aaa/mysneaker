@extends('Auth.test2')
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
                            <li><a href="{{route('shop.index')}}" title="go to homepage">Home<span>/</span></a> </li>
                            @if ($brand == 'All')
                                <li><strong> Tất cả sản phẩm</strong></li>
                            @else
                                <li><strong> {{ $brand }}</strong></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="product-sidebar">
                        <div class="single-sidebar price">
                            <div class="single-sidebar-title">
                                <h3>Bộ lọc</h3>
                            </div>
                            <div class="single-sidebar-content">
                                <div class="price-range">
                                    <form action="" method="GET">
                                        <div class="price-filter">
                                            <p>
                                                <label for="amount">Khoảng giá:</label>
                                                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                                <input type="hidden" class="price_from" name="from">
                                                <input type="hidden" class="price_to" name="to">
                                            </p>
                                              <div id="slider-range"></div>
                                        </div>
                                        <button type="submit" class="filter-price"> <span>search</span> </button>
                                    </form>


                                </div>
                            </div>
                        </div>
                        <div class="banner-left">
                            <img src="{{ asset('assetsClient/img/product/banner_left.jpg') }}" alt="">
                        </div>
                        <div class="banner-left">
                            <img src="https://i.pinimg.com/564x/08/62/17/0862175616b6714b91855838dbbf0631.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="product-bar">
                        <ul class="product-navigation" role="tablist" style="padding-top: 17px">
                            <li role="presentation" class="active gird">
                                <a href="#gird" aria-controls="gird" role="tab" data-toggle="tab">
                                    <span>
                                        <img class="primary" src="{{ asset('assetsClient/img/product/grid-primary.png') }}"
                                            alt="">
                                    </span>
                                    Gird
                                </a>
                            </li>
                            <li role="presentation" class="list">
                                <a href="#list" aria-controls="list" role="tab" data-toggle="tab">
                                    <span>
                                        <img class="primary" src="{{ asset('assetsClient/img/product/list-primary.png') }}"
                                            alt="">
                                    </span>
                                    List
                                </a>
                            </li>
                        </ul>
                        <div class="sort-by">
                            <label>Sort By</label>
                            <select name="sort">
                                <option value="#" selected>Position</option>
                                <option value="#">Name</option>
                                <option value="#">Price</option>
                            </select>
                            <a href="#" title="Set Descending Direction">
                                <img src="{{ asset('assetsClient/img/product/i_asc_arrow.gif') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product-content">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active fade in home2" id="gird">
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="single-product">
                                                <div class="level-pro-new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-img">
                                                    <a href="{{ route('shop.singleProduct', $product->idProduct) }}">
                                                        <img src="{{ asset($product->imgProduct) }}" alt=""
                                                            class="primary-img" style="transition: all 2s linear;">
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
                                    {{ $products->links('Auth.paginate') }}
                                </div>
                                <div role="tabpanel" class="tab-pane fade home2" id="list">
                                    <div class="product-catagory">
                                        @foreach ($productLists as $productList)
                                            <div class="single-list-product">
                                                <div class="col-sm-4">
                                                    <div class="list-product-img">
                                                        <a href="single-product.html">
                                                            <img src="{{ asset($productList->imgProduct) }}"
                                                                alt="" style="transition: all 2s linear;"
                                                                class="primary-img">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="list-product-info">
                                                        <a href="{{ route('shop.singleProduct', $productList->idProduct) }}"
                                                            class="list-product-name"> {{ $productList->nameProduct }}</a>
                                                        <div class="price-rating">
                                                            <span>{{ number_format($productList->priceProduct) }}
                                                                VND</span>
                                                        </div>
                                                        <div class="list-product-details">
                                                            <p>{{ $productList->descriptionProduct }}</p>
                                                            {{-- <a href="single-product.html">Learn More</a> </p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{ $productLists->links('Auth.paginateList') }}
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

