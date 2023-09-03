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
                            <li><strong> Đơn hàng</strong></li>
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
                                    <th class="cart-item-img" style="text-align: center;">ID đơn hàng</th>
                                    <th class="cart-product-name" style="text-align: center;">Sản phẩm</th>
                                    <th class="unit-price" style="text-align: center;">Giá</th>
                                    <th class="remove-icon" style="text-align: center;">Tình trạng</th>
                                    <th class="" style="text-align: center;"></th>
                                </tr>
                            </thead>
                            @if (client()->check() && $orders != null)
                                <tbody class="text-center">
                                    @foreach ($orders as $order)
                                        <tr style="font-size: 16px">
                                            <td class="cart-item-img" style="padding-top: 44px;">
                                                <span>{{ $order->idOrder }}</span>
                                            </td>
                                            <td class="cart-product-name">
                                                @foreach ($order->product as $value)
                                                    <span><a href="{{ route('shop.singleProduct', $value->idProduct) }}">{{ $value->sol }}
                                                            x {{ $value->idProduct }} --size:
                                                            {{ $value->size }}</a></span>
                                                    <br>
                                                @endforeach
                                            </td>

                                            <td class="unit-price">
                                                <span> {{ number_format($order->sumPrice) }} VND</span>
                                            </td>

                                            <td class="remove-icon" style="padding-top: 44px;">
                                                @if ($order->status == 'Đang xử lí')
                                                    <span
                                                        style="background-color: #0d6efd; color: #fff; padding: 4px; border-radius: 5px; font-size: 14px;">{{ $order->status }}</span>
                                                @elseif($order->status == 'Đang giao')
                                                    <span
                                                        style="background-color: #ffc107; color: #fff; padding: 4px; border-radius: 5px; font-size: 14px;">{{ $order->status }}</span>
                                                @elseif($order->status == 'Giao hàng thành công')
                                                    <span
                                                        style="background-color: #198754; color: #fff; padding: 4px; border-radius: 5px; font-size: 14px;">{{ $order->status }}</span>
                                                @elseif($order->status == 'Đã hủy')
                                                    <span
                                                        style="background-color: #dc3545; color: #fff; padding: 4px; border-radius: 5px; font-size: 14px;">{{ $order->status }}</span>
                                                @endif
                                            </td>
                                            @if ($order->status == 'Đang xử lí')
                                                <td style="padding-top: 44px;">
                                                    <form action="{{ route('deleteOrder', $order) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-danger" type="submit">
                                                            Hủy đơn hàng
                                                        </button>
                                                    </form>
                                                </td>
                                            @elseif ($order->status == 'Đang giao')
                                                <td style="padding-top: 44px;">
                                                    <form action="{{ route('completeOrder', $order) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-success" type="submit" style="background-color: #198754">
                                                            Đã nhận được hàng
                                                        </button>
                                                    </form>
                                                </td>
                                            @else
                                                <td style="padding-top: 44px;">
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart item area end -->
@endsection
