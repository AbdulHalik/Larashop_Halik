

<?php $__env->startSection('title'); ?> Create book <?php $__env->stopSection(); ?> 

<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-8">
      <?php if(session('status')): ?>
        <div class="alert alert-success">
          <?php echo e(session('status')); ?>

        </div>
      <?php endif; ?>

      <form 
        action="<?php echo e(route('books.store')); ?>"
        method="POST"
        enctype="multipart/form-data"
        class="shadow-sm p-3 bg-white"
        >

        <?php echo csrf_field(); ?>

        <label for="title">Title</label> <br>
        <input value="<?php echo e(old('title')); ?>" type="text" class="form-control <?php echo e($errors->first('title') ? "is-invalid" : ""); ?> " name="title" placeholder="Book title">
        <div class="invalid-feedback">
          <?php echo e($errors->first('title')); ?>

        </div>
        <br>

        <label for="cover">Cover</label>
        <input type="file" class="form-control <?php echo e($errors->first('cover') ? "is-invalid" : ""); ?> " name="cover">
        <div class="invalid-feedback">
          <?php echo e($errors->first('cover')); ?>

        </div>
        <br>

        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control <?php echo e($errors->first('description') ? "is-invalid" : ""); ?> " placeholder="Give a description about this book"><?php echo e(old('description')); ?></textarea>
        <div class="invalid-feedback">
          <?php echo e($errors->first('description')); ?>

        </div>
        <br>

        <label for="categories">Categories</label><br>
        <select name="categories[]" multiple id="categories" class="form-control"></select>
        <br><br>

        <label for="stock">Stock</label><br>
        <input value="<?php echo e(old('stock')); ?>" type="number" class="form-control <?php echo e($errors->first('stock') ? "is-invalid" : ""); ?> " id="stock" name="stock" min=0 value=0>
        <div class="invalid-feedback">
          <?php echo e($errors->first('stock')); ?>

        </div>
        <br>

        <label for="author">Author</label><br>
        <input value="<?php echo e(old('author')); ?>" type="text" class="form-control <?php echo e($errors->first('author') ? "is-invalid" : ""); ?> " name="author" id="author" placeholder="Book author">
        <div class="invalid-feedback">
          <?php echo e($errors->first('author')); ?>

        </div>
        <br>

        <label for="publisher">Publisher</label>  <br>
        <input value="<?php echo e(old('publisher')); ?>" type="text" class="form-control <?php echo e($errors->first('publisher') ? "is-invalid" : ""); ?> " id="publisher" name="publisher" placeholder="Book publisher">
        <div class="invalid-feedback">
          <?php echo e($errors->first('publisher')); ?>

        </div>
        <br>

        <label for="Price">Price</label> <br>
        <input value="<?php echo e(old('price')); ?>" type="number" class="form-control <?php echo e($errors->first('price') ? "is-invalid" : ""); ?> " name="price" id="price" placeholder="Book price">
        <div class="invalid-feedback">
          <?php echo e($errors->first('price')); ?>

        </div>
        <br>

        <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
        <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-scripts'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
$('#categories').select2({
  ajax: {
    url: 'http://larashop.test/ajax/categories/search',
    processResults: function(data){
      return {
        results: data.map(function(item){return {id: item.id, text: item.name} })
      }
    }
  }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larashop_abdul_halik\resources\views/users/create.blade.php ENDPATH**/ ?>