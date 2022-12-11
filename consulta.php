<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Viviendas</title>
</head>

<body>
    <!-- Barra de busqueda -->
    <form action="#" method="post">
        <p><span>Tipo:</span>
            <select class="campo" name="tipo">
                <option value="Cualquiera">Cualquiera</option>
                <option value="Piso">Piso</option>
                <option value="Adosado">Adosado</option>
                <option value="Chalet">Chalet</option>
                <option value="Casa">Casa</option>
            </select>
        </p>
        <p><span>Zona:</span>
            <select class="campo" name="zona">
                <option value="Cualquiera">Cualquiera</option>
                <option value="Centro">Centro</option>
                <option value="Nervion">Nervión</option>
                <option value="Triana">Triana</option>
                <option value="Aljarafe">Aljarafe</option>
                <option value="Macarena">Macarena</option>
            </select>
        </p>
        <p><span>Número de dormitorios:</span>
            <input class="campo" type="radio" name="dormitorios" value="1" require>1</input>
            <input class="campo" type="radio" name="dormitorios" value="2">2</input>
            <input class="campo" type="radio" name="dormitorios" value="3">3</input>
            <input class="campo" type="radio" name="dormitorios" value="4">4</input>
            <input class="campo" type="radio" name="dormitorios" value="5">5</input>
        </p>
        <p><span>*Extras:</span>
            <input class="campo" type="checkbox" name="extras[]" value="Piscina">Piscina</input>
            <input class="campo" type="checkbox" name="extras[]" value="Jardin">Jardín</input>
            <input class="campo" type="checkbox" name="extras[]" value="Garage">Garage</input>
        </p>
        <p>
            <span>*Mínimo:</span>
            <input class="precio" type="text" name="precioMin" size="4"> &euro; &emsp;</input>
            <span>*Máximo:</span>
            <input class="precio" type="text" name="precioMax" size="4"> &euro;</input>
        </p>
        <input class="campo" type="checkbox" name="todo" value="todo">Mostrar todo</input>
        <input class="btn-buscar" type="submit" value="Buscar" name="buscar">
    </form>
    <p><a href='principal.html'><button>Insertar vivienda</button></a></p>
    <?php
    // Declara variables necesarias
    $resultado = $extrasCadena = "";
    // Cuando pulsa el boton de buscar recoje los datos
    if (isset($_REQUEST['buscar'])) {
        $tipo = $_REQUEST['tipo'];
        $zona = $_REQUEST['zona'];
        if (isset($_REQUEST['dormitorios'])) {
            $dormitorios = $_REQUEST['dormitorios'];
        } else {
            $dormitorios = 0;
        }
        // Si ha seleccionado más de un extra los convierte a un string con los valores seleccionados
        // if (empty($_REQUEST['extras'])) {
        //     if (is_array($_REQUEST['extras']))
        //         $extras = $_REQUEST['extras'];
        //     foreach ($extras as $extra)
        //         $extrasCadena .= $extra . " ";
        // }

        // Consultas
        $consultaTipo = "tipo = '$tipo'";
        $consultaZona = "zona = '$zona'";
        $consultaDormitorios = "dormitorios = '$dormitorios'";
        // $consultaExtras = "extras LIKE '%$extrasCadena%'";
        // $consultaPrecio = "precio <= '$precioMin' AND precio >= '$precioMax'";

        // Conecta a la BD
        $conect = mysqli_connect("localhost", "root", "", "viviendas");
        if (mysqli_connect_errno()) {
            echo "Fallo al conectar con la base de datos" . mysqli_connect_error();
            exit;
        } else {
            // Envia consulta
            if (isset($_REQUEST['todo'])) {
                $resultado = mysqli_query($conect, "SELECT * FROM tabla_viviendas");
            } else {
                if ($tipo !== 'Cualquiera' && $zona !== 'Cualquiera' && $dormitorios !== 0) {
                    $resultado = mysqli_query($conect, "SELECT * FROM tabla_viviendas WHERE $consultaTipo AND $consultaZona AND $consultaDormitorios");
                } else {
                    if ($tipo !== 'Cualquiera') {
                        $resultado = mysqli_query($conect, "SELECT * FROM tabla_viviendas WHERE $consultaTipo");
                    } else {
                        if ($zona !== 'Cualquiera') {
                            $resultado = mysqli_query($conect, "SELECT * FROM tabla_viviendas WHERE $consultaZona");
                        } else {
                            if ($consultaDormitorios !== 0) {
                                $resultado = mysqli_query($conect, "SELECT * FROM tabla_viviendas WHERE $consultaDormitorios");
                            }
                        }
                    }
                }
            }
        }
    ?>
        <!-- Muestra tabla con resultados -->
        <table>
            <tr>
                <th>Tipo</th>
                <th>Zona</th>
                <th>Direccion</th>
                <th>Dormitorios</th>
                <th>Precio</th>
                <th>Tamano</th>
                <th>Extras</th>
                <th>Foto</th>
                <th>Observaciones</th>
            </tr>
            <?php
            // Mientras haya resultado de la consulta muestra otra fila en la tabla
            while ($arrayCunsulta = mysqli_fetch_array($resultado)) {
            ?>
                <tr>
                    <td><?php echo $arrayCunsulta['tipo'] ?></td>
                    <td><?php echo $arrayCunsulta['zona'] ?></td>
                    <td><?php echo $arrayCunsulta['direccion'] ?></td>
                    <td><?php echo $arrayCunsulta['dormitorios'] ?></td>
                    <td><?php echo $arrayCunsulta['precio'] ?> €</td>
                    <td><?php echo $arrayCunsulta['tamano'] ?> m<sup>2</sup></td>
                    <td><?php echo $arrayCunsulta['extras'] ?></td>
                    <?php
                    if ($arrayCunsulta['foto'] !== "") {
                    ?>
                        <td><?php echo "<a href=" . $arrayCunsulta['foto'] . " target=\"_blank\"/>Foto" ?> </td>
                    <?php
                    } else {
                    ?>
                        <td>No hay fotos</td>
                    <?php
                    }
                    ?>
                    <td><?php echo $arrayCunsulta['observaciones'] ?></td>
                </tr>
        <?php
            }
        }
        ?>
        </table>
</body>

</html>