<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
	<h1>Editar producto <?=$pro->nombre?></h1>
	<?php $url_action = base_url."producto/save&id=".$pro->id; ?>
	
<?php else: ?>
	<h1>Crear nuevo producto</h1>
	<?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>
	
<div class="form_container">
	
  
	<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
            
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"/>

		<label for="color">Color</label>
                <input type="text" name="color" value="<?=isset($pro) && is_object($pro) ? $pro->color : ''; ?>"/>

		<label for="peso">Peso</label>
                <input type="number" name="peso" value="<?=isset($pro) && is_object($pro) ? $pro->peso : ''; ?>"/>
                
                <label for="marca">Marca</label>
                <input type="text" name="marca" value="<?=isset($pro) && is_object($pro) ? $pro->marca : ''; ?>"/>

		<label for="valorCompra">valorCompra</label>
                <input type="number" name="valorCompra" value="<?=isset($pro) && is_object($pro) ? $pro->valorCompra : ''; ?>"/>

		<label for="stock">Stock</label>
                <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>"/>
                
  		<label for="imagen">Imagen</label>
		<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
			<img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb"/> 
		<?php endif; ?>
		<input type="file" name="imagen" />
		
		<input type="submit" value="Guardar" />
	</form>
</div>