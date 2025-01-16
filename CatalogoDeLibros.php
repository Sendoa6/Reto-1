<?php
session_start();
include 'Conexiones.php';
$foto_perfil = 'ruta/a/imagen/por/defecto.jpg';

if (isset($_SESSION['ID_usuario'])) {
    $ID_usuario = $_SESSION['ID_usuario'];

    $sql = "SELECT foto_perfil FROM usuarios WHERE ID_usuario = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $ID_usuario);
        $stmt->execute();
        $stmt->bind_result($foto_perfil);

        if ($stmt->fetch()) {
        } else {
            $foto_perfil = 'ruta/a/imagen/por/defecto.jpg';
        }

        $stmt->close();
    } else {
        $foto_perfil = 'ruta/a/imagen/por/defecto.jpg';
    }

    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media\muskizlogo.png" type="image/x-icon">
    <title>Catalogo</title>
    <link rel="stylesheet" href="CatalogoDeLibros.css">
</head>
<body>
    <!--Encabezado-->
    <header>
        <nav>
            <!--Logo Muskiz-->
          <img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgwIRrFipHhzib2ULMT65_BOWt4EEIxC5SIg&s" alt="Logo ayuntamiento muskiz" height="85" width="85">
          <!--Citar el nombre de la página-->
          <ul id="uno">
            <li>Biblioteca Municipal de Muskiz</li>
            <li>Muskizko Udal Liburutegia</li>
          </ul>
        </nav>
        <!--Todos los apartados de la página-->
        <nav>
          <a class="ventana" href="index.php"> Inicio</a>
          <a class="ventana" href="Conocenos.php"> Conocenos</a>
          <a class="ventanaactual" href="CatalogoDeLibros.html"> Catalogo de Libros</a>
          <a class="ventana" href="Prestamos.php"> Prestamos</a>
          <a class="ventana" href="Formulario1.php"> Iniciar Sesion</a>
          <form action="bienvenida.php" method="post">
        <a class="perfil" href="bienvenida.php">
          <img class="imgperfil" src="<?php echo htmlspecialchars($foto_perfil); ?>" alt="Foto de perfil">
        </a>
      </form>
        </nav>
    </header>
    <br>
    <br>
    <!--<Titulo del apartado de catálogo de libros-->
    <h1>Nuestro catálogo</h1>
    <br>
    <br>
    <!--div para crear las pestañas que enseñaran y ocultarán los libros de cada categoría-->
    <div class="tabs">
        <!--Pestaña para ver los libros más populares-->
        <h2>Más populares</h2>
        <input type="radio" id="tab1" name="tab">
        <label for="tab1" class="tab-label">Ver más populares</label>
        <!--Aquí se muestra el contenido de los libros más populares-->
        <div class="tab-content" id="content1">
            <ul>
                <li><ul><b>Tan poca vida</b>
                    <li>Autor: Hanya Yanagihara</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"><img src="https://imagessl8.casadellibro.com/a/l/s7/78/9788426403278.webp" title="Tan poca vida" alt="Tan poca vida" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Los siete maridos de Evelynn Hugo</b>
                    <li>Autor: Taylor Jenkins Reid</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl5.casadellibro.com/a/l/s7/75/9788416517275.webp" title="Los siete maridos de Evelynn Hugo" alt="Los siete maridos de Evelynn Hugo" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Adiós a la inflamación</b>
                    <li>Autor: Sandra Moñino</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl1.casadellibro.com/a/l/s7/81/9788410021181.webp" title="Adiós a la inflamación" alt="Adios a la inflamación" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Cómo hacer que te pasen cosas buenas</b>
                    <li>Autor: Marian Rojas</li>
                    <li>Disponible: No</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl2.casadellibro.com/a/l/s7/02/9788467053302.webp" title="Cómo hacer que te pasen cosas buenas" alt="Cómo hacer que te pasen cosas buenas" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Alas de sangre</b>
                    <li>Autor: Rebeca Yarros</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl0.casadellibro.com/a/l/s7/90/9788408279990.webp" title="Alas de sangre" alt="Alas de sangre" width="40%"></li>
            </ul>
        </div>
        <br>
        <br>
        <!--Pestaña para ver los libros nuevos-->
        <h2>Nuevos</h2>
        <input type="radio" id="tab2" name="tab">
        <label for="tab2" class="tab-label">Ver nuevos</label>
         <!--Contenido de los libros nuevos-->
        <div class="tab-content" id="content2">
            <ul>
                <li><ul><b>Me piden que regrese</b>
                    <li>Autor: Andrés Triapello</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl2.casadellibro.com/a/l/s7/52/9788423365852.webp" title="Me piden que regrese" alt="Me piden que regrese" width="40%"></li>
                <br>
                <br>
                <li><ul><b>El buen vasallo</b>
                    <li>Autor: Francisco Narla</li>
                    <li>Disponible: No</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl7.casadellibro.com/a/l/s7/47/9788425368547.webp" title="El buen vasallo" alt="El buen vasallo" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Intermezzo</b>
                    <li>Autor: Sally Rooney</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl0.casadellibro.com/a/l/s7/30/9788439744030.webp" title="Intermezzo" alt="Intermezzo" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Cinco armas rotas</b>
                    <li>Autor: Mai Corland</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl4.casadellibro.com/a/l/s7/24/9788419988324.webp" title="Cinco armas rotas" alt="Cinco armas rotas" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Una historia divertida</b>
                    <li>Autor: Emily Henry</li>
                    <li>Disponible: No</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl0.casadellibro.com/a/l/s7/50/9788419131850.webp" title="Una historia divertida" alt="Una historia divertida" width="40%"></li>
            </ul>
        </div>
        <br>
        <br>
        <!--Pestaña para ver los libros infantiles-->
        <h2>Infantiles</h2>
        <input type="radio" id="tab3" name="tab">
        <label for="tab3" class="tab-label">Ver infantiles</label>
        <!--Contenido de los libros infantiles-->
        <div class="tab-content" id="content3">
            <ul>
                <li><ul><b>Robot Salvaje</b>
                    <li>Autor: Peter Brown</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl2.casadellibro.com/a/l/s7/92/9788408216292.webp" title="Robot Salvaje" alt="Robot Salvaje" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Diario de Greg 19 - En su salsa</b>
                    <li>Autor: Jeff Kiney</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl0.casadellibro.com/a/l/s7/60/9788427242760.webp" title="Diario de Greg 19" alt="Diario de Greg 19" width="40%"></li>
                <br>
                <br>
                <li><ul><b>El gruñón</b>
                    <li>Autor: Josephine Mark</li>
                    <li>Disponible: No</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl6.casadellibro.com/a/l/s7/46/9788419670946.webp" title="El gruñón" alt="El gruñon" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Cómic los futbolísimos 3</b>
                    <li>Autor: Roberto Santiago</li>
                    <li>Disponible: No</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl2.casadellibro.com/a/l/s7/82/9788411827782.webp" title="Cómic Los futbolisimos 3" alt="Los futbolisimos 3" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Patas 2</b>
                    <li>Autor: Nathan FairBairn</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl4.casadellibro.com/a/l/s7/14/9788410260214.webp" title="Patas 2" alt="Patas 2" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Los orígenes del reino de la fantasía</b>
                    <li>Autor: Geronimo Stilton</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl9.casadellibro.com/a/l/s7/89/9788408281689.webp" title="Los origenes del reino de la fantasia" alt="Los origenes del reino de la fantasia" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Las aventuras del capitán calconcillos</b>
                    <li>Autor: Dav Pilkey</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl7.casadellibro.com/a/l/s7/37/9788467577037.webp" title="Capitan calconcillos" alt="Capitan calconcillos" width="40%"></li>
            </ul>
        </div>
        <br>
        <br>
        <!--Pestaña para ver los libros de idiomas que no sean castellano-->
        <h2>Inglés</h2>
        <input type="radio" id="tab4" name="tab">
        <label for="tab4" class="tab-label">Ver inglés</label>
        <!--Contenido de los libros de idiomas-->
        <div class="tab-content" id="content4">
            <ul>
                <li><ul><b>The taoiseach</b>
                    <li>Autor: Iain Dale</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl6.casadellibro.com/a/l/s7/56/9781800754256.webp" title="The taoiseach" alt="The taoiseach" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Healthy calling </b>
                    <li>Autor: Arianna Molloy</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl6.casadellibro.com/a/l/s7/16/9781514008416.webp" title="Healthy Calling" alt="Healthy Calling" width="40%"></li>
                <br>
                <br>
                <li><ul><b>The last sunset in the west</b>
                    <li>Autor:cNatalie Sanders</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl5.casadellibro.com/a/l/s7/15/9781788857215.webp" title="The last sunset in the west" alt="The last sunset in the west" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Room on the broom</b>
                    <li>Autor: Julia Donaldson</li>
                    <li>Disponible: No</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl2.casadellibro.com/a/l/s7/22/9780142501122.webp" title="Room on the broom" alt="Room on the broom" width="40%"></li>
                <br>
                <br>
                <li><ul><b>A taste of the moon</b>
                    <li>Autor: Michael Grejniech</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl1.casadellibro.com/a/l/s7/61/9788484647461.webp" title="A taste of the moon" alt="A taste of the moon" width="40%"></li>
            </ul>
        </div>
        <br>
        <br>
        <!--Pestaña para ver los libros de biografías-->
        <h2>Biografías</h2>
        <input type="radio" id="tab5" name="tab">
        <label for="tab5" class="tab-label">Ver biografías</label>
        <!--Contenido de biografías-->
        <div class="tab-content" id="content5">
            <ul>
                <li><ul><b>Kamala Harris</b>
                    <li>Autor: Maria Ramirez</li>
                    <li>Disponible: No</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl2.casadellibro.com/a/l/s7/42/9788410433342.webp" title="Kamala Harris" alt="Kamala Harris" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Justiniano</b>
                    <li>Autor: Peter Sarris</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl0.casadellibro.com/a/l/s7/00/9788430626700.webp" title="Justiniano" alt="Justiniano" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Maria Antonieta</b>
                    <li>Autor: Stefan Zweig</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl1.casadellibro.com/a/l/s7/91/9788415277491.webp" title="Maria Antonieta" alt="Maria Antonieta" width="40%"></li>
                <br>
                <br>
                <li><ul><b>En el piso de abajo</b>
                    <li>Autor: Margaret Powell</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl1.casadellibro.com/a/l/s7/81/9788484288381.webp" title="En el piso de abajo" alt="En el piso de abajo" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Alejandro Magno: El conquistador del mundo</b>
                    <li>Autor: Robin Lane Fox</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl5.casadellibro.com/a/l/s7/55/9788496834255.webp" title="Alejandro Magno" alt="Alejandro Magno" width="40%"></li>
            </ul>
        </div>
        <br>
        <br>
        <!--Pestaña para ver los libros de novelas-->
        <h2>Novelas</h2>
        <input type="radio" id="tab6" name="tab">
        <label for="tab6" class="tab-label">Ver novelas</label>
        <!--Contenido de las novelas-->
        <div class="tab-content" id="content6">
            <ul>
                <li><ul><b>El imperio final</b>
                    <li>Autor: Brandon Sanderson</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl4.casadellibro.com/a/l/s7/94/9788413143194.webp" title="El imperio final" alt="El imperio Final" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Blackwater I. La riada</b>
                    <li>Autor: Michael Mcdowell</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl2.casadellibro.com/a/l/s7/92/9788419654892.webp" title="Blackwater I" alt="Blackwater I" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Carrie</b>
                    <li>Autor: Stephen King</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl7.casadellibro.com/a/l/s7/77/9788401035777.webp" title="Carrie" alt="Carrie" width="40%"></li>
                <br>
                <br>
                <li><ul><b>El arte de ser nosotros</b>
                    <li>Autor: Imma Rubiales</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl6.casadellibro.com/a/l/s7/56/9788408292456.webp" title="El arte de ser nosotros" alt="El arte de ser nosotros" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Corona de medianoche</b>
                    <li>Autor: Sarah J.Maas</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl3.casadellibro.com/a/l/s7/93/9788418359293.webp" title="Corona de medianoche" alt="Corona de medianoche" width="40%"></li>
                <br>
                <br>
                <li><ul><b>Choque de reyes(Canción de hielo y fuego 2)</b>
                    <li>Autor: George R.R. Martin</li>
                    <li>Disponible: Sí</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl1.casadellibro.com/a/l/s7/31/9788401032431.webp" alt="Choque de reyes" title="Choque de reyes" width="40%"></li>
                <br>
                <br>
                <li><ul><b>El señor de los anillos</b>
                    <li>Autor: J. R.R. Tolkien</li>
                    <li>Disponible: Sñi</li>
                </ul></li>
                <li class="sinestilo"></li><img src="https://imagessl7.casadellibro.com/a/l/s7/57/9788445013557.webp" alt="El señor de los anillos" title="El señor de los anillos" width="40%"></li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <footer>
        <p>&copy; 2024 Muskizko Liburutegia. Todos los derechos reservados.</p>
        <p>
          <a href="https://facebook.com" target="_blank">Facebook</a> |
          <a href="https://twitter.com" target="_blank">Twitter</a> |
          <a href="https://instagram.com" target="_blank">Instagram</a>
        </p>
        <p>
          <a href="https://maps.app.goo.gl/edZ15iYRnLJY2kUx6" target="_blank">📍🌍Localización y horarios</a>|
          <a href="mailto:contacto@misitioweb.com">Contáctanos</a>
        </p>
      </footer>
</body>
</html>