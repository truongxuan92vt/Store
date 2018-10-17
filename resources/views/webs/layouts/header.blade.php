<?php
    $categories = \App\Http\Controllers\Admin\CategoryController::getCategoryForWeb();
?>
<div class="top-header">
    <div class="container">
        <div style="color: white;">
            <div class="top-header-item">
                <a href="{{route('admin.home')}}" style="color: white;font-weight: normal">Login</a>
            </div>
            <div class="top-header-item">
                <a href="{{route('admin.home')}}" style="color: white;font-weight: normal">SignUp</a>
            </div>
        </div>
    </div>
</div>
<div class="header-nav">
    <div class="container">
        <div class="top-nav">
            <div class="cp-icon"><label style="margin-right: 30px;"><a href="/">STORE</a></label></div>
            <div class="frm-search" style="width: 75%">
                <div class="input-group margin-bottom-sm">
                    <input class="form-control" type="text" placeholder="Search">
                    <span class="input-group-addon"><i class="fa fa-search fa-fw" aria-hidden="true"></i></span>
                </div>
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">--}}
                    {{--<span class="input-group-addon" id="basic-addon2" style="cursor: pointer"><i class="fa fa-search" aria-hidden="true"></i> Search</span>--}}
                {{--</div>--}}
            </div>
            <div class="shopping-cart">
                <div>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <input type="text" id="cart_num_item" value="" style="width: 40px; text-align: center">
                    {{--<span >100</span>--}}
                </div>
                <div class="cart-short-show">
                    <div>
                        <div style="background: #f8f8f8">
                            <label>Sản phẩm đã thêm</label>
                        </div>
                        <div class="cart-short-items">
                            <table id ="tb_short-cart" style="color: red;width: 100%"></table>
                            <div class="btn-shopping-cart">
                                <button class="btn btn-facebook">Xem giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div style="margin-top: 5px; margin-bottom: 2px;margin-left: 15px; margin-right: 15px;">
                    <span><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Giỏ hàng</span>
                    <input id="cart_num_item" value="1000" type="button">
                </div>--}}
            </div>
        </div>
        <div class="main-nav">
            <nav class="main-nav-wrap">
                <a class="main-nav-toggle">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <span>DANH MỤC SẢN PHẨM</span>
                </a>
                <ul>
                    @foreach($categories as $item)
                        <li>
                            <a href="{{route('web.category.index',['category_id'=>$item['id'],'name'=>$item['category_name']])}}">
                            <span class="icon-wrap">
                                <i class="lv1-icon {{$item['icon']||''}}"></i>
                            </span>
                                <span>{{$item['category_name']}}</span>
                            </a>
                            @if(count($item['childs'])>0)
                                <div class="nav-sub">
                                    <ul>
                                        @foreach($item['childs'] as $sub)
                                            <li>
                                                {{--<i class="fa fa-arrow-circle-down"></i>--}}
                                                <a href="{{route('web.category.index',['category_id'=>$sub['id'],'name'=>$sub['category_name']])}}">
                                                    <div class="nav-sub-lvl-2">
                                                    <span>
                                                        {{$sub['category_name']}}
                                                    </span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                    {{--<li>
                        <a>
                            <span class="icon-wrap">
                                <i class="lv1-icon fa fa-tablet"></i>
                            </span>
                            <span>Điện Thoại - Máy Tính Bảng</span>
                        </a>
                        <div class="nav-sub">
                            <ul>
                                <li>
                                    --}}{{--<i class="fa fa-arrow-circle-down"></i>--}}{{--
                                    <div class="nav-sub-lvl-2">
                                        <span style="height: auto;display: inline-block;width:150px;word-wrap:break-word;">
                                            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbb
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>--}}
                </ul>
            </nav>
            <div class="main-nav-item">
                <a>
                    <span>
                        <i class="fa fa-address-book"></i>
                    </span>
                    <span>
                        Address of you
                    </span>
                </a>

            </div>
            <div class="main-nav-item">
                <a>
                    <span>
                        <i class="fa fa-sort-numeric-asc"></i>
                    </span>
                    <span>
                        Address of you
                    </span>
                </a>

            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        generateShortCart();
    })
    function generateShortCart() {
        productCart = localStorage.getItem('productCart')?JSON.parse(localStorage.getItem('productCart')):[];
        qtyToView = 0;
        cartShort = document.getElementsByClassName('cart-short-items');
        htmlAppend = "";
        if(productCart!=null){
            $("#tb_short-cart tr").remove();
            productCart.forEach(function(e){
                if(e!=null){
                    qtyToView += e.quantity;
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td width=13% class="short-cart-item-image"><img src="'+e.image+'"></td>';
                    cols += '<td width=80% class="short-cart-item-name" style="color: black"><div>'+e.name+'</div><div class="short-cart-item-detail">'+e.quantity+' x '+formatMoney(e.price,0)+'</div></td>';
                    cols += '<td width=10% class="short-cart-item-amount" style="text-align: right">'+formatMoney(e.amount,0)+'</td>';
                    cols += '<td width=8% class="short-cart-item-delete" style="text-align: right"><a onclick="removeItemInCart('+e.id+')">Xóa</a></td>';
                    newRow.append(cols);
                    $("#tb_short-cart").append(newRow);
                }
            });
        }

        $('#cart_num_item').val(qtyToView);
    }
    function removeItemInCart(id){
        productCart = localStorage.getItem('productCart')?JSON.parse(localStorage.getItem('productCart')):[];
        productCart.forEach(function(v,i){
            if(v!=null){
                if(v.id == id){
                    delete productCart[i];
                }
            }
        })
        if(productCart.length>0)
        {
            localStorage.setItem('productCart',JSON.stringify(productCart));
        }
        else{
            localStorage.removeItem('productCart');
        }
        generateShortCart();
    }
    function countNumQtyInCart(){
        productCart = localStorage.getItem('productCart')?JSON.parse(localStorage.getItem('productCart')):[];
        qtyToView = 0;
        cartShort = document.getElementsByClassName('cart-short-items');
        productCart.forEach(function(v){
            if(v!=null){
                qtyToView += v.quantity;
            }
        });
        $('#cart_num_item').val(qtyToView);
    }
    function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",",money="đ") {
        try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

            const negativeSign = amount < 0 ? "-" : "";

            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;

            return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
            console.log(e)
        }
    };
    width = document.getElementsByClassName("container")[0].clientWidth;
    {{--$('.main-nav-wrap>ul>li>.nav-sub').width((window.innerWidth)/2 + 50);--}}
    $('.main-nav-wrap>ul>li>.nav-sub').width(width-370);
    $('.main-nav-wrap>ul>li>a').hover( function() {
        $('.main-nav-wrap>ul>li>a').removeClass('active');
        $(this).addClass('active');
    });
</script>