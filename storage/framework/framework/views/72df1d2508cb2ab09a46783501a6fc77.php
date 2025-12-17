

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Listado de Productos</h3>
            <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-light">
                <i class="fas fa-plus"></i> Nuevo Producto
            </a>
        </div>
        
        <div class="card-body">
            <?php if($productos->isEmpty()): ?>
                <div class="alert alert-info">No hay productos registrados</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Producto</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($producto->producto); ?></td>
                                <td>$<?php echo e(number_format($producto->precio_compra, 2)); ?></td>
                                <td>$<?php echo e(number_format($producto->precio_venta, 2)); ?></td>
                                <td><?php echo e($producto->cantidad); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($producto->status == 'activo' ? 'success' : 'secondary'); ?>">
                                        <?php echo e($producto->status); ?>

                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('productos.show', $producto)); ?>" 
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-eye">Ver</i>
                                    </a>
                                    <a href="<?php echo e(route('productos.edit', $producto)); ?>" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit">Editar</i>
                                    </a>
                                    <form action="<?php echo e(route('productos.destroy', $producto)); ?>" 
                                          method="POST" style="display:inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Eliminar este producto?')">
                                            <i class="fas fa-trash">Eliminar</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($productos->links()); ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/productos/index.blade.php ENDPATH**/ ?>