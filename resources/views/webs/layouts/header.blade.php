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
            <div class="cp-icon">TX STORE</div>
            <div class="frm-search">

            </div>
        </div>
        <div class="main-nav">

        </div>
    </div>
</div>
<style>
    .header-nav .top-nav .cp-icon{
        color: white;
    }
    .header-nav .top-nav{
        height: 40px;
        line-height: 40px;
        /*margin: 10px 0px;*/
    }
    .top-nav:before,.top-nav:after{
        display: table;
        content: " ";
    }
    .header-nav{
        height: 100px;
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