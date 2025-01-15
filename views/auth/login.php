<div class="auth">
    <h2 class="auth__heading"><?php  echo $titulo; ?></h2>
    <p class="auth__texto">Inicia sesión en DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php' ;?>

    <form action="/login" class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input class="formulario__input" type="email" name="email" id="email" placeholder="Tu Email">
        </div>
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input class="formulario__input" type="password" name="password" id="password" placeholder="Tu password">
        </div>

        <input type="submit" value="Iniciar Sesión" class="formulario__submit formulario__submit--registrar">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">Crea tu Cuenta en DevWebCamp</a>
        <a href="/olvide" class="acciones__enlace">Olvidaste tu Password</a>
    </div>
</div>