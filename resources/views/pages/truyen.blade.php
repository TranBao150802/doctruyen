@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('http://truyenhay.com:8080/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $truyen->theloai->tentheloai }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" style="display:block;margin-left:auto;margin-right:auto;width:75%;"
                        src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" alt="Card image cap">
                </div>
                <div class="col-md-9">
                    <style type="text/css">
                        .infotruyen {
                            list-style: none;
                        }

                    </style>
                    <ul class="infotruyen">
                    	<li>{{ $truyen->tentruyen }}</li>
                        <li>Tác giả: {{ $truyen->tacgia }}</li>
                        <li>Danh mục: <a
                                href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug_danhmuc) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a>
                        </li>
                        <li>Thể loại: <a
                                href="{{ url('the-loai/' . $truyen->theloai->slug_theloai) }}">{{ $truyen->theloai->tentheloai }}</a>
                        </li>
                        <li>Số chap: <i class="fas fa-spinner"></i></li>
                        <li>Lượt xem: <i class="fas fa-spinner"></i></li>
                        <li><a href="">Xem mục lục</a></li>
                        @if($chapter_dau)
                        <li><a class="btn btn-primary" href="{{url('xem-chapter/'.$chapter_dau->truyen->slug_truyen.'/'.$chapter_dau->slug_chapter)}}">Đọc</a></li>
                        @else
                        <li><a class="btn btn-primary" href="">Chưa có chapter...Bạn đọc truyện khác nhé!</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <p>{{ $truyen->motatruyen }}</p>
            </div>
            <hr>
            <h4>Mục lục</h4>
            <ul class="mucluctruyen">

            	@php
            		$mucluc = count($chapter);
            	@endphp
            	@if($mucluc > 0)
	                @foreach ($chapter as $key => $chap)
	                   <li><a href="{{ url('doc-chapter/' .$chap->slug_chapter) }}">{{ $chap->tieude }}</a></li>
	                @endforeach
	            @else
	            	<li>Đang cập nhật chaper... Bạn đọc truyện khác nhé!</li>
                @endif

            </ul>

            <h5>Truyện cùng loại</h5>
            <div class="row">
            	@foreach($cungdanhmuc as $key => $value)
            <div class="col-md-3">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top"
                        style="display:block;margin-left:auto;margin-right:auto;width:55%;height:170px;width:130px"
                        src="{{ asset('public/uploads/truyen/' . $value->hinhanh) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 style="display:-webkit-box;overflow:hidden;text-overflow:ellipsis;-webkit-line-clamp: 1;-webkit-box-orient:vertical;">
                            {{ $value->tentruyen }}</h5>
                        <p class="card-text"
                            style="display:-webkit-box;overflow:hidden;text-overflow:ellipsis;-webkit-line-clamp: 2;-webkit-box-orient:vertical;">
                            {{ $value->motatruyen }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-success"
                                    href="{{ url('doc-truyen/' . $value->slug_truyen) }}"><i
                                        class="fas fa-book-reader"></i>Đọc</a>
                                <a class="btn btn-sm btn-outline-success" href=""><i class="far fa-save"></i>Lưu</a>
                            </div>
                            <small class="text-muted">{{$value->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
            	@endforeach
            </div>
        </div>
        <div class="col-md-3">
            <h3>Truyện xem nhiều</h3>
            @foreach($truyenxemnhieu as $key => $xemnhieu)
        <div class="row mt-5">
            <div class="col-md-5"><img class="img img-responsive" height="141px" width="89px" class="card-img-top" src="{{asset('public/uploads/truyen/'.$xemnhieu->hinhanh)}}" alt="{{$xemnhieu->tentruyen}}"></div>
            <div class="col-md-7 sidebar" >
                <a href="{{url('xem-truyen/'.$xemnhieu->slug_truyen)}}">
                <p>{{$xemnhieu->tentruyen}}</p>
                <p><i class="fas fa-eye"></i>load</p>
                </a>
            </div>
        </div>
        @endforeach
        </div>
    </div>

@endsection
