@extends('Admin.welcome')
@section('contents')
    <div class="">
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thêm tin tức</h5>

                <!-- General Form Elements -->
                <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tác giả</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author" value="{{ Auth::user()->name }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tiêu đề</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="imgBlog">
                        </div>
                    </div>

                    <div class="card ">
                        <h3>Nội dung</h3>
                        <textarea name="content" id="editor" cols="30" rows="10"></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Đăng bài</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </div>
@endsection
