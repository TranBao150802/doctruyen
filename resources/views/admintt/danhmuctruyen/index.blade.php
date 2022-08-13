@extends('layouts.app')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục
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
            <th scope="col">Tên danh mục</th>
            <th scope="col">Slug danh mục</th>
            <th scope="col">Mô tả danh mục</th>
            <th scope="col">Kích hoạt</th>
            <th scope="col">Tùy chỉnh</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhmuctruyen as $key => $danhmuc)
              <tr>
                <th scope="row">{{$key}}</th>
                  <td>{{$danhmuc->tendanhmuc}}</td>
                  <td>{{$danhmuc->slug_danhmuc}}</td>
                  <td>{{$danhmuc->motadanhmuc}}</td>
                  <td>
                  @if($danhmuc->kichhoat == 0)
                <span class="text text-success">Kích hoạt</span>
                  @else
                <span class="text text-danger">Không kích hoạt</span>
                  @endif
                  </td>
                  <td>
                    <a class="btn btn-primary" href="{{route('danhmuctruyen.edit',[$danhmuc->id])}}">Sửa</a>

                     <form action="{{route('danhmuctruyen.destroy',[$danhmuc->id])}}" method="POST">
                      @method('DELETE')
                      @csrf
                  <button onclick="return confirm('Bạn muốn xóa danh mục {{$danhmuc->slug_danhmuc}} không?');" class="btn btn-danger">Xóa</button>
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