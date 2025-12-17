

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Entrega</h1>
    <form action="<?php echo e(route('entregas.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Producto</label>
            <input type="text" name="producto" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Precio ($)</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Comisión ($)</label>
            <input type="number" step="0.01" name="comision" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Vendedor</label>
            <input type="text" name="vendedor" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/entregas/create.blade.php ENDPATH**/ ?>