<h1>Productos agregados</h1>
<table class="table-carrito">
    <tr>
        <th>Productos</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Importe</th>
    </tr>
    <?php if ($sesion_carrito != false): ?>
        <?php foreach ($sesion_carrito as $indice => $elemento):
            $producto = $elemento['producto'];
            ?>
            <tr>
                <td>
                    <?php if ($producto->imagen != null): ?>
                        <a href="<?= base_url ?>productos/ver&id=<?= $producto->id ?>"><img class="img-carrito"
                                                                                            src="<?= base_url.$producto->imagen ?>"
                                                                                            alt="<?= $producto->nombre; ?>"></a>
                    <?php else: ?>
                        <strong>Imagen no disponible</strong>
                    <?php endif; ?>
                </td>
                <td>
                    <?= $elemento['cantidad']; ?>
                </td>
                <td>
                    $<?= $elemento['precio']; ?>
                </td>
                <td>
                    $<?= ((int)$elemento['cantidad'] * (int)$elemento['precio']); ?>
                </td
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<div class="card m-8">
    <?php  $stats = helpers::stats(); ?>
    <h4>Total: $<?=$stats['total']; ?></h4>
    <a href="<?=base_url?>pedidos/hacer" class="boton boton-verde">Confirmar pedido</a>
</div>
</div> <!---   content -->
</div> <!---   container -->