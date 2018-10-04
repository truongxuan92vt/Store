@extends('webs.layouts.master')
@section('title', 'Home')
@section('controller', 'Dashboard')
@section('action', 'Controller pannel')
@section('content')
<div class="product-container">
    <div class="menu-title">
        <ul>
            <li class="menu-title-item"><a href="/">Trang chủ</a></li>
            <li class="menu-title-item"><a href="#">Điện thoại máy tính bảng</a></li>
            <li class="menu-title-item"><a href="#">{{$product->product_name}}</a></li>
        </ul>
    </div>
    <div class="product-summary">
        <div class="product-image">
            <div class="product-gallery">
                <div class="gallery-preview">
                    <img src="{{$product->image??""}}">
                </div>
                <div class="gallery-slick-horizontal">
                    <div class="slick-list">
                        <div class="slick-track">
                            @if(count($product->images))
                                @foreach($product->images as $item)
                                    <div>
                                        <img src="{{$item->url}}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="slick-prev">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </div>
                    <div class="slick-next">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-cart">
            <div class="product-info">
                <div class="product-name">
                    <p>{{$product->product_name}}</p>
                </div>
                <div class="product-price">
                    <div class="current-price">
                        549.000 đ
                    </div>
                    <div class="old-price">
                        <span>950.000 đ</span>
                        <span class="percent-descrea-price">-40%</span>
                    </div>
                </div>
                <div class="product-quantity">

                </div>
                <div class="product-add-to-cart">

                </div>
            </div>
            <div class="product-delivery">
                <div class="seller-delivery">
                    <div class="delivery-header">
                        <div class="delivery-header-title">Tùy chọn giao hàng</div>
                        <div class="delivery-header-tooltip"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                    </div>
                    <div class="delivery-location">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="delivery-location-name">Hồ Chí Minh,Quận 1,Phường Phạm Ngũ Lão</div>
                        <a>Thay đổi</a>
                    </div>
                    <div class="delivery-content">
                        <div class="delivery-method">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <div>
                                GH Tiêu Chuẩn
                                <div style="color: #9e9e9e;font-size: 10px">4 - 6 Ngày</div>
                            </div>
                            <a>125.000đ</a>
                        </div>
                        <div class="pay-method">
                            <i class="fa fa-usd" aria-hidden="true"></i>
                            <div>Thanh toán khi nhận hàng</div>
                        </div>
                    </div>
                </div>
                <div class="seller-warranty">

                </div>
                <div class="seller-info">

                </div>
            </div>
        </div>
    </div>
    <div class="product-content">
        <div class="product-detail">
            <h4><b>Mô tả {{$product->product_name}}</b></h4>
            <div class="product-desc">
                {!! $product->desc !!}
            </div>
        </div>
    </div>
</div>
@endsection