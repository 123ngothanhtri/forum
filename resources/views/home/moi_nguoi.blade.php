@extends('home.layout')
@section('content')
    <div class="container">

        @foreach ($user as $i)
            @if (Auth::guard('web')->check() && $i->id != Auth::guard('web')->user()->id)

                <div class="d-flex justify-content-start p-2 m-2 bg-light rounded w">
                    <a href="{{ url('xem-profile/' . $i->id) }}" class="text-dark fw-bold text-decoration-none">
                        @if ($i->image)
                            <img src="{{ asset($i->image) }}" class="rounded-circle" style="width: 100px;height:100px ;object-fit:cover" alt="">
                        @else
                            <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width: 100px;height:100px ;object-fit:cover" alt="">
                        @endif
                    </a>

                    <div class="ps-3">
                        <a href="{{ url('xem-profile/' . $i->id) }}" class="text-dark fw-bold text-decoration-none">{{ $i->name }}</a>
                        <br>


                        @if (Auth::guard('web')->check())
                            @if (\App\Models\Follow::whereRaw('id_user=? AND id_user_fl=?', [Auth::guard('web')->user()->id, $i->id])->first())
                                <a href="{{ url('follow/' . $i->id) }}" class="btn alert-secondary"><i class="fas fa-check"></i> Đang follow</a>
                            @else
                                <a href="{{ url('follow/' . $i->id) }}" class="btn btn-success"><i class="fas fa-user-plus"></i> Follow</a>
                            @endif
                        @else
                            <a href="{{ url('follow/' . $i->id) }}" class="btn btn-success"><i class="fas fa-user-plus"></i> Follow</a>
                        @endif
                        <a href="{{ url('xem-profile/' . $i->id) }}" class="btn btn-info"><i class="far fa-address-card"></i> Xem hồ sơ</a>
                    </div>
                </div>
            @endif
        @endforeach


    </div>
@endsection
