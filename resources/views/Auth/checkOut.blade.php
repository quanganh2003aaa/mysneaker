@extends('Auth.test')
@section('content')
    <!-- cart item area start -->
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong> Thủ tục thanh toán</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            @if (client()->check() && Auth::guard('client')->user()->cartClient != null)
                <form action="{{route('client.thank')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table-bordered table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name" style="text-align: center;">Tên sản phẩm</th>
                                            <th class="unit-price" style="text-align: center;">Size</th>
                                            <th class="subtotal">Thành tiền</th>
                                        </tr>
                                    </thead>

                                    <tbody class="">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($products as $product)
                                            <input type="hidden" name="product[{{$i}}][idProduct]" value="{{$product['id']}}">
                                            <input type="hidden" name="product[{{$i}}][sol]" value="{{$product['sol']}}">
                                            <input type="hidden" name="product[{{$i}}][size]" value="{{$product['size']}}">
                                            <tr style="height: 50px">
                                                <td class="cart-product-name" style="vertical-align: middle">
                                                    <span>{{$product['sol']}} x {{ $product['name'] }}</span>
                                                </td>
                                                <td class="unit-price">
                                                    <span>{{ $product['size'] }}</span>
                                                </td>
                                                <td class="subtotal">
                                                    <span>{{ number_format($product['price'] * $product['sol']) }}
                                                        VND</span>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a>
                                                <i class="fa fa-user"></i>
                                                Thông tin của bạn
                                            </a>
                                        </h4>
                                    </div>
                                    <div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="delivery-details">
                                                    <div class="list-style">
                                                        <div class="account-title">
                                                            <h4>Hãy check lại thông tin của bạn</h4>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                @if ($errord = session()->get('errors'))
                                                                    <ul>
                                                                        @foreach ($errors->messages() as $key => $error)
                                                                            <li>
                                                                                <i style="color: red">{{$error[0]}}</i>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-name">
                                                            <label style="display: unset">Tên <em>*</em> </label>
                                                            <input type="text" name="nameClient"
                                                                value="{{ client()->user()->nameClient }}">
                                                        </div>
                                                        <div class="form-name">
                                                            <label style="display: unset">Số điện thoại <em>*</em> </label>
                                                            <input type="tel" name="telClient" type="tel"
                                                                pattern="[0]{1}[1-9]{1}[0-9]{8}"
                                                                value="{{ client()->user()->telClient }}">
                                                        </div>
                                                        <div class="form-name">
                                                            <label style="display: unset">Địa chỉ <em>*</em> </label>
                                                            <input type="text" name="addressClient"
                                                                value="{{ client()->user()->addressClient }}">
                                                        </div>
                                                        <div class="form-name">
                                                            <label style="display: unset">Ghi chú </label>
                                                            <input type="text" name="note" class="col-sm-8"
                                                                placeholder="Ghi chú đơn hàng" value="null">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="sumPrice" value="{{$sumPrice}}">
                                <div class="totals" style="margin-top: 0px">
                                    <h3 style="margin-top: 10px">Tổng tiền <span>{{ number_format($sumPrice) }} VND</span></h3>
                                    <div class="shopping-button" style="border-top: 0px">
                                        <button type="submit">Tiến hành đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else

            @endif
        </div>
    </div>


    <!-- cart item area end -->
@endsection
