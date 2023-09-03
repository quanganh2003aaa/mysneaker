@extends('Auth.test')
@section('content')
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong>Register page</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-area ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                <h2>Đăng Kí</h2>
                                <span>Vui lòng đăng ký bằng cách sử dụng chi tiết tài khoản dưới đây.</span>
                            </div>
                            <div class="login-form">
                                <form action="{{route('post.clientRegister')}}" method="POST">
                                    @csrf
                                    @if ($errord = session()->get('errors'))
                                        @foreach ($errors->messages() as $key => $error)
                                            <i style="color: red">{{ $error[0] }}</i>
                                        @endforeach
                                    @endif
                                    <input name="nameClient" placeholder="Tên của bạn" type="text">
                                    <input name="emailClient" placeholder="Email" type="email">
                                    <input name="passwordClient" placeholder="Mật khẩu" type="password">
                                    <input name="telClient" placeholder="Số điện thoại" type="tel"
                                        pattern="[0]{1}[1-9]{1}[0-9]{8}">
                                    <div class="button-box" style="text-align: center">
                                        <button type="submit" class="default-btn" style="width: 50%">Đăng kí</button>
                                    </div>
                                    <div style="text-align: center; margin-top: 10px">
                                        <a href="{{ route('get.clientLogin') }}">Đã có tài khoản</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
