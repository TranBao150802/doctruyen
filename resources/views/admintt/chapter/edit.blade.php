@extends('layouts.app')

@section('content')
    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa chapter
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

                    <form method="POST" action="{{route('chapter.update', [$chapter->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="panel-body">
                        <div class="position-center">
                            <form role="form">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tên chapter</label>
                        <input type="text" class="form-control" value="{{$chapter->tieude}}" onkeyup="ChangeToSlug();" name="tieude" id="slug" aria-describedby="emailHelp" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Thuộc truyện</label>
                         <select name="truyen_id" class="form-control m-bot15">
                          @foreach($truyen as $key => $value)
                          <option {{$chapter->truyen_id == $value ->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->tentruyen}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Slug chapter</label>
                        <input type="text" class="form-control" value="{{$chapter->slug_chapter}}" name="slug_chapter" id="convert_slug" aria-describedby="emailHelp" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tóm tắt chapter</label>
                        <input type="text" class="form-control" value="{{$chapter->tomtat}}" name="tomtat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung</label>
                        <textarea name="noidung" id="noidung_chapter" class="form-control" rows="5" style="resize: none">{{$chapter->noidung}}</textarea>
                      </div>

                       <div class="form-group">
                          <label for="exampleInputEmail1" class="form-label">Kích hoạt danh mục</label>
                          <select class="form-control m-bot15" name="kichhoat" aria-label="Default select example">
                            @if($chapter->kichhoat == 0)
                              <option value="0">Kích hoạt</option>
                              <option value="1">Hủy kích hoạt</option>
                              @else
                              <option value="0">Kích hoạt</option>
                              <option selected value="1">Hủy kích hoạt</option>
                              @endif
                            </select>
                          </div>

                      <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập nhật</button>
                    </form>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
