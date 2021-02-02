<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer venta</h1>


    <form action="<?= base_url . 'venta/add' ?>" method="POST">
        <label for="codigo">Codigo</label>
        <input type="number" name="codigo" required />

        <label for="valor">Valor</label>
        <input type="number" name="valor" required />

        <input type="submit" value="Confirmar venta" />
    </form>

<?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado en la web para poder realizar tu venta.</p>
<?php endif; ?>


