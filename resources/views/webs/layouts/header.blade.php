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
            <div class="cp-icon"><label style="margin-right: 30px;">TX STORE</label></div>
            <div class="frm-search" style="width: 65%">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2" style="cursor: pointer"><i class="fa fa-search" aria-hidden="true"></i> Search</span>
                </div>
            </div>
            <div class="shopping-cart">
                <div style="margin-top: 5px; margin-bottom: 2px;margin-left: 15px; margin-right: 15px;">
                    <span><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Giỏ hàng</span>
                    <input id="cart_num_item" value="1000" type="button">
                </div>
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
    $('.main-nav-wrap>ul>li>.nav-sub').width((window.innerWidth)/2);
    $('.main-nav-wrap>ul>li>a').hover( function() {
        $('.main-nav-wrap>ul>li>a').removeClass('active');
        $(this).addClass('active');
    });
</script>