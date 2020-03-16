
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('controller', 'Dashboard'); ?>
<?php $__env->startSection('action', 'Controller pannel'); ?>
<?php $__env->startSection('content'); ?>
    <div style="height: 1200px" style="z-index: 1;position: relative;">
        
        <?php if(isset($category) && count($category->banners)): ?>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php $i = 0;?>
                    <?php $__currentLoopData = $category->banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo e($i); ?>" class="<?php echo e($i==0?'active':''); ?>"></li>
                        <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $j = 0;?>
                    <?php $__currentLoopData = $category->banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item<?php echo e($j==0?' active':''); ?>">
                            <img src="<?php echo e($banner->url); ?>" alt="Los Angeles" style="width: 100%;height: 250px;">
                        </div>
                        <?php $j++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('webs.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>