<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('books.create')); ?>"> Create New Book</a>
            </div>
        </div>
    </div>
    
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        <?php if(count($books) < 1): ?>
            <td align="center" colspan="7">No books found.</td>
        <?php endif; ?>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($book->isbn); ?></td>
            <td><?php echo e($book->title); ?></td>
            <td><?php echo e($book->author); ?></td>
            <td><?php echo e($book->description); ?></td>
            <td><?php echo e(Html::image(URL::to("/uploads/books/".$book->image), "Book Cover", ['width' => 50, 'height' => 50])); ?></td>
            <td>
                <a class="btn btn-info" href="<?php echo e(route('books.show',$book->id)); ?>">Show</a>
                <a class="btn btn-primary" href="<?php echo e(route('books.edit',$book->id)); ?>">Edit</a>
                <?php echo Form::open(['method' => 'DELETE','route' => ['books.destroy', $book->id],'style'=>'display:inline']); ?>

                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                <?php echo Form::close(); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php echo $books->links(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>