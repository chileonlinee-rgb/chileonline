<?php $__env->startSection('content'); ?>
<?php if(auth()->user()->role_id == 1): ?>

<div class="container">
<div class="row mb-4">
    <div class="col-md-4">
        <h1>Panel de Administración</h1>
    </div>
    <div class="col-md-8 text-end">
         <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>  Productos
</a>
        <a href="<?php echo e(route('repartidores.index')); ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>  Repartidores
        </a>
        <a href="<?php echo e(route('pedidos.index')); ?>" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Pedidos en Domicilios
        </a>
         <a href="<?php echo e(route('entregas.index')); ?>" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Pedidos en Bodega
        </a>
        <a href="<?php echo e(route('vendedores.index')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Vendedores
        </a>
    </div>
</div>

    

<div class="row">
    
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Repartidores Activos</h5>
                <p class="card-text display-4"><?php echo e($estadisticas['repartidores']); ?></p>
            </div>
        </div>
    </div>
     <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Pedidos Activos</h5>
                <p class="card-text display-4"><?php echo e($estadisticas['pedidos_hoy']); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Vendedores Activos</h5>
                <p class="card-text display-4"><?php echo e($estadisticas['vendedores']); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Entregas Bodega Activas</h5>
                <p class="card-text display-4"><?php echo e($estadisticas['entregasbodega']); ?></p>
            </div>
        </div>
    </div>
</div>
<?php echo e(now()->format('d-m-Y H:i')); ?>


 
              <?php echo e(now()->format('Y-m-d h:i:s')); ?>

<div class="card">
    <div class="card-header">
       Turno 11am a 3pm
    </div>
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
                    <th>Repartidor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody >
                <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                 <?php if($pedido->turno_reparto == '11am'): ?>
                    <tr 
               
                    >
                        <td ><?php echo e($pedido->fecha); ?></td>
                        <td><?php echo e($pedido->producto); ?></td>
                       
                        <td>$<?php echo e($pedido->cantidad); ?></td>
                       
                        <td>$<?php echo e($pedido->precio); ?></td>
                        <td><?php echo e($pedido->delivery); ?></td>
                        
                        <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                        <td><?php echo e($pedido->turno_reparto); ?></td>
                        <td><?php echo e($pedido->sector); ?></td>
                        <td><?php echo e($pedido->nombre_cliente); ?></td>
                        <td><?php echo e($pedido->telefono_cliente); ?></td>
                        <td><?php echo e($pedido->direccion); ?></td>
                        <td><?php echo e($pedido->nombre_vendedora); ?></td>
                       
                        <td><?php echo e($pedido->telefono_vendedora); ?></td>
                        
                        <td><?php echo e($pedido->observacion); ?></td> 
                         <td><?php echo e($pedido->repartidor); ?></td> 
                       
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
                    </tr>    <?php endif; ?>
                    <?php endif; ?>
                                          
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        Turno 3pm a 7pm
    </div>
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
                    <th>Repartidor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                 <?php if($pedido->turno_reparto == '3pm'): ?>
                    <tr>
                        <td><?php echo e($pedido->fecha); ?></td>
                        <td><?php echo e($pedido->producto); ?></td>
                       
                        <td>$<?php echo e($pedido->cantidad); ?></td>
                       
                        <td>$<?php echo e($pedido->precio); ?></td>
                        <td><?php echo e($pedido->delivery); ?></td>
                        
                        <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                        <td><?php echo e($pedido->turno_reparto); ?></td>
                        <td><?php echo e($pedido->sector); ?></td>
                        <td><?php echo e($pedido->nombre_cliente); ?></td>
                        <td><?php echo e($pedido->telefono_cliente); ?></td>
                        <td><?php echo e($pedido->direccion); ?></td>
                        <td><?php echo e($pedido->nombre_vendedora); ?></td>
                       
                        <td><?php echo e($pedido->telefono_vendedora); ?></td>
                        
                        <td><?php echo e($pedido->observacion); ?></td> 
                         <td><?php echo e($pedido->repartidor); ?></td> 
                       
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
                      <?php endif; ?>
                    <?php endif; ?>
                                          
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<br>
<div class="card">
    <div class="card-header">
        Turno 7pm a 10pm
    </div>
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
                    <th>Repartidor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                 <?php if($pedido->turno_reparto == '7pm'): ?>
                    <tr>
                        <td><?php echo e($pedido->fecha); ?></td>
                        <td><?php echo e($pedido->producto); ?></td>
                       
                        <td>$<?php echo e($pedido->cantidad); ?></td>
                       
                        <td>$<?php echo e($pedido->precio); ?></td>
                        <td><?php echo e($pedido->delivery); ?></td>
                        
                        <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                        <td><?php echo e($pedido->turno_reparto); ?></td>
                        <td><?php echo e($pedido->sector); ?></td>
                        <td><?php echo e($pedido->nombre_cliente); ?></td>
                        <td><?php echo e($pedido->telefono_cliente); ?></td>
                        <td><?php echo e($pedido->direccion); ?></td>
                        <td><?php echo e($pedido->nombre_vendedora); ?></td>
                       
                        <td><?php echo e($pedido->telefono_vendedora); ?></td>
                        
                        <td><?php echo e($pedido->observacion); ?></td> 
                         <td><?php echo e($pedido->repartidor); ?></td> 
                       
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
                      <?php endif; ?>
                    <?php endif; ?>
                                          
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<br>
 <div class="card">
    <div class="card-header">
        Entregas en Bodega
    </div>
  
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
             <?php if($entrega->fecha == now()->format('Y-m-d')): ?>
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
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
    <div class="mt-4 bg-light p-3">
        <h4>Total Comisiones Bodega: $<?php echo e(number_format($totalComision, 2)); ?></h4>
    </div>
     <div class="mt-4 bg-light p-3">
        <h4>Total Comisiones Delivery: $<?php echo e(number_format($totalComisionDelivery, 2)); ?></h4>
    </div>
