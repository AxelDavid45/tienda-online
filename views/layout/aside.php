<aside id="lateral">
    <div id="login" class="block-aside">
        <?php if (!isset($_SESSION['user_data'])): ?>
            <h3 class="tit-block-aside">Inicia sesión</h3>
            <form action="<?= base_url ?>usuarios/login" method="POST">
                <label>
                    <p>Email:</p>
                    <input type="text" name="email" required>
                </label>
                <label>
                    <p>Contraseña:</p>
                    <input type="password" name="password" required>
                </label>
                <a href="<?=base_url?>usuarios/registro">No tengo una cuenta</a>
                <input type="submit" value="Enviar">
            </form>

        <?php else: ?>
        <h3 class="tit-block-aside"><?= $_SESSION['user_data']->nombre ?> <?= $_SESSION['user_data']->apellidos ?></h3>
        <ul class="gestion">

            <?php if (isset($_SESSION['admin'])): ?>
                <li>
                    <i class="fas fa-sliders-h"></i>
                    <a href="<?=base_url?>productos/gestion">Gestionar productos</a>
                </li>
                <li>
                    <i class="fas fa-sliders-h"></i>
                    <a href="#">Gestionar pedidos</a>
                </li>
                <li>
                    <i class="fas fa-align-justify"></i>
                    <a href="<?= base_url?>/categorias/index">Gestionar categorias</a>
                </li>
            <?php else: ?>
                <li>
                    <i class="fas fa-cubes"></i>
                    <a href="#">Mis pedidos</a>
                </li>
            <?php endif; ?>
            <li>
                <i class="fas fa-sign-out-alt"></i>
                <a href="<?= base_url ?>usuarios/logout">Cerrar sesión</a>
            </li>
            <?php endif; ?>


        </ul>
    </div>
</aside>
<!--  CONTENIDO PRINCIPAL --->

<div id="central">
