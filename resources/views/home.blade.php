@extends('layouts.app')
@section('content')
<div class="container">
            <style type="text/css">
                p.title_thongke {
                    text-align: center;
                    font-size: 20px;
                    font-weight: bold;
                }
                ol.list_views {
                margin: 10px 0;
                color: green;
            }
            ol.list_views a {
                color: darkred;
                font-weight: 400;
            }
            </style>
    <div id="chart" style="height: 250px;"></div>
    <div class="col-md-4 col-xs-12">
        <p class="title_thongke">Quản lý truyện</p>
        <div id="donut"></div>  
    </div>
</div>
@endsection
