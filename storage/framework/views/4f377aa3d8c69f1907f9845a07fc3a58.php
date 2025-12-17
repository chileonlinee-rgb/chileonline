

<?php $__env->startSection('content'); ?>
  <div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Detalle de Comisiones: <?php echo e($vendedor->nombre); ?></h3>
        </div>
        
        <div class="card-body">
            <div class="alert alert-success">
                <h4>Total Comisiones Activas: $<?php echo e(number_format($totalComision, 2)); ?></h4>
            </div>

            <h4>Pedidos Activos</h4>
            <div class="table-responsive mb-4">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Comisión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($pedido->fecha->format('d/m/Y')); ?></td>
                            <td><?php echo e($pedido->producto); ?></td>
                            <td><?php echo e($pedido->cantidad); ?></td>
                            <td>$<?php echo e(number_format($pedido->total, 2)); ?></td>
                            <td>$<?php echo e(number_format($pedido->comision, 2)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <h4>Entregas</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Comisión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $entregas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrega): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($entrega->fecha->format('d/m/Y')); ?></td>
                            <td><?php echo e($entrega->producto); ?></td>
                            <td>$<?php echo e(number_format($entrega->precio, 2)); ?></td>
                            <td>$<?php echo e(number_format($entrega->comision, 2)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/vendedores/show.blade.php ENDPATH**/ ?>