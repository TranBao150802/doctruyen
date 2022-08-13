@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
        Liệt kê chapter
    </div>
      <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
      </div>
      </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
        <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th scope="col">Tên chapter</th>
            <th scope="col">Slug-chapter</th>
            <th scope="col">Mô tả chapter</th>
            <th scope="col">Thuộc truyện</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Tùy chỉnh</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
            <tbody>
              @foreach($chapter as $key => $chap)
                <tr>
                  <th scope="row">{{$key}}</th>
                  <td>{{$chap->tieude}}</td>
                  <td>{{$chap->slug_chapter}}</td>
                  <td>{{$chap->tomtat}}</td>
                  <td>{{$chap->truyen->tentruyen}}</td>
                  <td>
                    @if($chap->kichhoat==0)
                      <span class="text text-success">Kích hoạt</span>
                    @else
                      <span class="text text-danger">Không Kích hoạt</span>
                    @endif

                  </td>
                  <td>
                    <a href="{{route('chapter.edit',[$chap->id])}}" class="btn btn-primary ">Sửa</a>
                      <form action="{{route('chapter.destroy',[$chap->id])}}" method="POST">
                          @method('DELETE')
                            @csrf
                              <button onclick="return confirm('Bạn muốn xóa {{$chap->slug_chapter}} của truyện {{$chap->truyen->tentruyen}} này không?');" class="btn btn-danger">Xóa</button>
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
        </div>
    </div>

@endsection
