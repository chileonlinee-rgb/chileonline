

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Comisiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3>Comisiones por Vendedor</h3>
            </div>
            
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('entregas.index')); ?>">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label>Fecha Inicio</label>
                            <input type="date" name="start_date" 
                                   class="form-control" 
                                   value="<?php echo e(request('start_date')); ?>">
                        </div>
                        
                        <div class="col-md-4">
                            <label>Fecha Fin</label>
                            <input type="date" name="end_date" 
                                   class="form-control" 
                                   value="<?php echo e(request('end_date')); ?>">
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                Filtrar
                            </button>
                        </div>
                    </div>
                </form>
                 <a href="<?php echo e(route('entregas.create')); ?>" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Crear Entregas en Bodega
        </a>
                <div class="table-responsive mt-4">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Vendedor</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Total Comisiones</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $entregas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrega): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($entrega->vendedor); ?></td>
                                <td><?php echo e($entrega->vendedor); ?></td>
                                <td><?php echo e($entrega->vendedor); ?></td>
                                <td>$<?php echo e(number_format($entrega->total_comision, 2)); ?></td>
                                <td>
                                    <a href="<?php echo e(route('entregas.show', $entrega->vendedor)); ?>" 
                                       class="btn btn-sm btn-info">
                                        Ver Detalle
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/entrega/index.blade.php ENDPATH**/ ?>