<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viviendas</title>
</head>

<body>
    <form action="#" method="post">
        <span>Tipo:</span>
        <select class="campo" name="tipo">
            <option value="Piso">Piso</option>
            <option value="Adosado">Adosado</option>
            <option value="Chalet">Chalet</option>
            <option value="Casa">Casa</option>
        </select>
        <span>Zona:</span>
        <select class="campo" name="zona">
            <option value="Centro">Centro</option>
            <option value="Nervion">Nervión</option>
            <option value="Triana">Triana</option>
            <option value="Aljarafe">Aljarafe</option>
            <option value="Macarena">Macarena</option>
        </select>
        <span>Número de dormitorios:</span>
        <input class="campo" type="radio" name="dormitorios" value="1" required>1</input>
        <input class="campo" type="radio" name="dormitorios" value="2">2</input>
        <input class="campo" type="radio" name="dormitorios" value="3">3</input>
        <input class="campo" type="radio" name="dormitorios" value="4">4</input>
        <input class="campo" type="radio" name="dormitorios" value="5">5</input>
        <span>Precio máximo:</span>
        <input class="campo" type="text" name="precio"> &euro;</input>

        <input type="submit" value="Buscar">
    </form>
    <?php
    if (isset($_REQUEST['dormitorios'])) {
        $tipo = $_REQUEST['tipo'];
        $zona = $_REQUEST['zona'];
        $dormitorios = $_REQUEST['dormitorios'];
        $precio = $_REQUEST['precio'];

        $conect = mysqli_connect("localhost", "root", "", "viviendas");
        if (mysqli_connect_errno()) {
            echo "Fallo al conectar con la base de datos" . mysqli_connect_error();
            exit;
        } else {
            // Consulta
            if(!empty($precio)){
                $resultado = mysqli_query($conect, "SELECT * FROM tabla_viviendas WHERE tipo = '$tipo' AND zona = '$zona' AND dormitorios = '$dormitorios' AND precio <= '$precio'");
            }else{
                $resultado = mysqli_query($conect, "SELECT * FROM tabla_viviendas WHERE tipo = '$tipo' AND zona = '$zona' AND dormitorios = '$dormitorios'");
            }
        }
    ?>
        <table border="1">
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