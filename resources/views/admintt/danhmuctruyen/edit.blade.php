@extends('layouts.app')
@section('content')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa danh mục
                        </header>
                       <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <form method="POST" action="{{route('danhmuctruyen.update',[$danhmuc->id])}}">
                       @method("PUT")
                        @csrf
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                                    <input type="text" class="form-control" value="{{$danhmuc->tendanhmuc}}" onkeyup="ChangeToSlug();" name="tendanhmuc" id="slug" aria-describedby="emailHelp" placeholder="Thêm danh mục">
                                </div>

                                <div class="form-group">
                                     <label for="exampleInputEmail1" class="form-label">Slug danh mục</label>
                                     <input type="text" class="form-control" value="{{$danhmuc->slug_danhmuc}}"  name="slug_danhmuc" id="convert_slug" aria-describedby="emailHelp" placeholder="Mô tả danh mục">
                                </div>

                                <div class="form-group">
                                     <label for="exampleInputEmail1" class="form-label">Mô tả danh mục</label>
                                     <input type="text" class="form-control" value="{{$danhmuc->motadanhmuc}}" name="motadanhmuc" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục">
                                </div>

                                <div class="form-group">
                                    <select class="form-control m-bot15" name="kichhoat">
                                        @if($danhmuc->kichhoat == 0)
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
                        </form>
                            </div>
                        </div>
                    </section>
@endsection