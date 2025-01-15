<div class="auth">
    <h2 class="auth__heading"><?php  echo $titulo; ?></h2>
    <p class="auth__texto">Registrate en DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php';?>
    
    <form action="/registro" class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input class="formulario__input" type="text" name="nombre" id="nombre" placeholder="Tu Nombre" value = "<?php echo $usuario->nombre; ?>">
        </div>
        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input class="formulario__input" type="text" name="apellido" id="apellido" placeholder="Tu Apellido" value = "<?php echo $usuario->apellido; ?>">
        </div>
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input class="formulario__input" type="email" name="email" id="email" placeholder="Tu Email" value = "<?php echo $usuario->email; ?>">
        </div>
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input class="formulario__input" type="password" name="password" id="password" placeholder="Tu password">
        </div>
        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Confirmar Password</label>
            <input class="formulario__input" type="password" name="password2" id="password2" placeholder="Confirmar password">
        </div>

        <input type="submit" value="Crear Cuenta" class="formulario__submit formulario__submit--registrar">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">Iniciar sesión</a>
        <a href="/olvide" class="acciones__enlace">Olvidaste tu Password</a>
    </div>
</div>