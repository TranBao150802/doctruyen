<h3>TRUYỆN HAY NÊN ĐỌC</h3>
                <div class="owl-carousel owl-theme">
                    @foreach($truyen as $key => $value)
                    <div class="item"><img style="height: 292px;width: 214px;" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
                        <h5 style="display:-webkit-box;overflow:hidden;text-overflow:ellipsis;-webkit-line-clamp: 1;-webkit-box-orient:vertical;">{{$value->tentruyen}}</h5>
                        <p><i class="fas fa-eye"></i>Update<img style="width: 10%" src="{{asset("public/uploads/contact/giphy.gif")}}"></p>
                        <a class="btn btn-danger btn-sm" href="{{url('doc-truyen/'.$value->slug_truyen)}}">ĐỌC VỘI</a>
                    </div>
                    @endforeach
                </div>