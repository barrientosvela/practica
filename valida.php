<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Declara variables necesarias
    $errores = $rutaFoto = $extrasCadena = "";

    // Obtiene los valores del formulario
    $tipo = $_REQUEST['tipo'];
    $zona = $_REQUEST['zona'];
    $direccion = $_REQUEST['direccion'];
    $dormitorios = $_REQUEST['dormitorios'];
    $precio = $_REQUEST['precio'];
    $tamano = $_REQUEST['metros'];
    // Si ha introducido foto y no es mayor que el tamaño especificado la mueve a una carpeta del proyecto 
    if (!empty($_FILES['foto']['tmp_name']) && $_FILES['foto']['size'] <= 100000) {
        $foto = $_FILES['foto']['name'];
        $rutaFoto = "images/" . $foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $rutaFoto);
    }
    // Si ha seleccionado más de un extra los convierte a un string con los valores seleccionados
    if (!empty($_REQUEST['extras'])) {
        if (is_array($_REQUEST['extras']))
            $extras = $_REQUEST['extras'];
        foreach ($extras as $extra)
            $extrasCadena .= $extra . " ";
    }
    $observaciones = $_REQUEST['observaciones'];

    // Comprueba valores correctos
    if (empty($direccion)) {
        $errores = $errores . "<li>Se requiere la dirección de la vivienda\n</li>";
    }
    if (!is_numeric($precio) || $precio < 0) {
        $errores = $errores . "<li>El precio debe ser un valor numérico mayor a 0\n</li>";
    }
    if (!is_numeric($tamano) || $tamano < 0) {
        $errores = $errores . "<li>El tamaño debe ser un valor numérico mayor a 0\n</li>";
    }
    if ($_FILES['foto']['size'] >= 100000) {
        $errores = $errores . "<li>El tamaño de la foto es mayor de 100kb\n</li>";
    }
    // Si hay errores los muestra sino muestra los datos introducidos
    if ($errores == "") {
        print("<p>Vivienda introducida correctamente</p>");
        print("<p>Estos son los datos introducidos:</p>\n");
        print("<ul>\n");
        print("   <li>Tipo: $tipo\n");
        print("   <li>Zona: $zona\n");
        print("   <li>Dirección: $direccion\n");
        print("   <li>Número de dormitorios: $dormitorios\n");
        print("   <li>Precio: $precio &euro;\n");
        print("   <li>Tamaño: $tamano m<sup>2</sup>\n");
        print("   <li>Extras: ");
        if (!empty($extras)) {
            print($extrasCadena);
        }
        print("   <li>Observaciones: $observaciones\n");
        if (!empty($_FILES['foto']['tmp_name'])) {
            print("   <li><img src='images/" . $foto . "' height=\"10%\" width=\"10%\" />");
        }
        print("</ul>\n");
        // Conecta con la BD
        $conect = mysqli_connect("localhost", "root", "", "viviendas");
        if (mysqli_connect_errno()) {
            echo "Fallo al conectar con la base de datos" . mysqli_connect_error();
            exit;
        } else {
            // Inserta los datos
            mysqli_query($conect, "INSERT INTO tabla_viviendas (id, tipo, zona, direccion, dormitorios, precio, tamano, extras, foto, observaciones)
            VALUES ('','$tipo', '$zona', '$direccion', '$dormitorios','$precio','$tamano','$extrasCadena','$rutaFoto','$observaciones')");
        }
        // Enlace para enviar otro formulario 
        print("<p><a href='principal.html'><button>Insertar otra vivienda</button></a></p>");
        // Enlace a pagina para buscar datos introducidos en la BD
        print("<p><a href='consulta.php'><button>Buscar vivienda</button></a></p>");
    } else {
        // Muestra errores
        print("<p>No se ha podido realizar la inserción debido a los siguientes errores:</p>\n");
        print("<ul>");
        print($errores);
        print("</ul>");
        // Enlace para volver al formulario con los datos introducidos anteriormente
        print("<p><a href='javascript:history.back()'>Volver</a></p>\n");
    }
    ?>
</body>

</html>