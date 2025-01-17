<h2 class="dashboard__heading"><?php echo $titulo;?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h2 class="bloque__heading">Últimos Registros</h2>

            <?php foreach($registros as $registro){?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido;?>
                    </p>
                </div>


            <?php }?>
        </div>
        <div class="bloque">
            <h2 class="bloque__heading">Ingresos Totales</h2>

            <p class="bloque__texto--cantidad"><?php echo $ingresos;?></p> 
        </div>
        <div class="bloque">
            <h2 class="bloque__heading">Eventos con menos lugares Disponibles</h2>

            <?php foreach ($menosLugares as $evento){?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $evento->nombre . " - " . $evento->disponibles . " Disponibles";?>
                    </p>
                </div>
            <?php }?>
        </div>
        <div class="bloque">
            <h2 class="bloque__heading">Eventos con mas lugares Disponibles</h2>

            <?php foreach ($masLugares as $evento){?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $evento->nombre . " - " . $evento->disponibles . " Disponibles";?>
                    </p>
                </div>
            <?php }?>
        </div>
    </div>
</main>