<?php endif; ?>
<?php if(auth()->user()->role_id == 5): ?> 
Hola Bienvenido a Chileonline
Estas en espera de que te Asignen un Rol
<?php endif; ?>


<?php if(auth()->user()->role_id == 2): ?> 


Hola Repartidor 
<div class="container">
    <div class="card">
    <div class="card-header">
        11am a 3pm
    </div>
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                    <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php echo e($total=0); ?>

                 <?php echo e($total1=0); ?>

            <?php $__currentLoopData = $repartidores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repartidor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($repartidor->nombre == auth()->user()->name): ?>
                    <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                           
                                  <?php if($pedido->turno_reparto == '11am'): ?>
                                    <?php if($repartidor->nombre == $pedido->repartidor): ?>
                                        <tr>
                                            <td><?php echo e($pedido->fecha); ?></td>
                                            <td><?php echo e($pedido->producto); ?></td>
                                        
                                            <td>$<?php echo e($pedido->cantidad); ?></td>
                                        
                                            <td>$<?php echo e($pedido->precio); ?></td>
                                            <td><?php echo e($pedido->delivery); ?></td>
                                            
                                            <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                                            <td><?php echo e($pedido->turno_reparto); ?></td>
                                            <td><?php echo e($pedido->sector); ?></td>
                                            <td><?php echo e($pedido->nombre_cliente); ?></td>
                                            <td><?php echo e($pedido->telefono_cliente); ?></td>
                                            <td><?php echo e($pedido->direccion); ?></td>
                                            <td><?php echo e($pedido->nombre_vendedora); ?></td>
                                        
                                            <td><?php echo e($pedido->telefono_vendedora); ?></td>
                                            
                                            <td><?php echo e($pedido->observacion); ?></td> 
                                            <td><?php echo e($pedido->repartidor); ?></td> 
                                            <td><?php echo e($total += $pedido->precio); ?></td>
                                            <td><?php echo e($total1 += $pedido->delivery); ?></td>
                                        
                                        </tr>  
                                    <?php endif; ?>
                                    
                              
                            <?php endif; ?>
                        <?php endif; ?>  
                                          
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>

        </table>
    </div>
