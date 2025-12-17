

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Entregas en Bodega</h1>
    <a href="<?php echo e(route('entregas.create')); ?>" class="btn btn-success mb-3">Nueva Entrega</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Precio ($)</th>
                <th>Comisión ($)</th>
                <th>Vendedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $entregas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrega): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($entrega->fecha); ?></td>
                <td><?php echo e($entrega->producto); ?></td>
                <td><?php echo e(number_format($entrega->precio, 2)); ?></td>
                <td><?php echo e(number_format($entrega->comision, 2)); ?></td>
                <td><?php echo e($entrega->vendedor); ?></td>
                <td>
                    <a href="<?php echo e(route('entregas.edit', $entrega->id)); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <form action="<?php echo e(route('entregas.destroy', $entrega->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mt-4 bg-light p-3">
        <h4>Total Comisiones: $<?php echo e(number_format($totalComision, 2)); ?></h4>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/entregas/index.blade.php ENDPATH**/ ?>