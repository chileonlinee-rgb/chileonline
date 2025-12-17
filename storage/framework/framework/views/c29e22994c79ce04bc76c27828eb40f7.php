

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Detalle del Producto</h3>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información Básica</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Producto:</strong> <?php echo e($producto->producto); ?>

                        </li>
                        <li class="list-group-item">
                            <strong>Proveedor:</strong> <?php echo e($producto->proveedor); ?>

                        </li>
                        <li class="list-group-item">
                            <strong>Estado:</strong>
                            <span class="badge bg-<?php echo e($producto->status == 'activo' ? 'success' : 'secondary'); ?>">
                                <?php echo e($producto->status); ?>

                            </span>
                        </li>
                    </ul>
                </div>
                
                <div class="col-md-6">
                    <h5>Detalles Financieros</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Precio Compra:</strong> $<?php echo e(number_format($producto->precio_compra, 2)); ?>

                        </li>
                        <li class="list-group-item">
                            <strong>Precio Venta:</strong> $<?php echo e(number_format($producto->precio_venta, 2)); ?>

                        </li>
                        <li class="list-group-item">
                            <strong>Comisión:</strong> <?php echo e($producto->comision); ?>%
                        </li>
                        <li class="list-group-item">
                            <strong>Cantidad:</strong> <?php echo e($producto->cantidad); ?>

                        </li>
                    </ul>
                </div>
                
                <div class="col-12 mt-4">
                    <h5>Descripción</h5>
                    <p><?php echo e($producto->descripcion ?? 'Sin descripción'); ?></p>
                </div>
            </div>
            
            <div class="mt-4">
                <a href="<?php echo e(route('productos.edit', $producto)); ?>" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/productos/show.blade.php ENDPATH**/ ?>