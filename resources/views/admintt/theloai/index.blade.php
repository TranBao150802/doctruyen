@extends('layouts.app')

@section('content')

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê thể loại truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Tên</th>
                          <th scope="col">Slug</th>
                          <th scope="col">Mô tả</th>
                          <th scope="col">Kích hoạt</th>
                          <th scope="col">Quản lý</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($theloai as $key => $loai)
                        <tr>
                          <th scope="row">{{$key}}</th>
                          <td>{{$loai->tentheloai}}</td>
                          <td>{{$loai->slug_theloai}}</td>
                          <td>{{$loai->mota}}</td>
                          <td>
                              @if($loai->kichhoat==0)
                                <span class="text text-success">Kích hoạt</span> 
                              @else
                                <span class="text text-danger">Không Kích hoạt</span> 
                              @endif

                          </td>
                          <td>
                                <a href="{{route('theloai.edit',[$loai->id])}}" class="btn btn-primary ">Sửa</a>

                              <form action="{{route('theloai.destroy',[$loai->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Bạn muốn xóa thể loại truyện này không?');" class="btn btn-danger">Xóa</button>
                                  
                              </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê thể loại
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th scope="col">Tên thể loại</th>
            <th scope="col">Slug thể loại</th>
            <th scope="col">Mô tả thể loại</th>
            <th scope="col">Kích hoạt</th>
            <th scope="col">Tùy chỉnh</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($theloai as $key => $loai)
              <tr>
                <th scope="row">{{$key}}</th>
                  <td>{{$loai->tentheloai}}</td>
                  <td>{{$loai->slug_theloai}}</td>
                  <td>{{$loai->mota}}</td>
                  <td>
                  @if($loai->kichhoat == 0)
                <span class="text text-success">Kích hoạt</span>
                  @else
                <span class="text text-danger">Không kích hoạt</span>
                  @endif
                  </td>
                  <td>
                    <a class="btn btn-primary" href="{{route('theloai.edit',[$loai->id])}}">Sửa</a>

                     <form action="{{route('theloai.destroy',[$loai->id])}}" method="POST">
                      @method('DELETE')
                      @csrf
                  <button onclick="return confirm('Bạn muốn xóa thể loại {{$loai->slug_theloai}} không?');" class="btn btn-danger">Xóa</button>
                  </form>
                  </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
@endsection
