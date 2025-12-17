

<?php $__env->startSection('content'); ?>
    <h1>Repartidores</h1>
    <a href="<?php echo e(route('repartidores.create')); ?>" class="btn btn-success mb-3">Nuevo Repartidor</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th> 
                <th>Zona</th>
                <th>Vehículo</th>
               
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $repartidores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repartidor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($repartidor->nombre); ?></td>
                <td><?php echo e($repartidor->email); ?></td>
                <td><?php echo e($repartidor->telefono); ?></td>
                <td><?php echo e($repartidor->zona); ?></td>
                <td><?php echo e(ucfirst($repartidor->vehiculo_type)); ?></td>
                <td>
                    <a href="<?php echo e(route('repartidores.show', $repartidor)); ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="<?php echo e(route('repartidores.edit', $repartidor)); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <form action="<?php echo e(route('repartidores.destroy', $repartidor)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar repartidor?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($repartidores->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemanuevo\resources\views/repartidores/index.blade.php ENDPATH**/ ?>