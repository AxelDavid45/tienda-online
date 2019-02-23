<?php  if(!isset($_SESSION)): session_start(); endif; ?>
<h1>Listado de categorias</h1>

<?php if(isset($_SESSION['error_query'])):  ?>
<?php if($_SESSION['error_query'] == true): ?>
    <div class="alert alert-warning">
        <p>Error al guardar la categoria</p>
    </div>
<?php else:  ?>
        <div class="alert alert-success">
            <p>Categoria guardada correctamente</p>
        </div>
<?php endif;  ?>
<?php endif;  ?>

<?php if(isset($_SESSION['error_delete'])):  ?>
    <?php if($_SESSION['error_delete'] == true): ?>
        <div class="alert alert-warning">
            <p>Error al borrar la categoria</p>
        </div>
    <?php else:  ?>
        <div class="alert alert-success">
            <p>Categoria borrada correctamente</p>
        </div>
    <?php endif;  ?>

<?php endif;  ?>

<?php if(isset($_SESSION['error_edit'])):  ?>
    <?php if($_SESSION['error_edit'] == true): ?>
        <div class="alert alert-warning">
            <p>Error al editar la categoria</p>
        </div>
    <?php else:  ?>
        <div class="alert alert-success">
            <p>Categoria editada correctamente</p>
        </div>
    <?php endif;  ?>

<?php endif;  ?>
<a href="<?=base_url?>categorias/crear" class="boton boton-verde">Crear nueva</a>
<div class="flex-products">
    <?php while ($cat = $categorias_query->fetch_object()): ?>
        <div class="product">
            <h3><?= $cat->nombre;?></h3>
            <a href="<?=base_url?>categorias/delete&id=<?=$cat->id?>" class="boton boton-rojo">Eliminar</a>
            <a href="<?=base_url?>categorias/edit_view&id=<?=$cat->id?>" class="boton boton-naranja">Editar</a>
        </div>
    <?php endwhile; ?>
</div>

<?php helpers::deleteSession('error_query');  ?>
<?php helpers::deleteSession('error_delete');  ?>
<?php helpers::deleteSession('error_edit');  ?>

</div> <!---   content -->
</div> <!---   container -->