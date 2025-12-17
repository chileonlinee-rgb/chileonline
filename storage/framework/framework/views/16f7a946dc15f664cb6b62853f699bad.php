

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Entrega</h1>
    <form action="<?php echo e(route('entregas.update', $entrega->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" value="<?php echo e($entrega->fecha); ?>" required>
        </div>
        <div class="form-group">
            <label>Producto</label>
            <input type="text" name="producto" class="form-control" value="<?php echo e($entrega->producto); ?>" required>
        </div>
        <div class="form-group">
            <label>Precio ($)</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo e($entrega->precio); ?>" required>
        </div>
        <div class="form-group">
            <label>Comisión ($)</label>
            <input type="number" step="0.01" name="comision" class="form-control" value="<?php echo e($entrega->comision); ?>" required>
        </div>
        <div class="form-group">
            <label>Vendedor</label>
            <input type="text" name="vendedor" class="form-control" value="<?php echo e($entrega->vendedor); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/entregas/edit.blade.php ENDPATH**/ ?>