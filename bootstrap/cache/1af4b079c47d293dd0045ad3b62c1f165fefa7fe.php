

<?php $__env->startSection('body'); ?>
    <!--Site Wrapper -->
    <div class="site_wrapper">
        <?php echo $__env->yieldContent('content'); ?>
        
        <div class="notify text-center"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/helder/Sites/iilex/shipreload/resources/views/layouts/app.blade.php ENDPATH**/ ?>