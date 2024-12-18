<div class="auth">
    <h2 class="auth__heading"><?php  echo $titulo; ?></h2>
    <p class="auth__texto">Recupera tu acceso a DevWebCamp</p>


    <?php require_once __DIR__ . '/../templates/alertas.php';?>
    <form action="/olvide" class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input class="formulario__input" type="email" name="email" id="email" placeholder="Tu Email">
        </div>

        <input type="submit" value="Enviar Instrucciones" class="formulario__submit">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">Iniciar Sesión</a>
        <a href="/registro" class="acciones__enlace">Crea tu Cuenta en DevWebCamp</a>
    </div>
</div>