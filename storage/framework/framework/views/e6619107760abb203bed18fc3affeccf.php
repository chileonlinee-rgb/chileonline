

<?php $__env->startSection('content'); ?>
    <h1>Nuevo Repartidor</h1>
    
    <form action="<?php echo e(route('repartidores.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>

        
        </div><div class="form-group">
            <label>Zona:</label>
            <select name="zona" class="form-control" required>
                <?php $__currentLoopData = $zona; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zonas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($zonas); ?>"><?php echo e(ucfirst($zonas)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        
       <div class="form-group">
            <label>Vehículo:</label>
            <select name="vehiculo_type" class="form-control" required>
                <?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($vehiculo); ?>"><?php echo e(ucfirst($vehiculo)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/repartidores/create.blade.php ENDPATH**/ ?>