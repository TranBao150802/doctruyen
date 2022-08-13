<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Truyện hay</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
        <body>
            <div class="container">
                {{-- menu ở đây--}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="http://truyenhay.com:8080/"><img src="{{asset("public/uploads/contact/logo.png")}}" style="height:77px;width: 77px;border-radius:25%;-moz-border-radius:25%;-webkit-border-radius:25%;"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="http://truyenhay.com:8080/">Trang chủ <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                        Danh mục
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($danhmuc as $key => $ten)
                      <a class="dropdown-item" href="{{url('danh-muc/'.$ten->slug_danhmuc)}}">{{$ten->tendanhmuc}}</a>
                        @endforeach
                    </div>
                   </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                        Thể loại
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($theloai as $key => $loai)
                      <a class="dropdown-item" href="{{url('the-loai/'.$loai->slug_theloai)}}">{{$loai->tentheloai}}</a>
                        @endforeach
                    </div>
                   </li>
                </ul>

                {{-- tìm kiếm --}}
                <form class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET">
                  <input class="form-control mr-sm-2" type="search" name="tukhoa" placeholder="Nhập tên truyện, tác giả" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
                {{-- tìm kiếm --}}
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" id="search" type="search" name="tukhoa" placeholder="Typehead Nhập tên truyện, tác giả" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>

              </div>
            </nav>
            {{-- slide--}}
            @yield('slide')

            {{-- Truyện mới cập nhật --}}
            @yield('content')

                <!-- Footer -->
            <footer class="text-muted" id="footer">
                <div class="container">
                    <p class="float-right">
                        <a href="">Trở lại trang đầu</a>
                    </p>
                    <p>nơi tổng hợp tất cả truyện hay nhất vô địch vũ trụ, luôn luôn cập nhật 24h, bạn sẽ không biết chán khi đọc truyện ở web này, thề! uy tín luôn</p>
                    <p>mọi chi tiết liên hệ qua email: phamtruong24042001@gmail.com</p>
                    <p>.</p>
                    <a traget="_blank" href="https://www.facebook.com/youruserten/" title="facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </footer>
            </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>

        <script>
            var path = "{{ url('search-typehead/action') }}";

            $('#search').typeahead({

                source: function(query, process){

                    return $.get(path, {query:query}, function(data){

                        return process(data);

                    });

                }

            });
        </script>

       <script src="{{ asset('js/app.js') }}" defer></script>

       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
       <script type="text/javascript">
           $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
       </script>
       <script type="text/javascript">
         $('.select-chapter').on('change',function(){
            $('.waiting').text('Đang chuyển chương vui lòng chờ xíu....');
            var url = $(this).val();
            if(url){
              window.location = url;
            }
            return false;
         });

         current_chapter();
         function current_chapter(){
            var url  = window.location.href;
            $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
         }
       </script>
        </body>
</html>
