@extends('layouts.app')
@section('content')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa truyện
                        </header>
                       <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên Truyện</label>
                            <input type="text" class="form-control" value="{{($truyen->tentruyen)}}" onkeyup="ChangeToSlug();" name="tentruyen" id="slug" aria-describedby="emailHelp" placeholder="Thêm truyện">
                          </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" value="{{($truyen->tacgia)}}" name="tacgia" aria-describedby="emailHelp" placeholder="Thêm tác giả">
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" value="{{($truyen->slug_truyen)}}"  name="slug_truyen" id="convert_slug" aria-describedby="emailHelp">
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả truyện</label>
                            <textarea class="form-control" name="motatruyen" rows="5" style="resize: none;">{{($truyen->motatruyen)}}</textarea>
                          </div>

                          <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Danh mục truyện</label>
                          <select class="form-control m-bot15" name="danhmuc" aria-label="Default select example">
                            @foreach($danhmuc as $key => $muc)
                              <option {{$muc->id==$truyen->danhmuc_id ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                            @endforeach
                            </select>
                          </div>

                          <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Thuộc thể loại</label>
                          <select class="form-control m-bot15" name="theloai" aria-label="Default select example">
                            @foreach($theloai as $key => $loai)
                              <option {{$loai->id==$truyen->theloai_id ? 'selected' : ''}} value="{{$loai->id}}">{{$loai->tentheloai}}</option>
                            @endforeach
                            </select>
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh">
                            <img style="height: 100px;width: 100px;" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}">
                          </div>

                          <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Kích hoạt danh mục</label>
                          <select class="form-control m-bot15" name="kichhoat" aria-label="Default select example">
                              @if($truyen->kichhoat == 0)
                              <option value="0">Kích hoạt</option>
                              <option value="1">Hủy kích hoạt</option>
                               @else
                              <option value="0">Kích hoạt</option>
                              <option selected value="1">Hủy kích hoạt</option>
                              @endif
                            </select>
                          </div>
                          <button type="submit" name="themtruyen" class="btn btn-primary">Cập nhật</button>
                    </form>
                    </form>
                            </div>
                        </div>
                    </section>

@endsection
