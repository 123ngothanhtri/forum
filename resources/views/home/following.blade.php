@extends('home.layout')
@section('content')
    <div class="container">
        <h5>Những người bạn đang follow</h5>

        @foreach ($user as $i)
            <div class="d-flex justify-content-start p-2 m-2 bg-light rounded ">
                @if ($i->image)
                    <img src="{{ asset($i->image) }}" class="rounded-circle" style="width: 100px;height:100px ;object-fit:cover" alt="">
                @else
                    <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width: 100px;height:100px ;object-fit:cover" alt="">
                @endif

                <div class="ps-3">
                    <b>{{ $i->name }}</b>
                    <br>
                    <a href="{{ url('xem-profile/' . $i->id) }}" class="btn btn-info"><i class="far fa-address-card"></i> Xem hồ sơ</a>
                    <a href="{{ url('follow/' . $i->id) }}" class="btn alert-secondary"><i class="fas fa-user-times"></i> Bỏ Follow</a>


                </div>
            </div>
        @endforeach
        @if (count($user) == 0)
            <div class="p-5 bg-light rounded display-4 text-center">Bạn chưa follow ai cả</div>
        @endif


    </div>
@endsection
