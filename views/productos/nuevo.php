<?php if (!isset($_SESSION)): session_start(); endif; ?>

<?php if (isset($edit)): ?>
    <h1>Editar producto: <?= (isset($pro) && is_object($pro))?  $pro->nombre : ''?></h1>
    <?php $action = base_url . "productos/save&id={$_GET['id']}"; ?>
<?php else: ?>
    <h1>Creacion de producto</h1>
    <?php $action = base_url . "productos/save"; ?>
<?php endif; ?>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'incomplete'): ?>
    <div class="alert alert-warning">
        Comprueba que los datos que escribiste esten correctos
    </div>
<?php endif; ?>
<?php helpers::deleteSession('producto'); ?>

<div class="form-container">
    <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= (isset($pro) && is_object($pro))?  $pro->nombre : ''?>">

        <label for="descripcion">Descripcion: </label>
        <textarea name="descripcion"><?= (isset($pro) && is_object($pro))?  $pro->descripcion : ''?></textarea>

        <label for="categoria">Categoria:</label>
        <?php $categorias = helpers::getAllCategories(); ?>
        <select name="categoria">
            <option value="" >Selecciona una categoria:</option>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->id ?>" <?= (isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id)?  'selected' : ''?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" value="<?= (isset($pro) && is_object($pro))?  $pro->precio : ''?>">

        <label for="stock">Stock:</label>
        <input type="number" min="1" name="stock" value="<?= (isset($pro) && is_object($pro))?  $pro->stock : ''?>">

        <label for="oferta">Descuento (porcentaje):</label>
        <input type="number" min="0" name="oferta" value="<?= (isset($pro) && is_object($pro))?  $pro->oferta : ''?>">
        
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)):  ?>
        <div class="m-5auto">
            <img src="<?=base_url.$pro->imagen?>" alt="" class="img-small p-30">
        </div>
        <?php  endif; ?>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen">


        <input type="submit" value="Guardar">

    </form>
</div>
</div> <!---   content -->
</div> <!---   container -->