<?php if (isset($cat)): ?>
    <h1><?= $cat->nombre ?></h1>
    <?php if ($products_list->num_rows == 0): ?>
    <p>No hay productos para mostrar</p>
<?php endif; ?>
    <div class="flex-products">
        <?php while ($prod = $products_list->fetch_object()): ?>
            <div class="product">
                <a href="<?=base_url?>productos/ver&id=<?=$prod->id?>">
                <?php if($prod->imagen != null): ?>
                    <img class="img-small" src="<?= base_url . $prod->imagen ?>" alt="">
                <?php  else: ?>
                    <strong>Imagen no disponible</strong>
                <?php endif;  ?>
                <h3><?= $prod->nombre; ?></h3>
                </a>
                <?php if($prod->oferta != 0): ?>
                    <p>Precio: $<?= $prod->precio; ?></p>
                    <p><strong>Descuento del: <?= $prod->oferta; ?>%</strong> </p>
                <?php  else: ?>
                    <p><strong>Precio: $<?= $prod->precio; ?></strong></p>
                <?php endif;  ?>
                <p><strong>Stock: <?= $prod->stock; ?></strong></p>
                <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="boton boton-verde">Agregar al carrito</a>
            </div>
        <?php endwhile; ?>
    </div> <!---   flex products -->
<?php else: ?>
    <h1>La categoria no existe</h1>
    <p>No hay productos para mostrar</p>
<?php endif; ?>
</div> <!---   content -->
</div> <!---   container -->
