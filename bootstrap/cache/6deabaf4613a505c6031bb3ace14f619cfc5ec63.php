<?php $__env->startSection('title', 'Início'); ?>
<?php $__env->startSection('data-page-id', 'home'); ?>

<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
        <?php echo $__env->make('_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="row justify-content-center">
      <div class="col-6">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center" colspan="3">Distância a percorrer: <?php echo e($request->distance); ?> MGLT</th>
            </tr>
            <tr>
              <th scope="col" class="text-center">Modelo</th>
              <th scope="col" class="text-center">Parada(s)</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $reloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row"><?php echo e($ship['shipname']); ?></th>
              <td class="text-center"><?php echo e($ship['stops']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/helder/Sites/iilex/shipreload/resources/views/showresult.blade.php ENDPATH**/ ?>