</div>
<br>
 <div class="card">
    <div class="card-header">
        3pm a 7pm
    </div>
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                     <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                   
                </tr>
            </thead>
            <tbody>
                  <?php echo e($total=0); ?>

                 <?php echo e($total1=0); ?>

            <?php $__currentLoopData = $repartidores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repartidor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($repartidor->nombre == auth()->user()->name): ?>
                    <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                          
                                  <?php if($pedido->turno_reparto == '3pm'): ?>
                                    <?php if($repartidor->nombre == $pedido->repartidor): ?>
                                        <tr>
                                            <td><?php echo e($pedido->fecha); ?></td>
                                            <td><?php echo e($pedido->producto); ?></td>
                                        
                                            <td>$<?php echo e($pedido->cantidad); ?></td>
                                        
                                            <td>$<?php echo e($pedido->precio); ?></td>
                                            <td><?php echo e($pedido->delivery); ?></td>
                                            
                                            <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                                            <td><?php echo e($pedido->turno_reparto); ?></td>
                                            <td><?php echo e($pedido->sector); ?></td>
                                            <td><?php echo e($pedido->nombre_cliente); ?></td>
                                            <td><?php echo e($pedido->telefono_cliente); ?></td>
                                            <td><?php echo e($pedido->direccion); ?></td>
                                            <td><?php echo e($pedido->nombre_vendedora); ?></td>
                                        
                                            <td><?php echo e($pedido->telefono_vendedora); ?></td>
                                            
                                            <td><?php echo e($pedido->observacion); ?></td> 
                                            <td><?php echo e($pedido->repartidor); ?></td> 
                                            <td><?php echo e($total += $pedido->precio); ?></td>
                                            <td><?php echo e($total1 += $pedido->delivery); ?></td>
                                        
                                        
                                        </tr>  
                                    <?php endif; ?>
                                     <?php endif; ?>
                              
                          
                        <?php endif; ?>  
                                          
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
       7pm a 10pm
    </div>
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                    <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                </tr>
            </thead>
            <tbody>
                  <?php echo e($total=0); ?>

                 <?php echo e($total1=0); ?>

            <?php $__currentLoopData = $repartidores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repartidor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($repartidor->nombre == auth()->user()->name): ?>
                    <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                         
                                  <?php if($pedido->turno_reparto == '7pm'): ?>
                                    <?php if($repartidor->nombre == $pedido->repartidor): ?>
                                        <tr>
                                            <td><?php echo e($pedido->fecha); ?></td>
                                            <td><?php echo e($pedido->producto); ?></td>
                                        
                                            <td>$<?php echo e($pedido->cantidad); ?></td>
                                        
                                            <td>$<?php echo e($pedido->precio); ?></td>
                                            <td><?php echo e($pedido->delivery); ?></td>
                                            
                                            <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                                            <td><?php echo e($pedido->turno_reparto); ?></td>
                                            <td><?php echo e($pedido->sector); ?></td>
                                            <td><?php echo e($pedido->nombre_cliente); ?></td>
                                            <td><?php echo e($pedido->telefono_cliente); ?></td>
                                            <td><?php echo e($pedido->direccion); ?></td>
                                            <td><?php echo e($pedido->nombre_vendedora); ?></td>
                                        
                                            <td><?php echo e($pedido->telefono_vendedora); ?></td>
                                            
                                            <td><?php echo e($pedido->observacion); ?></td> 
                                            <td><?php echo e($pedido->repartidor); ?></td> 
                                            <td><?php echo e($total += $pedido->precio); ?></td>
                                            <td><?php echo e($total1 += $pedido->delivery); ?></td>
                                        
                                        
                                        </tr>  
                                    <?php endif; ?>
                                     <?php endif; ?>
                              
                          
                        <?php endif; ?>  
                                          
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>
</div>
</div>

<?php endif; ?>





<?php if(auth()->user()->role_id == 4): ?> 


<div class="container">
    <div class="row mb-4">
    <div class="col-md-6">
        <h1>Panel de Administración</h1>
    </div>
    <div class="col-md-6 text-end">
       
        <a href="<?php echo e(route('pedidos.create')); ?>" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i>Crear Pedidos
        </a>
        
        
    </div>
</div>
    <div class="card">
    <div class="card-header">
        11am a 3pm
    </div>
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                    <th>Comision</th>
   
                   
                </tr>
            </thead>
            <tbody>
                <?php echo e($total=0); ?>

                 <?php echo e($total1=0); ?>

            <?php $__currentLoopData = $vendedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($vendedor->nombre == auth()->user()->name): ?>
                    <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                           
                                  <?php if($pedido->turno_reparto == '11am'): ?>
                         
                                    <?php if($vendedor->nombre == $pedido->nombre_vendedora): ?>
                                        <tr>
                                            <td><?php echo e($pedido->fecha); ?></td>
                                            <td><?php echo e($pedido->producto); ?></td>
                                        
                                            <td>$<?php echo e($pedido->cantidad); ?></td>
                                        
                                            <td>$<?php echo e($pedido->precio); ?></td>
                                            <td><?php echo e($pedido->delivery); ?></td>
                                            
                                            <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                                            <td><?php echo e($pedido->turno_reparto); ?></td>
                                            <td><?php echo e($pedido->sector); ?></td>
                                            <td><?php echo e($pedido->nombre_cliente); ?></td>
                                            <td><?php echo e($pedido->telefono_cliente); ?></td>
                                            <td><?php echo e($pedido->direccion); ?></td>
                                            <td><?php echo e($pedido->nombre_vendedora); ?></td>
                                        
                                            <td><?php echo e($pedido->telefono_vendedora); ?></td>
                                            
                                            <td><?php echo e($pedido->observacion); ?></td> 
                                            <td><?php echo e($pedido->repartidor); ?></td> 
                                            <td>
                                                <?php echo e($total1 += $pedido->comision); ?>

                                            </td>
                                            
                                        
                                        </tr>  
                                    <?php endif; ?>
                                    
                              
                            <?php endif; ?>
                        <?php endif; ?>  
                                          
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>

        </table>
    </div>
