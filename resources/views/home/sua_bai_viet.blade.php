@extends('home.layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <b>Chỉnh sửa bài viết</b>
            </div>
            <div class="card-body">
                <form action="{{ url('post-sua-bai-viet') }}" method="post" enctype="multipart/form-data">@csrf
                    <input type="hidden" value="{{ $bv->id_baiviet }}" name="id_baiviet">
                    <textarea placeholder="Nhập nội dung..." name="noidung" cols="30" rows="3" class="form-control">{{ $bv->noidung_baiviet }}</textarea>
                    <br>
                    Hình ảnh
                    <div>
                        <input type="file" name="hinhanh" id="upload" onchange="preview_image(event)" accept="image/*" class="form-control" >
                        <img src="{{ asset($bv->hinhanh_baiviet) }}" width="200px" id="output_image" />
                    </div>
                    <br>
                    <button class="btn btn-success" type="submit">Lưu</button>
                    <a href="{{ url('/profile-user') }}" class="btn btn-outline-secondary">Hủy</a>
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
