
<?php $__env->startSection('content'); ?>

<div class="container">
    <h1 class="my-4">Editar Pedido</h1>

    <form action="<?php echo e(route('pedidos.update', $pedido->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="row g-3">
            <!-- Columna Izquierda -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" 
                           value="<?php echo e(old('fecha', $pedido->fecha)); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Producto</label>
                    <input type="text" class="form-control" name="producto" 
                           value="<?php echo e(old('producto', $pedido->producto)); ?>" required>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" 
                               value="<?php echo e(old('cantidad', $pedido->cantidad)); ?>" min="1" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Precio Unitario</label>
                        <input type="number" step="0.01" class="form-control" name="precio" 
                               value="<?php echo e(old('precio', $pedido->precio)); ?>" required>
                    </div>
                </div>

                  <div class="col-6">
                     <label class="form-label">Delivery</label>
                     <input type="text" class="form-control" name="delivery" 
                               value="<?php echo e(old('delivery', $pedido->delivery)); ?>" required>
                  
                </div>
            </div>

            <!-- Columna Derecha -->
        <div class="form-group">
            <label>Turno:</label>
            <select name="turno" class="form-control" required>
                <?php $__currentLoopData = $turno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turnos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($turnos); ?>" <?php echo e($pedido->turno == $turnos ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($turnos)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
             <div class="form-group">
            <label>Zona:</label>
            <select name="zona" class="form-control" required>
                <?php $__currentLoopData = $zona; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zonas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($zonas); ?>" <?php echo e($pedido->zona == $zonas ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($zonas)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                   <input type="text" class="form-control" name="nombre_cliente" 
                               value="<?php echo e(old('cliente', $pedido->nombre_cliente)); ?>" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefono Cliente</label>
                   <input type="text" class="form-control" name="telefono_cliente" 
                               value="<?php echo e(old('cliente', $pedido->telefono_cliente)); ?>" min="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Vendedora</label>
                  <input type="text" class="form-control" name="nombre_vendedora" 
                               value="<?php echo e(old('nombre_vendedora', $pedido->nombre_vendedora)); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefono Vendedora</label>
                   <input type="text" class="form-control" name="telefono_vendedora" 
                               value="<?php echo e(old('vendedora', $pedido->telefono_vendedora)); ?>" min="1" required>
                </div>
                <div class="mb-3">
        <div class="form-group">
            <label>Repartidor:</label>
            <select name="repartidor" class="form-control" required>
                <?php $__currentLoopData = $repartidores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repartidor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($repartidor->nombre); ?>" <?php echo e($pedido->repartidor == $repartidor ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($repartidor->nombre)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <textarea class="form-control" name="direccion" rows="2"><?php echo e(old('direccion', $pedido->direccion)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Observacion</label>
                    <textarea class="form-control" name="observacion" rows="2"><?php echo e(old('observacion', $pedido->observacion)); ?></textarea>
                </div>
                  <div class="form-group">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <?php $__currentLoopData = $statu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status); ?>" <?php echo e($pedido->status == $status ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($status)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
            </div>
        <br>

       <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/pedidos/edit.blade.php ENDPATH**/ ?>