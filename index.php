<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DB</title>
</head>
<body>
    <!-- Incluimos el arcibo PHP que maneja la lógica de los personajes -->
    <?php
        include("code.php");
    ?>
    <!-- Titulo -->
    <h1 class="title">Dragon Ball</h1>
    <!-- Indice actual y total de los personajes -->
    <?php echo $selected."/".$all;?>
    <!-- Contenedor principal para el personaje y los botones de navegación -->
    <div class="container">
        <!-- Formulario con el metodo post para enviar datos al servidor -->
        <form method="post">
            <aside>
                <button type="submit" name="accion" value="anterior">Anterior</button>
            </aside>  
            <!-- Seccion con el nombre e imagen del personaje -->
            <section>
                <p class="name">
                    <?php
                        echo($name);
                    ?>
                </p>
                <br>
                <img class="img-character" src=<?php echo $img?> alt="" srcset="">
            </section>

            <aside>
                <button type="submit" name="accion" value="siguiente">Siguiente</button>
            </aside>
        </form>
    </div>
    <!-- Contenedor con la descripción del personaje -->
    <div>
        <p class="description">
            <?php
                echo($description);
            ?>
        </p>
    </div>


</body>
</html>