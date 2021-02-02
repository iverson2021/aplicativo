<?php if (isset($product)): ?>
    <h1><?= $product->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($product->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/logo.png" />
            <?php endif; ?>
        </div>
        <div class="data">
           <div class="data">
			<p class="price"><?= $product->nombre ?></p>
                        <p class="price"><?= $product->color ?></p>
			<p class="price">$  <?= $product->valorCompra ?></p>
			
        </div>
    </div>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
