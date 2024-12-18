<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="formulario__input" placeholder="Nombre Ponente" value="<?php echo $ponente->nombre ?? '';?>">
    </div>

    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="formulario__input" placeholder="Apellido Ponente" value="<?php echo $ponente->apellido ?? '';?>">
    </div>
    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" class="formulario__input" placeholder="Ciudad Ponente" value="<?php echo $ponente->ciudad ?? '';?>">
    </div>
    <div class="formulario__campo">
        <label for="pais" class="formulario__label">Pais</label>
        <input type="text" name="pais" id="pais" class="formulario__input" placeholder="Pais Ponente" value="<?php echo $ponente->pais ?? '';?>">
    </div>
    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">imagen</label>
        <input type="file" name="imagen" id="imagen" class="formulario__input formulario__input--file">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>
    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Areas de Experiencia (separadas por coma)</label>
        <input type="text" id="tags_input" class="formulario__input" placeholder="Ej. Node.js, PHP, CSS, Laravel, UX/UI" >
    </div>
    <div id="tags" class="formulario__listado"></div>
    <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? '';?>">
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input type="text" name="redes[facebook]" class="formulario__input--sociales" placeholder="Facebook" value="<?php echo $ponente->facebook ?? '';?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="text" name="redes[twitter]" class="formulario__input--sociales" placeholder="Twitter" value="<?php echo $ponente->twitter ?? '';?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="text" name="redes[youtube]" class="formulario__input--sociales" placeholder="YouTube" value="<?php echo $ponente->youtube ?? '';?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="text" name="redes[instagram]" class="formulario__input--sociales" placeholder="Instagram" value="<?php echo $ponente->instagram ?? '';?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="text" name="redes[tiktok]" class="formulario__input--sociales" placeholder="Tiktok" value="<?php echo $ponente->tiktok ?? '';?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="text" name="redes[github]" class="formulario__input--sociales" placeholder="GitHub" value="<?php echo $ponente->github ?? '';?>">
        </div>
    </div>
</fieldset>