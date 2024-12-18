<div class="auth">
    <h2 class="auth__heading"><?php  echo $titulo; ?></h2>
    <p class="auth__texto">Ingresa tu nuevo password</p>


    <?php require_once __DIR__ . '/../templates/alertas.php';?>

    <?php if($token_valido){ ?>
        <form class="formulario" method="POST">
            <div class="formulario__campo">
                <label for="password" class="formulario__label">Nuevo Password</label>
                <input class="formulario__input" type="password" name="password" id="password" placeholder="Tu Password">
            </div>

            <input type="submit" value="Guardar Password" class="formulario__submit">
        </form>
    <?php }?>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">Iniciar Sesión</a>
        <a href="/registro" class="acciones__enlace">Crea tu Cuenta en DevWebCamp</a>
    </div>
</div>