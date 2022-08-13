@extends('layouts.app')

@section('content')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa thể loại
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
                     <form method="POST" action="{{route('theloai.update',[$theloai->id])}}">
                        @method("PUT")
                        @csrf
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                                    <input type="text" class="form-control" value="{{$theloai->tentheloai}}" onkeyup="ChangeToSlug();" name="tentheloai" id="slug" aria-describedby="emailHelp" placeholder="Thêm thể loại">
                                </div>

                                <div class="form-group">
                                     <label for="exampleInputEmail1" class="form-label">Slug thể loại</label>
                                     <input type="text" class="form-control" value="{{$theloai->slug_theloai}}"  name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" placeholder="Mô tả thể loại">
                                </div>

                                <div class="form-group">
                                     <label for="exampleInputEmail1" class="form-label">Mô tả thể loại</label>
                                     <input type="text" class="form-control" value="{{$theloai->mota}}" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả thể loại">
                                </div>

                                <div class="form-group">
                                    <select class="form-control m-bot15" name="kichhoat">
                                        @if($theloai->kichhoat == 0)
                                      <option value="0">Kích hoạt</option>
                                      <option value="1">Hủy kích hoạt</option>
                                      @else
                                      <option value="0">Kích hoạt</option>
                                      <option selected value="1">Hủy kích hoạt</option>
                                      @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                        </div>
                    </section>
@endsection
