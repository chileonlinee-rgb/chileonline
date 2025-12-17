


<?php $__env->startSection('content'); ?>
<?php if(auth()->user()->role_id == 1): ?> 
<html>
<head>
    <title>Reporte de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .total-box {
            background-color: #e9ecef;
            padding: 1rem;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container py-5">
       
            <div class="row">   
                <div class="col-md-12"> 
                <a href="<?php echo e(route('pedidos.create')); ?>" class="btn btn-success mb-4">
                            <i class="fas fa-plus"></i> Nuevo Pedido
                        </a>
                </div>
        <div class="card shadow-lg">
         
         
          
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Filtro de Pedidos</h3>
            </div>
 
            
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('pedidos.index')); ?>">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" name="start_date" 
                                   class="form-control" 
                                   value="<?php echo e(request('start_date')); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" name="end_date" 
                                   class="form-control" 
                                   value="<?php echo e(request('end_date')); ?>">
                        </div>
                        <div class="col-md-3">
                            <label>Vendedora</label>
                            <select name="vendedora" class="form-select">
                                <option value="">Todas</option>
                                <?php $__currentLoopData = $vendedoras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendedora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($vendedora); ?>" 
                                        <?php echo e(request('vendedora') == $vendedora ? 'selected' : ''); ?>>
                                        <?php echo e($vendedora); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-funnel"></i> Filtrar
                            </button>
                        </div>
                        
    
                    </div>
                </form>
            </div>

            <?php if($pedidos->isNotEmpty()): ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                        <th>Fecha</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Delivery</th>
                                        <th>Total</th>
                                        <th>Comision</th>
                                        <th>Status</th>
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
                                <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($pedido->fecha); ?></td>
                        <td><?php echo e($pedido->producto); ?></td>
                       
                        <td>$<?php echo e($pedido->cantidad); ?></td>
                       
                        <td>$<?php echo e($pedido->precio); ?></td>
                        <td><?php echo e($pedido->delivery); ?></td>
                        
                        <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                        <td><?php echo e($pedido->comision); ?></td>
                        <td><?php echo e($pedido->status); ?></td>
                        <td><?php echo e($pedido->turno_reparto); ?></td>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="total-box mt-4">
                        <h4 class="mb-0 text-end">
                            Total de Pedidos: <?php echo e($pedidos->count()); ?></h4>
                        <h4 class="mb-0 text-end">
                        </h4>
                    </div>
                    <div class="total-box mt-4">
                        <h4 class="mb-0 text-end">
                            Total Comision: $<?php echo e(number_format($totalGeneral, 2)); ?>

                        </h4>
                    </div>
                </div>
            <?php else: ?>
                <div class="card-body">
                    <div class="alert alert-warning mb-0">
                        No se encontraron pedidos en el rango seleccionado
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</body>
</html>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/pedidos/index.blade.php ENDPATH**/ ?>