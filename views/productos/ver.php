<?php if (isset($pro) && is_object($pro)): ?>
    <h1><?= $pro->nombre ?></h1>
<div class="product-single">
    <?php if ($pro->imagen != null): ?>
        <img class="m-8 img-single" src="<?= base_url . $pro->imagen ?>" alt="">
    <?php else: ?>
        <strong class="m-8">Imagen no disponible</strong>
    <?php endif; ?>
    <h3 class="nombre-prod"><?= $pro->nombre; ?></h3>
    <?php if ($pro->oferta != 0): ?>
        <p class="m-8 precio">Precio: $<?= $pro->precio; ?></p>
        <p class="m-8"><strong>Descuento del: <?= $pro->oferta; ?>%</strong></p>
    <?php else: ?>
        <p class="m-8 precio"><strong>Precio: $<?= $pro->precio; ?></strong></p>
    <?php endif; ?>
    <p class="m-8"><strong>Stock: <?= $pro->stock; ?></strong></p>
    <h3 class="m-8">Descripcion:</h3>
    <p class="m-8"><?= $pro->descripcion; ?></p>
    <div class="m-8">
        <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="boton boton-verde">Agregar al carrito</a>
    </div>
</div>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
</div> <!---   content -->
</div> <!---   container -->
