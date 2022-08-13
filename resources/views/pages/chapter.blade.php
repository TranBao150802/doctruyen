@extends('../layout')

{{-- @section('slide')

  @include('pages.slide')

@endsection --}}

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('http://truyenhay.com:8080/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{$chapter->truyen->tentruyen}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">{{$chapter->tieude}}</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <h4>{{$chapter->truyen->tentruyen}}</h4>
            <p>Chương hiện tại : {{$chapter->tieude}}</p>
            <div class="col-md-5">
                <style type="text/css">
                    .isDisabled {
                        color: currentColor;pointer-events: none;opacity: 0.5;text-decoration: none;
                    }
                    .noidungchuong {
                        padding: 20px;
                        background: #fff;
                        color: #000;
                        width: auto;
                        height: auto;
                        display:block;margin-left:auto;margin-right:auto;width:200%;
                        /*   line-height: 40px !important;
              font-size: 25px !important;
              font-family: "Palatino Linotype","Arial","Times New Roman",sans-serif !important;*/
                    }
                    .icon {
                      margin: auto;
                      height: 10%;
                      width: 10%;
                    }
                </style>
                <div class="navbar" style="margin-left:auto;margin-right:auto;width:200%;">
                  <a class="btn btn-success icon {{$chapter->id==$min_id->id ? 'isDisabled' : ''}} " href="{{url('doc-chapter/'.$previous_chapter)}}"><i class="fas fa-caret-square-left"></i></a>
                <div class="form-group">
                    {{-- <label for="exampleInputEmail1">Chọn chương</label> --}}
                    <select name="select-chapter" class="custom-select select-chapter">
                      @foreach($all_chapter as $key => $chap)
                        <option value="{{url('doc-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                      @endforeach
                    </select>
                </div>
                <a class="btn btn-success icon {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('doc-chapter/'.$next_chapter)}}"><i class="fas fa-caret-square-right"></i></a>
                </div>

                <div class="noidungchuong">
                  {!! $chapter->noidung !!} 
                  </div>
                <div class="navbar" style="margin-left:auto;margin-right:auto;width:200%;">
                  <a class="btn btn-success icon {{$chapter->id==$min_id->id ? 'isDisabled' : ''}} " href="{{url('doc-chapter/'.$previous_chapter)}}"><i class="fas fa-caret-square-left"></i></a>
                <div class="form-group">
                    {{-- <label for="exampleInputEmail1">Chọn chương</label> --}}
                    <select name="select-chapter" class="custom-select select-chapter">
                      @foreach($all_chapter as $key => $chap)
                        <option value="{{url('doc-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                      @endforeach
                    </select>
                </div>
                <a class="btn btn-success icon {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('doc-chapter/'.$next_chapter)}}"><i class="fas fa-caret-square-right"></i></a>
                </div>
            <h3>chia sẻ truyện cho Thầy đi:</h3>
            <div class="fb-share-button" data-href="" data-layout="button_count" data-size="large"><a
                    target="_blank" href="https://www.facebook.com/sharer/sharer.php?u="
                    class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
            <div class="row">
                <div class="col-md-12">
                    <div data-width="100%" class="fb-comments" data-href="" data-width=""
                        data-numposts="10"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
