<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">
	Crear categoria
</a>
<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
                <th>ACCIONES</th>
	</tr>
	<?php while($cat = $categorias->fetch_object()) : ?>
		<tr>
			<td><?=$cat->id;?></td>
			<td><?=$cat->nombre;?></td>
		
                  <td>
                <a href="<?= base_url ?>categoria/editar&id=<?= $cat->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>categoria/eliminar&id=<?= $cat->id ?>" class="button button-gestion button-red">Eliminar</a>
                
            </td>
            </tr>
	<?php endwhile; ?>
                
</table>
