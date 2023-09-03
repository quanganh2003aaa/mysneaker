@extends('Auth.test')
@section('content')
    <!-- my account area start -->
    <div class="account-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a>  </li>
                            <li><strong>{{client()->user()->nameClient}}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="my-account-accordion">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <i class="fa fa-user"></i>
                                            Thông tin của bạn
                                        </a>
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @if ($errord = session()->get('errors'))
                                            <ul>
                                                @foreach ($errors->messages() as $key => $error)
                                                    <li>
                                                        <i style="color: red">{{ $error[0] }}</i>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="delivery-details">
                                                <form method="POST" action="{{ route('client.infor.update') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="list-style">
                                                        <div class="account-title">
                                                            <h4>Hãy chắc chắn cập nhật thông tin cá nhân của bạn nếu nó đã thay đổi.</h4>
                                                        </div>
                                                        <div class="form-name">
                                                            <label>Tên <em>*</em> </label>
                                                            <input type="text" name="nameClient" value="{{client()->user()->nameClient}}">
                                                        </div>
                                                        <div class="form-name">
                                                            <label>Số điện thoại <em>*</em> </label>
                                                            <input type="tel" name="telClient" type="tel"
                                                            pattern="[0]{1}[1-9]{1}[0-9]{8}" value="{{client()->user()->telClient}}">
                                                        </div>
                                                        <div class="form-name">
                                                            <label>Địa chỉ <em>*</em> </label>
                                                            <input type="text" name="addressClient" value="{{client()->user()->addressClient}}">
                                                        </div>
                                                        <div class="save-button">
                                                            <button type="submit">Cập nhật</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-button">
                            <div class="home"> <a href="{{route('shop.index')}}"> home</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account area end -->
@endsection
