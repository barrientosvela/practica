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
    // Declara la variable $errores para poder mostrar los errores o validar el envio si esta vacia
    $errores = "";
    $extrasCadena = "";    
    // Obtiene los valores del formulario
    $tipo = $_REQUEST['tipo'];
    $zona = $_REQUEST['zona'];
    $direccion = $_REQUEST['direccion'];
    $dormitorios = $_REQUEST['dormitorios'];
    $precio = $_REQUEST['precio'];
    $tamano = $_REQUEST['metros'];
    if (!empty($_FILES['foto']['tmp_name']) && $_FILES['foto']['size'] <= 100000) {
        copy($_FILES['foto']['tmp_name'],$_FILES['foto']['name']);
        $foto = $_FILES['foto']['name'];
        $rutaFoto = "C:/xampp/htdocs/practica/images/".$foto;
    }
    if (!empty($_REQUEST['extras'])) {
        if (is_array($_REQUEST['extras']))
        $extras = $_REQUEST['extras'];
        //oreach 
    }
    $observaciones = $_REQUEST['observaciones'];

    // Comprueba valores correctos
    if (empty($direccion)) {
        $errores = $errores . "<li>Se requiere la dirección de la vivienda\n</li>";
    }
    if (!is_numeric($precio)) {
        $errores = $errores . "<li>El precio debe ser un valor numérico\n</li>";
    }
    if (!is_numeric($tamano)) {
        $errores = $errores . "<li>El tamaño debe ser un valor numérico\n</li>";
    }
    if ($_FILES['foto']['size'] >= 100000) {
        $errores = $errores . "<li>El tamaño de la foto es mayor de 100kb\n</li>";
    }
    // Si hay errores los muestra sino muestra los datos introducidos
    if ($errores == "") {
        print("<p>Estos son los datos introducidos:</p>\n");
        print("<ul>\n");
        print("   <li>Tipo: $tipo\n");
        print("   <li>Zona: $zona\n");
        print("   <li>Dirección: $direccion\n");
        print("   <li>Número de dormitorios: $dormitorios\n");
        print("   <li>Precio: $precio &euro;\n");
        print("   <li>Tamaño: $tamano m<sup>2</sup>\n");
        print("   <li>Extras: ");
        if (!empty($extras)){
            foreach ($extras as $extra)
                print($extra . " ");
    
            print("\n");
        }
        print("   <li>Observaciones: $observaciones\n");
        if (!empty($_FILES['foto']['tmp_name'])) {
            print("   <li><img src=\"$foto\">");
        }
        print("</ul>\n");
        $conect = mysqli_connect("localhost", "root", "", "viviendas");
        if (mysqli_connect_errno()) {
            echo "Fallo" . mysqli_connect_error();
            exit;
        } else {
            mysqli_query($conect, "INSERT INTO tabla_viviendas (id, tipo, zona, direccion, dormitorios, precio, tamano, extras, foto, observaciones)
            VALUES ('','$tipo', '$zona', '$direccion', '$dormitorios','$precio','$tamano','$extras','$rutaFoto','$observaciones')");
        }
        print("<p><a href='principal.html'><button>Insertar otra vivienda</button></a></p>");
        print("<p><a href='consulta.php'><button>Buscar vivienda</button></a></p>");
    } else {
        print("<p>No se ha podido realizar la inserción debido a los siguientes errores:</p>\n");
        print("<ul>");
        print($errores);
        print("</ul>");
        print("<p><a href='javascript:history.back()'>Volver</a></p>\n");
    }
    ?>
</body>

</html>