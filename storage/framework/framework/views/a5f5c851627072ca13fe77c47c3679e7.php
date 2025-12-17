

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Nuevo Pedido</h1>
    <form action="<?php echo e(route('pedidos.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="producto">Producto</label>
            <input type="text" name="producto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="delivery">Delivery</label>
            <input type="number" step="0.01" name="delivery" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="turno_reparto">Turno de Reparto</label>
           <select name="turno_reparto" class="form-control" required>
        <option value="">-- Seleccione una ruta --</option>
            <option value="11am">
               11am
            </option>
            <option value="3pm">
              3pm
            </option>
             <option value="7pm">
              7pm
            </option>
            </select>
        </div>
        <div class="form-group">
            <label for="sector">Sector</label>
            <select name="sector" class="form-control" required>
        <option value="">-- Seleccione un Sector --</option>
            <option value="Norte">
               Norte
            </option>
            <option value="Centro">
              Centro
            </option>
             <option value="Sur">
              Sur
            </option>
            </select>
        </div>
        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefono_cliente">Teléfono del Cliente</label>
            <input type="text" name="telefono_cliente" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nombre_vendedora">Nombre de la Vendedora</label>
            <select name="nombre_vendedora" class="form-control" required>
            <option value="">-- Seleccione un Vendedor --</option>
            <?php $__currentLoopData = $vendedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($vendedor->id); ?>" <?php echo e(old('vendedor') == $vendedor->id ? 'selected' : ''); ?>>
                    <?php echo e($vendedor->nombre); ?> 
                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
        <div class="form-group">
            <label for="telefono_vendedora">Teléfono de la Vendedora</label>
            <input type="text" name="telefono_vendedora" class="form-control" required>
        </div>
         <div class="form-group">
  
            <input type="text" name="repartidor" class="form-control" value="0"  required  style="display: none;>
        </div>
        <div class="form-group">
            <label for="observacion">Observación</label>
            <textarea name="observacion" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistemanuevo\resources\views/pedidos/create.blade.php ENDPATH**/ ?>