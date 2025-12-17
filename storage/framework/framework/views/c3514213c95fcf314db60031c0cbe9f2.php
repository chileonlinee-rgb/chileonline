

<?php $__env->startSection('content'); ?>
    <h1>Detalles del Vendedor</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($vendedore->nombre); ?></h5>
            <p class="card-text">Email: <?php echo e($vendedore->email); ?></p>
            <p class="card-text">Teléfono: <?php echo e($vendedore->telefono); ?></p>
            <a href="<?php echo e(route('vendedores.index')); ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemanuevo\resources\views/vendedores/show.blade.php ENDPATH**/ ?>