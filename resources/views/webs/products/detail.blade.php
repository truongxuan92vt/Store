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
                <div class="product-header">
                    <div class="product-name">
                        <p>{{$product->product_name}}</p>
                    </div>
                    <div class="product-star">
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
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                        </span>
                        <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                          </span>
                    </div>
                </div>
                <div class="product-add-to-cart">
                    <button type="button" class="btn btn-warning">MUA NGAY</button>
                    <button type="button" class="btn btn-danger" style="background: #f57224;margin-left: 10px">THÊM VÀO GIỎ HÀNG</button>
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
<script>
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
</script>
@endsection