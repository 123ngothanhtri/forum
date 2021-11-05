@extends('home.layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <b>Tạo bài viết</b>
            </div>
            <div class="card-body">
                <form action="{{ url('post-them-bai-viet') }}" method="post" enctype="multipart/form-data">@csrf

                    
                    <textarea placeholder="Nhập nội dung..." name="noidung" cols="30" rows="3" class="form-control"></textarea>
                    {{-- Thể loại
                    <select class="form-select" name="theloai">
                        @foreach ($tl as $i)
                            <option value="{{ $i->id_theloai }}">{{ $i->ten_theloai }}</option>
                        @endforeach
                    </select> --}}

                    <br>

                    Hình ảnh
                    <div>
                        <input type="file" name="hinhanh" id="upload" onchange="preview_image(event)" accept="image/*" class="form-control" >
                        <img width="200px" id="output_image" />
                    </div>
                    Nhiều hình ảnh
                    <input type="file" name="multipleimage[]" multiple id="upload" accept="image/*" class="form-control" >
                    <br>
                    <button class="btn btn-success" type="submit"><i class="fas fa-paper-plane"></i> Đăng</button />
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">Hủy</a>
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
