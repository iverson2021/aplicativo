<h1>Crear tarea</h1>

<?php if(isset($_SESSION['crear']) && $_SESSION['crear'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['crear']) && $_SESSION['crear'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('crear'); ?>
        
        
<form action="<?= base_url ?>tarea/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>
    
    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" ></textarea>
    
    <label for="fechaInicio">fechaInicio</label>
    <input type="date" name="fechaInicio" required/>
    
    <label for="fechaFinal">fechaFinal</label>
    <input type="date" name="fechaFinal" required/>
    
    <label for="registradaPor">RegistradaPor</label>
    <input type="text" name="registradaPor" required/>

    <input type="submit" value="Confirmar tarea" />
    
   </form>
                    
