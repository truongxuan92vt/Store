@extends('webs.layouts.master')
@section('title', 'Home')
@section('controller', 'Dashboard')
@section('action', 'Controller pannel')
@section('content')
    <script src="{{module_path()}}/slick-carousel/slick/slick.js"></script>
    <link rel="stylesheet" href="{{module_path()}}/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="{{module_path()}}/slick-carousel/slick/slick-theme.css">

<div class="item-container">
    <div class="menu-title">
        <ul>
            <li class="menu-title-item"><a href="/">Trang chủ</a></li>
            <li class="menu-title-item"><a href="#">Điện thoại máy tính bảng</a></li>
            <li class="menu-title-item"><a href="#">{{$item->name}}</a></li>
        </ul>
    </div>
    <div class="item-summary">
        <div class="item-image">
            <div class="slider-for">
                <div class="gallery-preview">
                    <img src="{{$item->image??""}}">
                </div>
                @if(isset($item->images))
                    @foreach($item->images as $item)
                        <div>
                            <img src="{{$item->url}}">
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="slider-nav">
                <div class="slider-nav-item">
                    <img src="{{$item->image??""}}">
                </div>
                @if(isset($item->images))
                    @foreach($item->images as $item)
                        <div class="slider-nav-item">
                            <img src="{{$item->url}}">
                        </div>
                    @endforeach
                @endif
            </div>
            {{--<div class="item-gallery">
                <div class="gallery-preview">
                    <img src="{{$item->image??""}}">
                </div>
                <div class="gallery-slick-horizontal">
                    <div class="slick-list">
                        <div class="slick-track">
                            @if(count($item->images))
                                @foreach($item->images as $item)
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
            </div>--}}
        </div>
        <div class="item-cart">
            <div class="item-info">
                <div class="item-header">
                    <div class="item-name">
                        <p>{{$item->name}}</p>
                    </div>
                    <div class="item-star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span style="color: #1a9cb7;cursor: pointer;font-size: 10px">1 đánh giá</span>
                    </div>
                    <div>
                        <p style="color:#9e9e9e;font-size: 11px">Thương hiệu: <b style="color: black">Apple</b></p>
                    </div>
                </div>

                <div class="item-price">
                    <div class="current-price">
                        @if(isset($item->prices) && count($item->prices)>0)
                            @foreach($item->prices as $item)
                                {{number_format($item->price)}}đ
                                @break
                            @endforeach
                        @else
                            0đ
                        @endif
                    </div>
                    <div class="old-price">
                        <span class="decrease-price">
                            @if(isset($item->prices))
                                @foreach($item->prices as $item)
                                    @if($item->normal_price>0)
                                        {{number_format($item->normal_price)}}đ
                                        @break
                                    @endif
                                @endforeach
                            @endif
                        </span>
                        <span class="percent-decrease-price">
                            @if(isset($item->prices))
                                @foreach($item->prices as $item)
                                    @if($item->normal_price>0 && ($item->price/$item->normal_price)>0)
                                        -{{(1-round($item->price/$item->normal_price,2))*100}}%
                                        @break
                                    @endif
                                @endforeach
                            @endif
                        </span>
                    </div>
                </div>
                <div class="item-quantity">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                        </span>
                        <input id="txt_quantityCart" type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                          </span>
                    </div>
                </div>
                <div class="item-add-to-cart">
                    <button type="button" class="btn btn-warning">MUA NGAY</button>
                    <button id="btn_addToCart" type="button" class="btn btn-danger" style="background: #f57224;margin-left: 10px">THÊM VÀO GIỎ HÀNG</button>
                </div>
            </div>
            <div class="item-delivery">
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
    <div class="item-content">
        <div class="item-detail">
            <h4><b>Mô tả {{$item->name}}</b></h4>
            <div class="item-desc">
                {!! $item->desc->long_desc??"" !!}
            </div>
        </div>
    </div>
</div>
<script>

    $(function(){
        $('.slider-for').slick({
            // lazyLoad: 'ondemand',
            // fade: true,
            // infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav',
            autoplay:true
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            centerMode: true,
            focusOnSelect: true,
        });
    })
    $('.btn-number').click(function(e){
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {

                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());
        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $("#btn_addToCart").click(function(){
        pro = {
            "id":"{{$item->id}}",
            "name":"{{$item->name}}",
            "image":"{{$item->image??""}}"
        }
        pro.quantity = parseInt($("#txt_quantityCart").val());
        var price = 0;
        var listPrice = '<?php echo(isset($item->prices)?json_encode($item->prices):"");?>'
        listPrice = JSON.parse(listPrice);
        for(i = 0; i<listPrice.length; i++){
            price = listPrice[i].price
        }
        pro.price = parseFloat(price);
        pro.amount = parseFloat(pro.price*pro.quantity);
        itemCart = localStorage.getItem("itemCart")?JSON.parse(localStorage.getItem("itemCart")):[];
        isExist = false;
        if(itemCart!=null){
            itemCart.forEach(function(e,i) {
                if(e!=null){
                    if(e.id == pro.id){
                        e.quantity += pro.quantity;
                        e.amount = e.price*e.quantity;
                        isExist = true;
                    }
                }
                else{
                    delete itemCart[null];
                }
            })
        }
        if(!isExist){
            itemCart.push(pro);
        }
        res = [];
        for(i = 0; i<itemCart.length;i++){
            if(itemCart[i]!=null){
                res.push(itemCart[i]);
            }
        }
        // localStorage.clear();
        localStorage.removeItem('itemCart');
        if(res.length>0){
            localStorage.setItem('itemCart',JSON.stringify(res));
        }
        generateShortCart();
    })
</script>
@endsection