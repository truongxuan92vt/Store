<?php
    use \App\Http\Controllers\Admin\FunctionController;
    $function = new FunctionController();
    $menu = $function->getMenu();
    $url = Route::current()->uri;
    $active = $function->getActiveMenu($url);
?>
<script>
    var data = <?php echo e($active); ?>

    $(document).ready(function(){
        $('.sidebar-menu li').removeClass('active');
        for(i=0; i<data.length;i++){
            $('#m_'+data[i]).addClass("active");
        }
    });
</script>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="margin-top: 5%;margin-left: 3%;">
                <img src="<?php echo e(!empty(Auth::user()->image)?Auth::user()->image:URL::to('/').'/image/avatar.jpeg'); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(Auth::user()->username); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" >
            <li class="header">MAIN NAVIGATION</li>
        </ul>
        <ul class="sidebar-menu" data-widget="tree" style="height: calc(100vh - 135px); overflow-y: auto;-webkit-overflow-scrolling: touch;">
            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($item['subs'])>0): ?>
                    <li class="treeview" id="m_<?php echo e($item['id']); ?>">
                        <a href="#">
                            <i class="<?php echo e($item['icon']); ?>"></i> <span><?php echo e($item['name']); ?></span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php $__currentLoopData = $item['subs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subL1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($subL1['subs'])>0): ?>
                                <li class="treeview" id="m_<?php echo e($subL1['id']); ?>">
                                    <a href="#">
                                        <i class="<?php echo e($subL1['icon']); ?>"></i> <span><?php echo e($subL1['name']); ?></span>
                                        <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php $__currentLoopData = $subL1['subs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subL2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(count($subL2['subs'])>0): ?>
                                                <li class="treeview" id="m_<?php echo e($subL2['id']); ?>">
                                                    <a href="#">
                                                        <i class="<?php echo e($subL2['icon']); ?>"></i> <span><?php echo e($subL2['name']); ?></span>
                                                        <span class="pull-right-container">
                                                          <i class="fa fa-angle-left pull-right"></i>
                                                        </span>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <?php $__currentLoopData = $subL2['subs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subL3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li id="m_<?php echo e($subL3['id']); ?>">
                                                                <a href="<?php echo e($subL3['url']); ?>">
                                                                    <i class="<?php echo e($subL3['icon']); ?>"></i> <span><?php echo e($subL3['name']); ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php else: ?>
                                                <li id="m_<?php echo e($subL2['id']); ?>">
                                                    <a href="<?php echo e($subL2['url']); ?>">
                                                        <i class="<?php echo e($subL2['icon']); ?>"></i> <span><?php echo e($subL2['name']); ?></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                                <?php else: ?>
                                    <li id="m_<?php echo e($subL1['id']); ?>">
                                        <a href="<?php echo e($subL1['url']); ?>">
                                            <i class="<?php echo e($subL1['icon']); ?>"></i> <span><?php echo e($subL1['name']); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li id="m_<?php echo e($item['id']); ?>">
                        <a href="<?php echo e($item['url']); ?>">
                            <i class="<?php echo e($item['icon']); ?>"></i> <span><?php echo e($item['name']); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>