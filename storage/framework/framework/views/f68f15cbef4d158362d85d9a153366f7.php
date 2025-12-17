

<?php $__env->startSection('content'); ?>
    <h1>Detalles del Repartidor</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($repartidore->nombre); ?></h5>
            <p class="card-text"><strong>Email:</strong> <?php echo e($repartidore->email); ?></p>
            <p class="card-text"><strong>Teléfono:</strong> <?php echo e($repartidore->telefono); ?></p>
            <p class="card-text"><strong>Vehículo:</strong> <?php echo e(ucfirst($repartidore->vehiculo_type)); ?></p>
            <a href="<?php echo e(route('repartidores.index')); ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemanuevo\resources\views/repartidores/show.blade.php ENDPATH**/ ?>