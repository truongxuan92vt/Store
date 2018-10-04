@extends('webs.layouts.master')
@section('title', 'Home')
@section('controller', 'Dashboard')
@section('action', 'Controller pannel')
@section('content')
<div style="min-height: 1200px; position: relative; background-color: white;">
    {{--{{count($category->banners)}}--}}
    @if(isset($category) && count($category->banners))
        <div id="myCarousel" class="carousel slide" data-ride="carousel" >
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $i = 0;?>
                @foreach($category->banners as $banner)
                    <li data-target="#myCarousel" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}"></li>
                    <?php $i++;?>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                    <?php $j = 0;?>
                    @foreach($category->banners as $banner)
                        <div class="item{{$j==0?' active':''}}">
                            <img src="{{$banner->url}}" alt="Los Angeles" style="width: 100%;height: 250px;">
                        </div>
                            <?php $j++;?>
                    @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif
    <div class="product">
        @foreach($products as $pro)
            <div class="product-box">
                <a href="{{route('web.product.detail',['id'=>$pro->id])}}">
                    <div>
                        <img src="{{$pro['image']}}">
                    </div>
                    <div class="product-info">
                        <div class="product-color"></div>
                        <div class="product-name">
                            <span>{{$pro['product_name']}}</span>
                        </div>
                        <div class="product-star">
                            <i class="fa fa-star" aria-hidden="true"></i>&nbsp;
                            <i class="fa fa-star" aria-hidden="true"></i>&nbsp;
                            <i class="fa fa-star" aria-hidden="true"></i>&nbsp;
                            <i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;
                            <i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;
                        </div>
                        <div class="price">
                            <span class="product-price">290,000Đ</span>
                            <span class="product-old-price">350,000Đ</span>
                            <span class="product-percent">-{{round((350000-290000)/350000*100)}}%</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection