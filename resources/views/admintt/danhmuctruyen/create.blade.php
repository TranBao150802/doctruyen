@extends('layouts.app')
@section('content')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục
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
                    <form method="POST" action="{{route('danhmuctruyen.store')}}">
                        @csrf
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                                    <input type="text" class="form-control" value="{{old('tendanhmuc')}}" onkeyup="ChangeToSlug();" name="tendanhmuc" id="slug" aria-describedby="emailHelp" placeholder="Thêm danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Slug-danh mục</label>
                                    <input type="text" class="form-control" value="{{old('slug_danhmuc')}}"  name="slug_danhmuc" id="convert_slug" aria-describedby="emailHelp" placeholder="Mô tả danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Mô tả danh mục</label>
                                    <input type="text" class="form-control" value="{{old('motadanhmuc')}}"  name="motadanhmuc" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục">
                                </div>
                                <div class="form-group">
                                    <select class="form-control m-bot15" name="kichhoat">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Hủy kích hoạt</option>
                            </select>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>
@endsection
