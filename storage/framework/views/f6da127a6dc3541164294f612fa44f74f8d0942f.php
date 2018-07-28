<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Book : <?php echo e($book->title); ?></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('books.index')); ?>"> Back</a>
            </div>
        </div>
    </div>

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php echo Form::model($book, ['method' => 'PATCH','route' => ['books.update', $book->id],'files'=>true]); ?>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ISBN:</strong>
                    <?php echo Form::text('isbn', null, array('placeholder' => 'ISBN','class' => 'form-control')); ?>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <?php echo Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')); ?>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Author:</strong>
                    <?php echo Form::text('author', null, array('placeholder' => 'Author','class' => 'form-control')); ?>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <?php echo Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')); ?>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <?php echo e(Html::image(URL::to("/uploads/books/".$book->image), "Book Cover", ['width' => 50, 'height' => 50])); ?>

                </div>
                <div class="form-group">
                    <strong>Image:</strong>
                    <?php echo Form::file('image', array('class' => 'form-control')); ?>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>   
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>