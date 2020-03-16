<?php
    $categories = \App\Http\Controllers\Admin\ProductCategoryController::getCategoryForWeb();
?>
<div class="top-header">
    <div class="container">
        <div style="color: white;">
            <div class="top-header-item">
                <a href="<?php echo e(route('admin.home')); ?>" style="color: white;font-weight: normal">Login</a>
            </div>
            <div class="top-header-item">
                <a href="<?php echo e(route('admin.home')); ?>" style="color: white;font-weight: normal">SignUp</a>
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
                
                    
                    
                
            </div>
            <div class="shopping-cart">
                <div>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <input type="text" id="cart_num_item" value="" style="width: 40px; text-align: center">
                    
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
                
            </div>
        </div>
        <div class="main-nav">
            <nav class="main-nav-wrap">
                <a class="main-nav-toggle">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <span>DANH MỤC SẢN PHẨM</span>
                </a>
                <ul>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('web.category.index',['category_id'=>$item['id'],'name'=>$item['name']])); ?>">
                            <span class="icon-wrap">
                                <i class="lv1-icon <?php echo e($item['icon']||''); ?>"></i>
                            </span>
                                <span><?php echo e($item['name']); ?></span>
                            </a>
                            <?php if(count($item['childs'])>0): ?>
                                <div class="nav-sub">
                                    <ul>
                                        <?php $__currentLoopData = $item['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                
                                                <a href="<?php echo e(route('web.category.index',['category_id'=>$sub['id'],'name'=>$sub['name']])); ?>">
                                                    <div class="nav-sub-lvl-2">
                                                    <span>
                                                        <?php echo e($sub['name']); ?>

                                                    </span>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
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
    
    $('.main-nav-wrap>ul>li>.nav-sub').width(width-370);
    $('.main-nav-wrap>ul>li>a').hover( function() {
        $('.main-nav-wrap>ul>li>a').removeClass('active');
        $(this).addClass('active');
    });
</script>