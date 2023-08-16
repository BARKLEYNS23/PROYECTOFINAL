<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Estilos CSS -->
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <link rel="stylesheet" type="text/css" href="./css/menu.css">
</head>

<body>

    <nav>
        <ul class="menu">
            <li class="logo">
                <a href="index.php">
                    <img src="./img/logo.png">
                </a>
            </li>
            <li>
                <a href="modulos/estudiantes/estudiantes.php">
                    Estudiantes
                </a>
            </li>
            <li>
                <a href="modulos/materias/materias.php">
                    Materias
                </a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <header>
            <h1>
                BASES DE DATOS GRUPO 6
            </h1>

            <h2>
                Materias Inscritas:
                <?php
                require_once('./config/DBConect.php');

                $db = Database::getInstance();
                $materias = $db->DatosMaterias(); // Obtener las materias

                $nombreMaterias = array(); // Array para almacenar los nombres de las materias

                foreach ($materias as $materia) {
                    $nombreMaterias[] = $materia['nombre']; // Agregar el nombre de la materia al array
                }

                echo implode(' - ', $nombreMaterias);
                ?>
            </h2>
        </header>

        <section class="section-flex">
            <?php
            $estudiantes = $db->DatosEstudiantes();

            foreach ($estudiantes as $estudiante) {
                $id = $estudiante['id'];
                $identificacion = $estudiante['identificacion'];
                $nombres = $estudiante['nombres'];
                $apellidos = $estudiante['apellidos'];
                $email = $estudiante['email'];
                $telefono = $estudiante['telefono'];
                // ... Obtén los demás campos necesarios
            ?>
                <article class="character">
                    <header>
                        <h2><?php echo $nombres . ' ' . $apellidos; ?></h2>
                    </header>
                    <img src="./img/Registrado.png">
                    <div class="info-character">
                        <p><b>Identificación:</b> <?php echo $identificacion; ?></p>
                        <p><b>Email:</b> <?php echo $email; ?></p>
                        <p><b>Teléfono:</b> <?php echo $telefono; ?></p>
                        <!-- Agrega aquí las etiquetas HTML para mostrar los demás campos necesarios -->
                    </div>
                </article>
            <?php
            }
            ?>
        </section>
    </div>

    <footer>
        <p> Creado por Grupo #6 del Pregrado de Informatica 2023 - udecatalunya</p>
    </footer>

    <script src="./js/javascript.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>