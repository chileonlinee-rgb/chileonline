

<?php $__env->startSection('content'); ?>
    <h1>Editar Repartidor</h1>
    
    <form action="<?php echo e(route('repartidores.update', $repartidore)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo e($repartidore->nombre); ?>" required>
        </div>
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo e($repartidore->email); ?>" required>
        </div>
        
        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo e($repartidore->telefono); ?>" required>
        </div>
        
        <div class="form-group">
            <label>Vehículo:</label>
            <select name="vehiculo_type" class="form-control" required>
                <?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($vehiculo); ?>" <?php echo e($repartidore->vehiculo_type == $vehiculo ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($vehiculo)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
         <div class="form-group">
            <label>Zona:</label>
            <select name="zona" class="form-control" required>
                <?php $__currentLoopData = $zona; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zonas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($zonas); ?>" <?php echo e($repartidore->zona == $zonas ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($zonas)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemanuevo\resources\views/repartidores/edit.blade.php ENDPATH**/ ?>