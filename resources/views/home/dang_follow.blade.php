@extends('home.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ">
                <div class="d-flex justify-content-between">
                    @if (Auth::guard('web')->check())
                        <span><a href="{{ url('them-bai-viet') }}" class="btn btn-success mt-2"><i class="fas fa-plus"></i> Tạo bài viết</a></span>
                    @endif
                    <span></span>
                    <div class="mt-2">
                        {!! $bv->links() !!}
                    </div>
                    
                </div>
                
                @foreach ($bv as $i)
                    <div class="card mb-2">
                        <div class="card-body">
                            @if($i->image)
                            <img src="{{ $i->image }}" class="rounded-circle" style="width:50px;height:50px;object-fit:cover" alt="">
                            @else
                            <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width: 50px;height:50px ;object-fit:cover" alt="">
                            @endif
                            <a class="text-decoration-none text-dark fw-bold" href="{{ url('xem-profile/' . $i->id) }}"> {{ $i->name }}</a> •
                            <small class="fw-lighter"> {{ \Carbon\Carbon::parse($i->ngaythem_baiviet)->diffForHumans() }}</small>
                            <a href="{{ url('xem-bai-viet/' . $i->id_baiviet) }}" class="text-decoration-none text-dark">
                                <p class="card-title">{{ $i->noidung_baiviet }}</p>
                            </a>
                            @if ($i->hinhanh_baiviet)
                                <img height="200px" src="{{ $i->hinhanh_baiviet }}" alt="ảnh">
                            @endif

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
            </div>
            <div class="col-lg-4 ">
                @if (Auth::guard('web')->check())
                <div class="bg-light rounded p-3 mt-2">
                    <h6>Thông báo</h6>
                    <p>Hôm nay không có thông báo nào, khi nào có nội dung cần thông báo thì chúng tôi sẽ thông báo sau!</p>
                </div>
                @else
                <div class="bg-light rounded p-3 mt-2 text-success">
                    <p>Bạn chưa đăng nhập.</p>
                </div>
                @endif


                
            </div>
            {{-- <div class="d-flex justify-content-center">
                {!! $bv->links() !!}
            </div> --}}
        </div>

    </div>
@endsection
