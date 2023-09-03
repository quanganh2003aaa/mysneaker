@extends('Auth.test')
@section('content')
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong>Login page</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                <h2>Đăng Nhập</h2>
                                <span>Vui lòng đăng nhập bằng chi tiết tài khoản dưới đây.</span>
                            </div>
                            <div class="login-form">
                                <form action="{{ route('post.clientLogin') }}" method="post">
                                    @csrf
                                    <input type="text" name="emailClient" placeholder="Tên tài khoản">
                                    <input type="password" name="passwordClient" placeholder="Mật khẩu">
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            {{-- <input type="checkbox" id="remember"> --}}
                                            <label for="remember"><a href="{{route('get.clientRegister')}}">Chưa có tài khoản</a></label>
                                            <a href="#">Quên mật khẩu?</a>
                                        </div>
                                        <div style="text-align: center">
                                            <button type="submit" class="default-btn" style="width: 50%">Đăng Nhập</button>
                                        </div>
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
