

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3><?php echo e(isset($producto) ? 'Editar' : 'Crear'); ?> Producto</h3>
        </div>
        
        <div class="card-body">
            <form action="<?php echo e(isset($producto) ? route('productos.update', $producto) : route('productos.store')); ?>" 
                  method="POST">
                <?php echo csrf_field(); ?>
                <?php if(isset($producto)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre del Producto</label>
                        <input type="text" name="producto" class="form-control" 
                               value="<?php echo e($producto->producto ?? old('producto')); ?>" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Proveedor</label>
                        <input type="text" name="proveedor" class="form-control" 
                               value="<?php echo e($producto->proveedor ?? old('proveedor')); ?>" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label">Precio de Compra</label>
                        <input type="number" step="0.01" name="precio_compra" class="form-control" 
                               value="<?php echo e($producto->precio_compra ?? old('precio_compra')); ?>" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label">Precio de Venta</label>
                        <input type="number" step="0.01" name="precio_venta" class="form-control" 
                               value="<?php echo e($producto->precio_venta ?? old('precio_venta')); ?>" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" 
                               value="<?php echo e($producto->cantidad ?? old('cantidad')); ?>" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Comisión (%)</label>
                        <input type="number" step="0.01" name="comision" class="form-control" 
                               value="<?php echo e($producto->comision ?? old('comision')); ?>" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Estado</label>
                        <select name="status" class="form-select" required>
                            <option value="activo" <?php echo e(($producto->status ?? old('status')) == 'activo' ? 'selected' : ''); ?>>Activo</option>
                            <option value="inactivo" <?php echo e(($producto->status ?? old('status')) == 'inactivo' ? 'selected' : ''); ?>>Inactivo</option>
                        </select>
                    </div>
                    
                    <div class="col-12">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3"><?php echo e($producto->descripcion ?? old('descripcion')); ?></textarea>
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(isset($producto) ? 'Actualizar' : 'Crear'); ?> Producto
                        </button>
                        <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/productos/create.blade.php ENDPATH**/ ?>