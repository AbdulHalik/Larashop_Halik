

<?php $__env->startSection('title'); ?> Edit book <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8">

    <?php if(session('status')): ?>
      <div class="alert alert-success">
        <?php echo e(session('status')); ?>

      </div>
    <?php endif; ?>

    <form
      enctype="multipart/form-data"
      method="POST"
      action="<?php echo e(route('books.update', [$book->id])); ?>"
      class="p-3 shadow-sm bg-white"
    >

    <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="PUT">

    <label for="title">Title</label><br>
    <input
      type="text"
      class="form-control <?php echo e($errors->first('title') ? "is-invalid" : ""); ?>"
      value="<?php echo e(old('title') ? old('title') : $book->title); ?>"
      name="title"
      placeholder="Book title"
    />
    <div class="invalid-feedback">
      <?php echo e($errors->first('title')); ?>

    </div>
    <br>

    <label for="cover">Cover</label><br>
    <small class="text-muted">Current cover</small><br>
    <?php if($book->cover): ?>
      <img src="<?php echo e(asset('storage/' . $book->cover)); ?>" width="96px"/>
    <?php endif; ?>
    <br><br>
    <input
      type="file"
      class="form-control <?php echo e($errors->first('cover') ? "is-invalid" : ""); ?>"
      name="cover"
    >
    <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
    <div class="invalid-feedback">
      <?php echo e($errors->first('cover')); ?>

    </div>
    <br><br>

    <label for="slug">Slug</label><br>
    <input
      type="text"
      class="form-control <?php echo e($errors->first('slug') ? "is-invalid" : ""); ?>"
      value="<?php echo e(old('slug') ? old('slug') :$book->slug); ?>"
      name="slug"
      placeholder="enter-a-slug"
    />
    <div class="invalid-feedback">
      <?php echo e($errors->first('slug')); ?>

    </div>
    <br>

    <label for="description">Description</label> <br>
    <textarea name="description" id="description" class="form-control <?php echo e($errors->first('description') ? "is-invalid" : ""); ?>"><?php echo e(old('description') ? old('description') : $book->description); ?></textarea>
    <div class="invalid-feedback">
      <?php echo e($errors->first('description')); ?>

    </div>
    <br>

    <label for="categories">Categories</label>
    <select multiple class="form-control <?php echo e($errors->first('categories') ? "is-invalid" : ""); ?>" name="categories[]" id="categories"></select>
    <br>
    <br>

    <label for="stock">Stock</label><br>
    <input type="text" class="form-control <?php echo e($errors->first('stock') ? "is-invalid" : ""); ?>" placeholder="Stock" id="stock" name="stock" value="<?php echo e(old('stock') ? old('stock') :$book->stock); ?>">
    <div class="invalid-feedback">
      <?php echo e($errors->first('stock')); ?>

    </div>
    <br>

    <label for="author">Author</label>
    <input placeholder="Author" value="<?php echo e(old('author') ? old('author') :$book->author); ?>" type="text" id="author" name="author" class="form-control <?php echo e($errors->first('author') ? "is-invalid" : ""); ?>">
    <div class="invalid-feedback">
      <?php echo e($errors->first('author')); ?>

    </div>
    <br>

    <label for="publisher">Publisher</label><br>
    <input class="form-control <?php echo e($errors->first('publisher') ? "is-invalid" : ""); ?>" type="text" placeholder="Publisher" name="publisher" id="publisher" value="<?php echo e(old('publisher') ? old('publisher') :$book->publisher); ?>">
    <div class="invalid-feedback">
      <?php echo e($errors->first('publisher')); ?>

    </div>
    <br>

    <label for="price">Price</label><br>
    <input type="text" class="form-control <?php echo e($errors->first('price') ? "is-invalid" : ""); ?>" name="price" placeholder="Price" id="price" value="<?php echo e(old('price') ? old('price') :$book->price); ?>">
    <div class="invalid-feedback">
      <?php echo e($errors->first('price')); ?>

    </div>
    <br>

    <label for="">Status</label>
    <select name="status" id="status" class="form-control <?php echo e($errors->first('status') ? "is-invalid" : ""); ?>">
      <option <?php echo e($book->status == 'PUBLISH' ? 'selected' : ''); ?> value="PUBLISH">PUBLISH</option>
      <option <?php echo e($book->status == 'DRAFT' ? 'selected' : ''); ?> value="DRAFT">DRAFT</option>
    </select>
    <div class="invalid-feedback">
      <?php echo e($errors->first('status')); ?>

    </div>
    <br>

    <button class="btn btn-primary" value="PUBLISH">Update</button>

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
    url: 'http://localhost:8080/larashop_abdul_halik.test/ajax/categories/search',
    processResults: function(data){
      return {
        results: data.map(function(item){return {id: item.id, text: item.name} })
      }
    }
  }
});

var categories = <?php echo $book->categories; ?>


    categories.forEach(function(category){
      var option = new Option(category.name, category.id, true, true);
      $('#categories').append(option).trigger('change');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\larashop_abdul_halik\resources\views/books/edit.blade.php ENDPATH**/ ?>