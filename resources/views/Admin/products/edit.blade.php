@extends('Admin.welcome')
@section('contents')
<div class="">
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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sửa sản phẩm</h5>

            <!-- General Form Elements -->
            <form method="POST" action="{{route('admin.product.update', $product)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nameProduct" value="{{$product->nameProduct}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Hãng</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="brandProduct" value="{{$product->brandProduct}}">
                            @foreach ($brands as $brand)
                            <option value="{{$brand->brand}}" {{ $product->brandProduct == $brand->brand ? 'selected' : ''}}>{{$brand->brand}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Mã giày</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="idProduct" value="{{$product->idProduct}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Size</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sizeProduct" value="{{$product->sizeProduct}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">File Upload</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="imgProduct">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" style="height: 100px" name="descriptionProduct">{{$product->descriptionProduct}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Giá</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="priceProduct" value="{{$product->priceProduct}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Số lượng</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="quantityProduct" value="{{$product->quantityProduct}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sửa ngay</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
</div>
@endsection
