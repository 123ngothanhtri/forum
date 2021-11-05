@extends('home.layout')
@section('content')
    <div class="container">

        <div class="d-flex alert-warning mt-2">
            
            <div class="m-3">
                @if (Auth::guard('web')->user()->image)
                    <img src="{{ Auth::guard('web')->user()->image }}" class="rounded-circle" style="width:200px;height:200px ;object-fit:cover" alt="">
                @else
                    <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width:200px;height:200px ;object-fit:cover" alt="">
                @endif
            </div>
            <div class="m-3">
                <p class="display-4">{{ Auth::guard('web')->user()->name }}</p>
                <p>Email: {{ Auth::guard('web')->user()->email }}</p>
                <p>Giới tính: {{ Auth::guard('web')->user()->gender }}</p>
                <p>Ngày sinh: {{ Auth::guard('web')->user()->birthday }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-end p-2 bg-warning">
            <a href="{{ url('them-bai-viet') }}" class="btn alert-warning fw-bold m-1"><i class="fas fa-plus"></i> Thêm bài viết</a>
            <a href="{{ url('cap-nhat-user') }}" class="btn alert-warning fw-bold m-1"><i class="fas fa-user-edit"></i> Cập nhật thông tin</a>
            <a href="{{ url('mat-khau-user') }}" class="btn alert-warning fw-bold m-1"><i class="fas fa-lock"></i> Đổi mật khẩu</a>
            <a href="{{ url('logout-user') }}" class="btn alert-warning fw-bold m-1"><i class="fas fa-power-off"></i> Đăng xuất</a>
        </div>
        @foreach ($bv as $i)
            <div class="card m-2">
                <div class="d-flex justify-content-between p-2">
                    <div>
                        @if (Auth::guard('web')->user()->image)
                            <img src="{{ Auth::guard('web')->user()->image }}" class="rounded-circle" style="width:50px;height:50px ;object-fit:cover" alt="">
                        @else
                            <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width:50px;height:50px ;object-fit:cover" alt="">
                        @endif

                        <b> {{ Auth::guard('web')->user()->name }}</b>
                        <small class="fw-lighter"> {{ \Carbon\Carbon::parse($i->ngaythem_baiviet)->diffForHumans() }}</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-light alert-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ url('sua-bai-viet/' . $i->id_baiviet) }}">Sửa</a></li>
                            <li><a class="dropdown-item" href="{{ url('xoa-bai-viet/' . $i->id_baiviet) }}">Xóa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="px-3 ">

                    <a href="{{ url('xem-bai-viet/' . $i->id_baiviet) }}" class="text-decoration-none text-dark">
                        <p>{{ $i->noidung_baiviet }}</p>
                        @if ($i->hinhanh_baiviet)
                            <img height="200px" src="{{ $i->hinhanh_baiviet }}" alt="ảnh"><br>
                            @php
                            $images = explode('|', $i->multipleimage)
                            @endphp
                            @foreach ($images as $img)
                                <img height="100px" src="{{ asset($img) }}" alt="ảnh">
                            @endforeach
                        @endif

                    </a>
                </div>
                <div class="d-flex justify-content-around">
                    <a href="{{ url('like-bai-viet/' . $i->id_baiviet) }}" class="btn w-100 btn-light border m-1">

                        @if (Auth::guard('web')->check())
                            @if (\App\Models\Like::whereRaw('id_baiviet=? AND id=?', [$i->id_baiviet, Auth::guard('web')->user()->id])->first())
                                ❤️️
                            @else
                                ♡
                            @endif
                        @else
                            ♡
                        @endif
                        {{ \App\Models\Like::where('id_baiviet', $i->id_baiviet)->count() }}

                    </a><a href="{{ url('xem-bai-viet/' . $i->id_baiviet) }} " class="btn w-100 btn-light border m-1">Bình luận</a>
                    <a href="#" class="btn w-100 btn-light border m-1">Chia sẻ</a>
                </div>
            </div>
        @endforeach
        @if (count($bv) == 0)
            <h3 class="p-5 m-2 bg-light rounded text-center">Bạn chưa có bài viết cả :(</h3>
        @endif
    </div>
    </div>





@endsection
