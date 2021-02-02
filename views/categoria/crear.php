<?php if (isset($edit) && isset($cat) && is_object($cat)): ?>
    <h1>Editar categoria    "<?= $cat->nombre ?>"</h1>
    <?php $url_action = base_url . "categoria/save&id" . $cat->id; ?>
    
<?php else: ?>
    <h1>Crear nueva categoria</h1>
    <?php $url_action = base_url . "categoria/save"; ?>
<?php endif; ?>
<?php if(isset($_SESSION['crear']) && $_SESSION['crear'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['crear']) && $_SESSION['crear'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('crear'); ?>


<div class="form_container">

    <form action="<?= $url_action ?>"  method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= isset($cat) && is_object($cat) ? $cat->nombre : ''; ?>"/>

        <input type="submit" value="Guardar" />
    </form>
</div>

