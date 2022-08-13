@extends('layouts.app')
@section('content')
<div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê truyện
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <div class="table-responsive">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th scope="col">Tên truyện</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Slug truyện</th>
                        <th scope="col">Mô tả truyện</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Thuộc thể loại</th>
                        <th scope="col">Kích hoạt</th>
                        <th scope="col">Tùy chỉnh</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_truyen as $key => $truyen)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $truyen->tentruyen }}</td>
                            <td>{{ $truyen->tacgia }}</td>
                            <td><img style="height: 100px;width: 100px;"
                                    src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}"></td>
                            <td>{{ $truyen->slug_truyen }}</td>
                            <td
                                style="display:-webkit-box;overflow:hidden;text-overflow:ellipsis;-webkit-line-clamp: 3;-webkit-box-orient:vertical;">
                                {{ $truyen->motatruyen }}</td>
                            <td>{{ $truyen->danhmuctruyen->tendanhmuc }}</td>
                            <td>{{ $truyen->theloai->tentheloai }}</td>
                            <td>
                                @if ($truyen->kichhoat == 0)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('truyen.edit', [$truyen->id]) }}">Sửa</a>

                                <form action="{{ route('truyen.destroy', [$truyen->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        onclick="return confirm('Bạn muốn xóa truyện {{ $truyen->slug_truyen }} không?');"
                                        class="btn btn-danger">Xóa</button>
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
