<h1>Registrate</h1>
<?php  if(isset($_SESSION['register']) && $_SESSION['register']): ?>
    <strong class="alert alert-success">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && !$_SESSION['register']):  ?>
    <strong class="alert alert-warning">Registro fallido, comprueba los datos que introduciste</strong>
<?php endif;  ?>
<?php helpers::deleteSession('register');  ?>

<form action="<?=base_url?>/usuarios/save" method="POST">
    <label>
        <p>Nombre:</p>
        <input type="text" name="nombre" required>
    </label>
    <label>
        <p>Apellidos:</p>
        <input type="text" name="apellido" required>
    </label>
    <label>
        <p>Email:</p>
        <input type="email" name="email" required>
    </label>
    <label>
        <p>Contraseña</p>
        <input type="password" name="pass" required>
    </label>
    <input type="submit" value="Registrame">
</form>
</div> <!---   content -->
</div> <!---   container -->