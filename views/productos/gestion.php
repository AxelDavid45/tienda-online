<?php if (!isset($_SESSION)): session_start(); endif; ?>
<!--<div class="container">-->
<h1>Gestionar los productos</h1>
<?php if (isset($_SESSION['producto']['save']) && $_SESSION['producto']['save'] == true): ?>
    <div class="alert alert-success">
        Se creo correctamente el producto
    </div>
<?php elseif (isset($_SESSION['producto']['save']) && $_SESSION['producto']['save'] != true): ?>
    <div class="alert alert-warning">
        No se pudo crear el producto
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['producto']['delete']) && $_SESSION['producto']['delete'] == true): ?>
    <div class="alert alert-success">
        Se creo borro el producto correctamente
    </div>
<?php elseif (isset($_SESSION['producto']['delete']) && $_SESSION['producto']['delete'] != true): ?>
    <div class="alert alert-warning">
        No se pudo crear el producto
    </div>
<?php endif; ?>
<?php helpers::deleteSession('producto'); ?>

<a href="<?= base_url ?>productos/nuevo" class="boton boton-verde">Crear nuevo</a>
<div class="flex-products">
    <?php while ($pro = $products_list->fetch_object()): ?>
        <div class="product">
            <h3><?= $pro->nombre; ?></h3>
            <img class="img-small" src="<?= base_url . $pro->imagen ?>" alt="">
            <p>Precio: $<?= $pro->precio; ?></p>
            <p>Descuento: $<?= $pro->oferta; ?>%</p>
            <p><strong>Stock: <?= $pro->stock; ?></strong></p>
            <p><strong>Fecha de creación: <?= $pro->fecha; ?></strong></p>
            <a href="<?= base_url ?>productos/delete&id=<?= $pro->id ?>" class="boton boton-rojo">Eliminar</a>
            <a href="<?= base_url ?>productos/edit&id=<?= $pro->id ?>" class="boton boton-naranja">Editar</a>
        </div>
    <?php endwhile; ?>
</div>

</div> <!---   content -->
</div> <!---   container -->