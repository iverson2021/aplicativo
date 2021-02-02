<h1>Gestión de productos</h1>

<a href="<?= base_url ?>producto/crear" class="button button-small">
    Crear producto
</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>	
    <strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
    <strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <?php while ($pro = $productos->fetch_object()): ?>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>COLOR</th>
            <th>PESO</th>
        </tr><tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->color; ?></td>
            <td><?= $pro->peso; ?></td>
        </tr><tr></tr><tr>

            <th>MARCA</th>
            <th>VALORCOMPRA</th>
            <th>STOCK</th>
            <th>ACCIONES</th>
        </tr><tr>
            <td><?= $pro->marca; ?></td>
            <td><?= $pro->valorCompra; ?></td>
            <td><?= $pro->stock; ?></td>


            <td>
                <a href="<?= base_url ?>producto/editar&id=<?= $pro->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>producto/eliminar&id=<?= $pro->id ?>" class="button button-gestion button-red">Eliminar</a>
                
            </td>

        </tr><tr></tr><tr> </tr><tr></tr> <tr> </tr><tr></tr>
        <?php endwhile; ?>
        
             <tr>
</table>
