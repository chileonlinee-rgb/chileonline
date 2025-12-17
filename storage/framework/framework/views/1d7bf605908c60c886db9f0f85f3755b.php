

<?php $__env->startSection('content'); ?>
    <h1>Editar Vendedor</h1>
    
    <form action="<?php echo e(route('vendedores.update', $vendedore)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo e($vendedore->nombre); ?>" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo e($vendedore->email); ?>" required>
        </div>
        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo e($vendedore->telefono); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemanuevo\resources\views/vendedores/edit.blade.php ENDPATH**/ ?>