</div>
<br>
 <div class="card">
    <div class="card-header">
        3pm a 7pm
    </div>
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                     <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                   
                </tr>
            </thead>
            <tbody>
                  <?php echo e($total=0); ?>

                 <?php echo e($total1=0); ?>

             <?php $__currentLoopData = $vendedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($vendedor->nombre == auth()->user()->name): ?>
                    <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                          
                                  <?php if($pedido->turno_reparto == '3pm'): ?>
                                        <?php if($vendedor->nombre == $pedido->nombre_vendedora): ?>
                                        <tr>
                                            <td><?php echo e($pedido->fecha); ?></td>
                                            <td><?php echo e($pedido->producto); ?></td>
                                        
                                            <td>$<?php echo e($pedido->cantidad); ?></td>
                                        
                                            <td>$<?php echo e($pedido->precio); ?></td>
                                            <td><?php echo e($pedido->delivery); ?></td>
                                            
                                            <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                                            <td><?php echo e($pedido->turno_reparto); ?></td>
                                            <td><?php echo e($pedido->sector); ?></td>
                                            <td><?php echo e($pedido->nombre_cliente); ?></td>
                                            <td><?php echo e($pedido->telefono_cliente); ?></td>
                                            <td><?php echo e($pedido->direccion); ?></td>
                                            <td><?php echo e($pedido->nombre_vendedora); ?></td>
                                        
                                            <td><?php echo e($pedido->telefono_vendedora); ?></td>
                                            
                                            <td><?php echo e($pedido->observacion); ?></td> 
                                            <td><?php echo e($pedido->repartidor); ?></td> 
                                            <td><?php echo e($total += $pedido->precio); ?></td>
                                            <td><?php echo e($total1 += $pedido->delivery); ?></td>
                                        
                                        
                                        </tr>  
                                    <?php endif; ?>
                                     <?php endif; ?>
                              
                          
                        <?php endif; ?>  
                                          
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
       7pm a 10pm
    </div>
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                    <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                </tr>
            </thead>
            <tbody>
                  <?php echo e($total=0); ?>

                 <?php echo e($total1=0); ?>

             <?php $__currentLoopData = $vendedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($vendedor->nombre == auth()->user()->name): ?>
                    <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($pedido->fecha == now()->format('Y-m-d')): ?>
                         
                                  <?php if($pedido->turno_reparto == '7pm'): ?>
                                        <?php if($vendedor->nombre == $pedido->nombre_vendedora): ?>
                                        <tr>
                                            <td><?php echo e($pedido->fecha); ?></td>
                                            <td><?php echo e($pedido->producto); ?></td>
                                        
                                            <td>$<?php echo e($pedido->cantidad); ?></td>
                                        
                                            <td>$<?php echo e($pedido->precio); ?></td>
                                            <td><?php echo e($pedido->delivery); ?></td>
                                            
                                            <td><?php echo e($pedido->precio + $pedido->delivery); ?></td>
                                            <td><?php echo e($pedido->turno_reparto); ?></td>
                                            <td><?php echo e($pedido->sector); ?></td>
                                            <td><?php echo e($pedido->nombre_cliente); ?></td>
                                            <td><?php echo e($pedido->telefono_cliente); ?></td>
                                            <td><?php echo e($pedido->direccion); ?></td>
                                            <td><?php echo e($pedido->nombre_vendedora); ?></td>
                                        
                                            <td><?php echo e($pedido->telefono_vendedora); ?></td>
                                            
                                            <td><?php echo e($pedido->observacion); ?></td> 
                                            <td><?php echo e($pedido->repartidor); ?></td> 
                                            <td><?php echo e($total += $pedido->precio); ?></td>
                                            <td><?php echo e($total1 += $pedido->delivery); ?></td>
                                        
                                        
                                        </tr>  
                                    <?php endif; ?>
                                     <?php endif; ?>
                              
                          
                        <?php endif; ?>  
                                          
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>
</div><br>
<div class="card">
    <div class="card-header">
        Entregas en Bodega
    </div>
  
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Precio ($)</th>
                <th>Comisión ($)</th>
                <th>Vendedor</th>
               
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $entregas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrega): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if($entrega->fecha == now()->format('Y-m-d')): ?>
            <tr>
                <td><?php echo e($entrega->fecha); ?></td>
                <td><?php echo e($entrega->producto); ?></td>
                <td><?php echo e(number_format($entrega->precio, 2)); ?></td>
                <td><?php echo e(number_format($entrega->comision, 2)); ?></td>
                <td><?php echo e($entrega->vendedor); ?></td>
                
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


</div>
  
</div>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\sistemanuevo\resources\views/home.blade.php ENDPATH**/ ?>