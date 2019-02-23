
<h1>Editar categoria</h1>
<form action="<?=base_url?>categorias/edit" method="POST">
    <label for="nombre">Edita el nombre:</label>
    <input type="text" placeholder="..." name="nombre" required value="<?=$data->nombre;?>">
    <input type="hidden" value="<?=$data->id?>" name="id">
    <input type="submit" value="Guardar">
</form>
</div> <!---   content -->
</div> <!---   container -->