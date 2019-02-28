<?php if (isset($_SESSION['user_data'])): ?>
    <h1>Terminar el pedido</h1>
    <a href="<?=base_url?>carrito/index" class="boton boton-naranja">Regresar a carrito</a>
<?php else: ?>
<h1>Debes iniciar sesión para poder seguir con el pedido</h1>
<p>Inicia sesíon por favor</p>

<?php endif; ?>


</div> <!---   content -->
</div> <!---   container -->