<?php if (isset($tarea)): ?>
    <h1><?= $tarea->nombre ?></h1>
    <?php if ($productos->num_rows == 0): ?><!--si no hay productos-->
        <p>No hay productos para mostrar</p>
    <?php else: ?><!--recorrer los productos-->

        <?php while ($product = $productos->fetch_object()): ?>
            <div class="product">
                <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
                    <?php if ($product->imagen != null): ?>
                        <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
                    <?php else: ?>
                        <img src="<?= base_url ?>assets/img/logo.png" />
                    <?php endif; ?>
                    <h2><?= $product->nombre ?></h2>
                </a>
                <p><?= $product->valorCompra ?></p>
                <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">COMPRAR</a>
            </div>
        <?php endwhile; ?>

    <?php endif; ?>
<?php else: ?>
    <h1>La tarea no existe</h1>
<?php endif; ?>
