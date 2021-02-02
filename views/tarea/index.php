<h1>Gestionar tareas</h1>


    <a href="<?= base_url ?>tarea/crear" class="button button-small">
        Crear tarea
    </a>

    <table border='1'>
        <?php while ($tar = $tareas->fetch_object()): ?>
            <tr>
                <!--encabezado de tabla-->
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>REGISTRO</th>
                
            </tr><tr>
                <td><?= $tar->id; ?></td>
                <td><?= $tar->nombre; ?></td>
                <td><?= $tar->descripcion; ?></td>
                 <td><?= $tar->fechaRegistro; ?></td>
           
                 

            </tr><tr>
                <!--iterar y recorrer todos lod objetos y en cada iteaccion me cree una categoria-->

                <!--imprimo cada categoria-->
                <th>INICIA_EN</th>  
                <th>FINAL_EN</th>
                <th>REGISTRA</th>
                <th>ESTADO</th>
            </tr><tr>
                <td><?= $tar->fechaInicio; ?></td>
                <td><?= $tar->fechaFinal; ?></td>
                <td><?= $tar->registradaPor; ?></td>
                 <td><?= $tar->estado; ?></td>
                <?= Utils::showStatus($tar->estado) ?>
            </tr>
            
            <tr> </tr><tr></tr><tr> </tr><tr></tr>
        <?php endwhile; ?>
            
           
    </table>

