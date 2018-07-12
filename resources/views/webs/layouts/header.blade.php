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
                    <li>
                        <a href="#">
                            <span class="icon-wrap">
                                <i class="lv1-icon fa fa-tablet"></i>
                            </span>
                            <span>Điện Thoại - Máy Tính Bảng</span>
                        </a>
                        <div class="nav-sub">
                            <ul>
                                <li>
                                    {{--<i class="fa fa-arrow-circle-down"></i>--}}
                                    <div class="nav-sub-lvl-2">
                                        <span>
                                            abc
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a>
                            <span class="icon-wrap">
                                <i class="lv1-icon fa fa-tablet"></i>
                            </span>
                            <span>Điện Thoại - Máy Tính Bảng</span>
                        </a>
                        <div class="nav-sub">
                            <ul>
                                <li>
                                    {{--<i class="fa fa-arrow-circle-down"></i>--}}
                                    <div class="nav-sub-lvl-2">
                                        <span style="height: auto;display: inline-block;width:150px;word-wrap:break-word;">
                                            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbb
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
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
<style>
    .main-nav-item{
        cursor: pointer;
        display: inline-block;
        position: relative;
    }
    .main-nav-item:before{
        margin-left: 60px;
        content: " ";
    }
    .main-nav-item>a:hover{
        color: #23527c;
        text-decoration-line: underline;
    }
    .main-nav-item>a{
        padding-left: 12px;
        font-weight: 400;
        font-size: 13px;
        letter-spacing: .6px;
        width: 229px;
        height: 30px;
        position: relative;
        color: #fff;
        text-decoration-line: none;
    }
    .main-nav-wrap>ul>li>div:hover{
        display: block;
    }
    .main-nav-wrap>ul>li>a:hover + div{
        display: block;
    }
    .main-nav-wrap>ul>li>.nav-sub>ul{
        list-style: none;
    }
    .main-nav-wrap>ul>li>.nav-sub{
        display: block;
        height: 400px;

        padding: 14px 20px;
        border-width: 1px;
        border-style: solid;
        border-color: #ddd #ddd #ddd #e1e1e1;
        position: absolute;
        top: -1px;
        bottom: -1px;
        left: 100%;
        background: #fff;
        margin-left: 0;
        display: none;
        border-radius: 0 3px 3px 0;
        -webkit-box-shadow: -2px 0 8px 0 rgba(0,0,0,.06);
        box-shadow: -2px 0 8px 0 rgba(0,0,0,.06);
        z-index: 1;
    }
    .main-nav-wrap>ul:hover{
        display: block;
    }
    .main-nav-toggle:hover + ul{
        display: block;
    }
    .main-nav-wrap>ul>li>a i.lv1-icon {
        position: absolute;
        top: 5px;
        left: 13px;
        bottom: 0;
        right: 0;
    }
    .main-nav-wrap>ul>li>a span{
        font-size: 13px;
        letter-spacing: 0;
        font-weight: 400;
    }
    .main-nav-wrap>ul>li>a span.icon-wrap{
        width: 30px;
        height: 30px;
        display: inline-block;
        position: absolute;
        top: 0;
        left: 5px;
        bottom: 0;
        margin: auto;
    }

    /* Menu Active */
    .main-nav-wrap>ul>li>a.active{
        background: #189eff;
        border-color: #189eff;
        color: #fff;
        z-index: 2;
    }
    /* Menu Arrow */
    .main-nav-wrap>ul>li>a.active:not(.no-sub):before{
        right: -35px;
        border-top: 18px solid transparent;
        border-left: 18px solid #189eff;
        border-bottom: 18px solid transparent;
        border-right: 18px solid transparent;
    }
    .main-nav-wrap>ul>li>a.active:not(.no-sub):after,.main-nav-wrap>ul>li>a.active:not(.no-sub):before {
        top: 0;
        bottom: 0;
        margin: auto;
        height: 0;
        z-index: 2;
        position: absolute;
        content: "";
    }
    .main-nav-wrap>ul>li>a{
        text-decoration: none;
        padding-top: 4px;
        border-radius: 4px 0 0 4px;
        height: calc(541px / 15);

        padding: 1px 5px 2px 39px;
        display: block;
        color: #444;
        position: relative;
        line-height: 27px;
        border-left: 2px solid transparent;
        margin-left: -1px;
    }
    .main-nav-wrap>ul{
        padding: 0;
        width: 300px;

        list-style: none;
        margin: 0px 0 0;
        position: absolute;
        background: #fff;
        border: 1px solid #e1e1e1;
        display: none;
        border-top: solid 1px #e1e1e1;
        border-radius: 4px 0 0 4px;
    }
    /*Menu hearder level 1*/
    .main-nav-toggle{
        display: inline-block;
        padding-left: 12px;
        font-weight: 400;
        font-size: 13px;
        letter-spacing: .6px;
        color: #fff;
        line-height: 27px;
        width: 229px;
        height: 30px;
    }
    .main-nav-wrap{
        cursor: pointer;
        position:relative;
        display: inline-block;
    }
    /*Div Menu*/
    .main-nav{
        height: 30px;
        position: relative;
    }

    #cart_num_item{
        height: 22px;
        background: orangered;
        border-style: none;
        border-radius: 30px;
        margin-top: 2px;
        /*color: red;*/
    }
    .shopping-cart{
        margin: 10px 10px;
        font-size: 16px;
        color: white;
        border-style: solid;
        border-radius: 2px;
        cursor: pointer;
    }
    .frm-search .input-group{
        width: 100%;
        top: 10px;
    }
    .top-nav > div{
        display:inline-block;
    }
    .cp-icon{
        color: white;
        font-size: 24px;
    }
    .header-nav .top-nav{
        width: 100%;
        margin: 10px 0px;
    }
    .header-nav{
        /*height: 120px;*/
        background-color: #189eff;
        opacity: 0.9;
    }
    .top-header{
        background-color: #1d71ab;
        height: 28px;
        font-size: 14px;
    }
    .top-header-item{
        display: inline;
        margin: 5px 30px 10px 0px;
        float: right;
    }
</style>
<script>
    $('.main-nav-wrap>ul>li>.nav-sub').width((window.innerWidth)/2);
    $('.main-nav-wrap>ul>li>a').hover( function() {
        $('.main-nav-wrap>ul>li>a').removeClass('active');
        $(this).addClass('active');
    });
</script>