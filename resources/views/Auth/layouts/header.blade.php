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
                                                            <img src="{{ asset($pro->imgProduct) }}" style="width: 70px"
                                                                alt="">
                                                        </div>
                                                        <div class="cart-details">
                                                            <a href="{{ route('shop.singleProduct', $pro->idProduct) }}" style="text-align: left">Code:
                                                                {{ $pro->idProduct }}</a>
                                                            <p>{{ $pro->sol }} x
                                                                {{ number_format($pro->priceProduct) }} VND</p>
                                                            <p>Size: {{ $pro->sizeProduct }}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                @if (countCartData() > 5)
                                                    <p>Nhấn vào giỏ hàng để xem chi tiết</p>
                                                @endif
                                            </ul>
                                            {{-- <h3>Tổng: <span> {{ sumPrice() }} VND</span></h3> --}}
                                            <a href="{{ route('client.cart') }}" class="checkout">Đi đến giỏ hàng</a>
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
    <div class="mainmenu-area home2 product-items">
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
                                                <a
                                                    href="{{ route('client.infor') }}">{{ client()->user()->nameClient }}</a>
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
                                                <button type="submit" class="logout"
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
