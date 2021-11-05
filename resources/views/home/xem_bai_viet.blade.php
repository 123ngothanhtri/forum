@extends('home.layout')
@section('content')
    <div class="container">

        <a href="{{ url('/') }}" class="btn btn-secondary my-2">Trở về</a>

        <div class="card">
            <div class="card-header">
                @if($user->image)
                    <img src="{{ asset($user->image) }}" class="rounded-circle" style="width: 50px;height:50px ;object-fit:cover" alt="">
                @else
                    <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width:50px;height:50px ;object-fit:cover" alt="">
                @endif
                <a class="text-decoration-none text-dark fw-bold" href="{{ url('xem-profile/' . $user->id) }}"> {{ $user->name }}</a>
                <small> ({{ \Carbon\Carbon::parse($xem->ngaythem_baiviet)->diffForHumans() }})</small>
            </div>
            <div class="card-body">
                <p>{{ $xem->noidung_baiviet }}</p>
                @if ($xem->hinhanh_baiviet)
                    <img height="100px" src="{{ asset($xem->hinhanh_baiviet) }}" alt="ảnh">
                    @php
                    $images = explode('|', $xem->multipleimage)
                    @endphp
                    @foreach ($images as $img)
                        <img height="100px" src="{{ asset($img) }}" alt="ảnh">
                    @endforeach
                @endif

                
            </div>
            <div class="d-flex justify-content-round">
                <a href="{{ url('like-bai-viet/' . $xem->id_baiviet) }}" class="btn w-100 btn-light border m-1">
                    {{ \App\Models\Like::where('id_baiviet', $xem->id_baiviet)->count() }}
                    @if (Auth::guard('web')->check())
                        @if (\App\Models\Like::whereRaw('id_baiviet=? AND id=?',[$xem->id_baiviet,Auth::guard('web')->user()->id])->first())
                            ❤️️
                        @else
                            ♡
                        @endif
                    @else
                        ♡
                    @endif
                </a>
                <a class="btn w-100 btn-light border m-1"></a>
            </div>
        </div>

        <form action="{{ url('post-binh-luan') }}" method="post" class="my-2">@csrf
            <input type="hidden" name="idbv" value="{{ $xem->id_baiviet }}">
            <textarea name="binhluan" rows="2" placeholder="Nhập bình luận..." required class="form-control"></textarea>
            <button type="submit" class="btn btn-dark mt-2">Gửi</button>
        </form>
        <hr>
        <p>Có {{ count($bl) }} bình luận</p>
        @foreach ($bl as $i)
            <div class="bg-white p-2 my-2 d-flex justify-content-between">
                <div>
                @if($i->image)
                    <img src="{{ asset($i->image) }}" class="rounded-circle" style="width: 50px;height:50px ;object-fit:cover" alt="">
                @else
                    <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width:50px;height:50px ;object-fit:cover" alt="">
                @endif
                <a class="text-decoration-none text-dark fw-bold" href="{{ url('xem-profile/' . $i->id) }}"> {{ $i->name }}</a>
                ({{ \Carbon\Carbon::parse($i->ngay_binhluan)->diffForHumans() }})
                <p>{{ $i->noidung_binhluan }}</p>
                </div>
                <div>
                    @if(Auth::guard('web')->check() && $i->id==Auth::guard('web')->user()->id)
                        <a href="{{ url('delete-comment/'.$i->id_binhluan) }}" class="text-danger text-decoration-none m-2">Xóa</a>
                    @endif
                
            </div>
            </div>
        @endforeach



    </div>
@endsection
