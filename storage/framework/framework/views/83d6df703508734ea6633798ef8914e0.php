

<?php $__env->startSection('content'); ?>
    <h1>Listado de Vendedores</h1>
    <a href="<?php echo e(route('vendedores.create')); ?>" class="btn btn-primary">Nuevo Vendedor</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $vendedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($vendedor->nombre); ?></td>
                <td><?php echo e($vendedor->email); ?></td>
                <td><?php echo e($vendedor->telefono); ?></td>
                <td>
                    <a href="<?php echo e(route('vendedores.show', $vendedor)); ?>" class="btn btn-info">Ver</a>
                    <a href="<?php echo e(route('vendedores.edit', $vendedor)); ?>" class="btn btn-warning">Editar</a>
                    <form action="<?php echo e(route('vendedores.destroy', $vendedor)); ?>" method="POST" style="display:inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemanuevo\resources\views/vendedores/index.blade.php ENDPATH**/ ?>