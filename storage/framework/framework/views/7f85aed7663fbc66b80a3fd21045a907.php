


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Listado de Pedidos</h1>

    <!-- Botón de crear -->
    <a href="<?php echo e(route('pedidos.create')); ?>" class="btn btn-success mb-4">
        <i class="fas fa-plus"></i> Nuevo Pedido
    </a>

    <!-- Tabla -->
   <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Delivery</th>
                    <th>Total</th>
                    <th>Turno Reparto</th>
                    <th>Sector</th>
                    <th>Cliente</th>
                    <th>Teléfono Cliente</th>
                    <th>Dirección</th>
                    <th>Vendedora</th>
                    <th>Teléfono Vendedora</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($pedido->fecha); ?></td>
                        <td><?php echo e($pedido->producto); ?></td>
                       
                        <td>$<?php echo e($pedido->cantidad); ?></td>
                       
                        <td>$<?php echo e($pedido->precio); ?></td>
                        <td><?php echo e($pedido->delivery); ?></td>
                        
                        <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                        <td><?php echo e($pedido->turno); ?></td>
                        <td><?php echo e($pedido->sector); ?></td>
                        <td><?php echo e($pedido->nombre_cliente); ?></td>
                        <td><?php echo e($pedido->telefono_cliente); ?></td>
                        <td><?php echo e($pedido->direccion); ?></td>
                        <td><?php echo e($pedido->nombre_vendedora); ?></td>
                        <td><?php echo e($pedido->telefono_vendedora); ?></td>
                        <td><?php echo e($pedido->observacion); ?></td>
                        <td>
                            <a href="<?php echo e(route('pedidos.edit', $pedido->id)); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit">EDITAR</i>
                            </a>
                            <form action="<?php echo e(route('pedidos.destroy', $pedido->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar pedido?')">
                                    <i class="fas fa-trash">ELIMINAR</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
   
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemanuevo\resources\views/pedidos/index.blade.php ENDPATH**/ ?>