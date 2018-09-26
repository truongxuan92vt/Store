@extends('webs.layouts.master')
@section('title', 'Home')
@section('controller', 'Dashboard')
@section('action', 'Controller pannel')
@section('content')
<div class="product-container">
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
            </div>
            <div class="product-delivery">
                <div class="seller-delivery">
                    abc
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
            <h4>Mô tả sản {{$product->product_name}}</h4>
            <div class="product-desc">
                {!! $product->desc !!}
            </div>
        </div>
    </div>
</div>
@endsection