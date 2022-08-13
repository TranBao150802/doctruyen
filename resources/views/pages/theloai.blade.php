@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}
@section('content')

<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('http://truyenhay.com:8080/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">{{$tentheloai}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">No Data</li>
        </ol>
    </nav>
{{-- Truyện mới cập nhật --}}
<h4 class="container">{{$tentheloai}}</h4>
                <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                    	@php
                    		$count = count($truyen);
                    	@endphp
                    	@if($count==0)
                    		<div class="col-md-12">
                    			<div class="card mb-4 box-shadow">
                    				<div class="card-body">
                    				<p style="font-size: x-large;">Truyện đang cập nhật... Bạn đọc truyện khác nhé!</p>
                    				</div>
                    			</div>                   			
                    		</div>
                    	@else
	                        @foreach($truyen as $key => $value)
	                    <div class="col-md-3">
	                        <div class="card mb-4 box-shadow">
	                            <img class="card-img-top" style="display:block;margin-left:auto;margin-right:auto;width:75%;height:239px;width:190px" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="Card image cap">
	                            <div class="card-body">
	                                <h5 style="display:-webkit-box;overflow:hidden;text-overflow:ellipsis;-webkit-line-clamp: 1;-webkit-box-orient:vertical;">{{($value->tentruyen)}}</h5>
	                                <p class="card-text" style="display:-webkit-box;overflow:hidden;text-overflow:ellipsis;-webkit-line-clamp: 3;-webkit-box-orient:vertical;">{{$value->motatruyen}}</p>
	                                <div class="d-flex justify-content-between align-items-center">
	                                    <div class="btn-group">
	                                        <a class="btn btn-sm btn-outline-success" href="{{url('doc-truyen/'.$value->slug_truyen)}}"><i class="fas fa-book-reader"></i>Đọc</a>
	                                        <a class="btn btn-sm btn-outline-success" href=""><i class="far fa-save"></i>Lưu</a>
	                                    </div>
	                                    <small class="text-muted">12 phút trước</small>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                        @endforeach
                        @endif
                    </div>
                </div>
                </div>
@endsection