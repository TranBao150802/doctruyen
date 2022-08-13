@extends('layouts.app')

@section('content')
 {{--    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại</div>
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
                    
                    <form method="POST" action="{{route('theloai.store')}}" enctype='multipart/form-data'>
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên thể loại</label>
                        <input type="text" class="form-control" value="{{old('tentheloai')}}" onkeyup="ChangeToSlug();" name="tentheloai" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại">
            
                      <div class="form-group">
                        <label for="exampleInputEmail1">Slug thể loại</label>
                        <input type="text" class="form-control" value="{{old('slug_theloai')}}" name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" placeholder="">                        
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả</label>
                        <input type="text" class="form-control" value="{{old('mota')}}" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả thể loại">
                      </div>
                      
                       <div class="form-group">
                        <label for="exampleInputEmail1">Kích hoạt</label>
                        <select name="kichhoat" class="custom-select">
                          <option value="0">Kích hoạt</option>
                          <option value="1">Không kích hoạt</option>
                        </select>
                        </div>
                     
                      <button type="submit" name="themtheloai" class="btn btn-primary">Thêm</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
 --}}
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thể loại
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
                    <form method="POST" action="{{route('theloai.store')}}" enctype='multipart/form-data'>
                        @csrf
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                                    <input type="text" class="form-control" value="{{old('tentheloai')}}" onkeyup="ChangeToSlug();" name="tentheloai" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Slug-thể loại</label>
                                    <input type="text" class="form-control" value="{{old('slug_theloai')}}" name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Mô tả thể loại</label>
                                    <input type="text" class="form-control" value="{{old('mota')}}" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả thể loại">
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
