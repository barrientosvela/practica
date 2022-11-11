<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viviendas</title>
</head>

<body>
    <?php
    $conect = mysqli_connect("localhost", "root", "", "viviendas");
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con la base de datos" . mysqli_connect_error();
        exit;
    } else {
        // Consulta
        $resultado = mysqli_query($conect, "SELECT * FROM tabla_viviendas ");
    }
    ?>
    <table border="1">
        <tr>
            <th>tipo</t>
            <td>zona</td>
            <td>direccion</td>
            <td>dormitorios</td>
            <td>precio</td>
            <td>tamano</td>
            <td>extras</td>
            <td>foto</td>
            <td>observaciones</td>
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
                    <td><?php echo "<a href=" . $arrayCunsulta['foto'] . " />Foto" ?> </td>
                <?php
                } else {
                ?>
                    <td></td>
                <?php
                }
                ?>
                <td><?php echo $arrayCunsulta['observaciones'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>