<!-- BARRA LATERAL -->
<aside id="lateral">

    

    <div id="login" class="block_aside">

        <?php if (!isset($_SESSION['identity'])): ?>
            <h3>Entrar User</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" />
                <label for="password">Contraseña</label>
                <input type="password" name="password" />
                <input type="submit" value="Enviar" />
            </form>
        <?php else: ?><!--mostrar el nombre y apellido del usuario-->
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>

        <ul>
            <?php if (isset($_SESSION['admin'])): ?>
            <li><a href="<?= base_url ?>categoria/index">Gestionar Categoria</a></li>
                <li><a href="<?= base_url ?>tarea/index">Gestionar tareas</a></li>
                <li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
                 <li><a href="<?= base_url ?>venta/gestion">Gestionar ventas</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['identity'])): ?>
                  
                <li><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
            <?php else: ?> 
                <li><a href="<?= base_url ?>usuario/registro">Registrase</a></li>
            <?php endif; ?> 
        </ul>
    </div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div id="central">