

<?php $__env->startSection('title'); ?> Detail Category <?php $__env->stopSection(); ?> 

<?php $__env->startSection('content'); ?>
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <label><b>Category name</b></label><br>
        <?php echo e($category->name); ?>

        <br><br>

        <label><b>Category slug</b></label><br>
        <?php echo e($category->slug); ?>

        <br><br>

        <label><b>Category image</b></label><br>
        <?php if($category->image): ?>
          <img src="<?php echo e(asset('storage/' . $category->image)); ?>" width="120px">
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larashop_abdul_halik\resources\views/categories/show.blade.php ENDPATH**/ ?>