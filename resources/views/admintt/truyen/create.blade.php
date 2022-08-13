@extends('layouts.app')
@section('content')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm truyện
                        </header>
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                          <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên Truyện</label>
                            <input type="text" class="form-control" value="{{old('tentruyen')}}" onkeyup="ChangeToSlug();" name="tentruyen" id="slug" aria-describedby="emailHelp" placeholder="Thêm truyện">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" value="{{old('tacgia')}}" name="tacgia" aria-describedby="emailHelp" placeholder="Thêm tác giả">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" value="{{old('slug_truyen')}}"  name="slug_truyen" id="convert_slug" aria-describedby="emailHelp">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Mô tả truyện</label>
                            <textarea class="form-control" name="motatruyen" rows="5" style="resize: none;"></textarea>
                          </div>

                          <div class="form-group">
                        <label for="exampleInputEmail1">Danh mục truyện</label>
                         <select name="danhmuc" class="form-control m-bot15">
                          @foreach($danhmuc as $key => $value)
                          <option value="{{$value->id}}">{{$value->tendanhmuc}}</option>
                          @endforeach
                        </select>
                         </div>

                         <div class="form-group">
                        <label for="exampleInputEmail1">Thuộc thể loại</label>
                         <select name="theloai" class="form-control m-bot15">
                          @foreach($theloai as $key => $value)
                          <option value="{{$value->id}}">{{$value->tentheloai}}</option>
                          @endforeach
                        </select>
                         </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh">
                          </div>

                          <div class="form-group">
                          <label for="exampleInputEmail1">Kích hoạt danh mục</label>
                          <select class="form-control m-bot15" name="kichhoat">
                              <option value="0">Kích hoạt</option>
                              <option value="1">Hủy kích hoạt</option>
                            </select>
                          </div>
                          <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
                      </div>
                  </div>
              </form>
                    </form>

                </div>
                    </section>

@endsection
