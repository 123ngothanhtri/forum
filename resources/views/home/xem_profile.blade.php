@extends('home.layout')
@section('content')
    <div class="container">
        <div class="d-flex bg-light mt-2">
            <div class="m-3">
                @if ($user->image)
                    <img src="{{ asset($user->image) }}" class="rounded-circle" style="width: 200px;height:200px ;object-fit:cover" alt="">
                @else
                    <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width:200px;height:200px ;object-fit:cover" alt="">
                @endif

            </div>
            <div class="m-3">
                <p class="display-4">{{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Giới tính: {{ $user->gender }}</p>
                <p>Ngày sinh: {{ $user->birthday }}</p>
                @if (Auth::guard('web')->check())
                    @if (\App\Models\Follow::whereRaw('id_user=? AND id_user_fl=?', [Auth::guard('web')->user()->id, $user->id])->first())
                        <a href="{{ url('follow/' . $user->id) }}" class="btn alert-secondary"><i class="fas fa-check"></i> Đang follow</a>
                    @else
                        <a href="{{ url('follow/' . $user->id) }}" class="btn btn-success"><i class="fas fa-user-plus"></i> Follow</a>
                    @endif
                @else
                    <a href="{{ url('follow/' . $user->id) }}" class="btn btn-success"><i class="fas fa-user-plus"></i> Follow</a>
                @endif
            </div>
        </div>
        @foreach ($baiviet as $i)
            <div class="card my-2 ">
                <div class="d-flex justify-content-between p-2">
                    <div>
                        @if ($user->image)
                            <img src="{{ asset($user->image) }}" class="rounded-circle" style="width: 50px;height:50px ;object-fit:cover" alt="">
                        @else
                            <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width:50px;height:50px ;object-fit:cover" alt="">
                        @endif
                        <b> {{ $user->name }}</b>
                        <small class="fw-lighter"> {{ \Carbon\Carbon::parse($i->ngaythem_baiviet)->diffForHumans() }}</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn alert-secondary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            •••
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Báo cáo</a></li>
                        </ul>
                    </div>
                </div>
                <div class="px-3 ">

                    <a href="{{ url('xem-bai-viet/' . $i->id_baiviet) }}" class="text-decoration-none text-dark">
                        <p>{{ $i->noidung_baiviet }}</p>
                        @if ($i->hinhanh_baiviet)
                            <img height="200px" src="{{ asset($i->hinhanh_baiviet) }}" alt="ảnh"><br>
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

                    </a>
                    <a href="{{ url('xem-bai-viet/' . $i->id_baiviet) }} " class="btn w-100 btn-light border m-1">Bình luận</a>
                    <a href="#" class="btn w-100 btn-light border m-1">Chia sẻ</a>
                </div>
            </div>
        @endforeach
        @if (count($baiviet) == 0)
            <h3 class="p-5 m-2 bg-light rounded text-center">Người này chưa có bài viết cả :(</h3>
        @endif
    </div>





@endsection
