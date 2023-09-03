@extends('Auth.test')
@section('content')
    <!-- cart item area start -->
    <div class="shopping-cart">
        <div class="container">
            <form action="{{ route('client.checkOut') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                                <li><strong> Giỏ hàng</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table-bordered table table-hover">
                                <thead>
                                    <tr>
                                        <th class="cart-item-img" style="text-align: center;">Ảnh</th>
                                        <th class="cart-product-name" style="text-align: center;">Tên sản phẩm</th>
                                        {{-- <th class="move-wishlist">Move to Wishlist</th> --}}
                                        <th class="unit-price" style="text-align: center;">Đơn giá</th>
                                        <th class="unit-price" style="text-align: center;">Size</th>
                                        <th class="quantity" style="text-align: center;">Số lượng</th>
                                        <th class="remove-icon"></th>
                                    </tr>
                                </thead>
                                @if (client()->check() && Auth::guard('client')->user()->cartClient != null)
                                    <tbody class="text-center">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach (cartDataAll() as $cartAll)
                                            <input type="hidden" name="product[{{$i}}][id]" value="{{$cartAll->idProduct}}">
                                            <input type="hidden" name="product[{{$i}}][name]" value="{{$cartAll->nameProduct}}">
                                            <input type="hidden" name="product[{{$i}}][img]" value="{{$cartAll->imgProduct}}">
                                            <input type="hidden" name="product[{{$i}}][size]" value="{{$cartAll->sizeProduct}}">
                                            <input type="hidden" name="product[{{$i}}][price]" value="{{$cartAll->priceProduct}}">
                                            <tr>
                                                <td class="cart-item-img">
                                                    <a href="{{ route('shop.singleProduct', $cartAll->idProduct) }}">
                                                        <img src="{{ asset($cartAll->imgProduct) }}" alt=""
                                                            style="width: 95px">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name">
                                                    <a
                                                        href="{{ route('shop.singleProduct', $cartAll->idProduct) }}">{{ $cartAll->nameProduct }}</a>
                                                </td>
                                                {{-- <td class="move-wishlist">
                                        <a href="#">Move</a>
                                    </td> --}}
                                                <td class="unit-price">
                                                    <span> {{ number_format($cartAll->priceProduct) }} VND</span>
                                                </td>
                                                <td class="unit-price">
                                                    <span>{{ $cartAll->sizeProduct }}</span>
                                                </td>
                                                <td class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="{{ $cartAll->sol }}"
                                                            style="width: 40px; border: none" class="cart-plus-minus-box"
                                                            name="product[{{$i}}][sol]" autocomplete="sol1" id="sol">
                                                    </div>
                                                </td>
                                                <td class="remove-icon">
                                                    <a href="{{ route('client.cart.delete', $i) }}">
                                                        <img src="{{ asset('assetsClient/img/cart/btn_remove.png') }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                        {{-- <div class="totals"> --}}
                            {{-- <h3>Tổng tiền <span>$1,540.00</span></h3> --}}
                            <div class="shopping-button" style="border: 1px solid #e03550">
                                <button type="submit" style="margin-left: 26px;">Tiến hành mua hàng</button>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- cart item area end -->
@endsection
