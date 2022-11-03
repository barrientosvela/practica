<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No vendo una chapa</title>
</head>

<body>
    <?php
    // Declara la variable $errores para poder mostrar los errores o validar el envio si esta vacia
    $errores = "";
    $extras = null;
    // Obtiene los valores del formulario
    $tipo = $_REQUEST['tipo'];
    $zona = $_REQUEST['zona'];
    $direccion = $_REQUEST['direccion'];
    $dormitorios = $_REQUEST['dormitorios'];
    $precio = $_REQUEST['precio'];
    $tamano = $_REQUEST['metros'];
    copy($_FILES['foto']['tmp_name'],$_FILES['foto']['name']);
    $foto = $_FILES['foto']['name'];
    $extras = $_REQUEST['extras'];
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
        foreach ($extras as $extra)
        print($extra . " ");

     print("\n");
        print("   <li>Observaciones: $observaciones\n");
        print("   <li><img src=\"$foto\">");
        print("</ul>\n");
        print("<p><a href='principal.html'>Insertar otra vivienda</a></p>");
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