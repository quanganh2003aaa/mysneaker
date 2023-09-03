@extends('Admin.welcome')
@section('contents')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Danh sách hãng</h5>

            <!-- Default Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã</th>
                        <th scope="col">Tên hãng</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <th scope="row">{{ $brand->id }}</th>
                            <td>{{ $brand->brand }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{route('brands.edit', $brand)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                    Sửa
                                </a>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ route('brands.destroy', $brand) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                        Xóa
                                    </button>
                                </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
@endsection
