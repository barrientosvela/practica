<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>No vendo una chapa</title>
</head>

<body>
    <h1>Inserción de Vivienda</h1>
    <p>Introduzca los datos de la vivienda:</p>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <p><span>Tipo de vivienda:</span>
            <select class="campo" name="tipo">
                <option value="Piso">Piso</option>
                <option value="Adosado">Adosado</option>
                <option value="Chalet">Chalet</option>
                <option value="Casa">Casa</option>
            </select>
        </p>
        <p><span>Zona:</span>
            <select class="campo" name="zona">
                <option value="Centro">Centro</option>
                <option value="Nervion">Nervión</option>
                <option value="Triana">Triana</option>
                <option value="Aljarafe">Aljarafe</option>
                <option value="Macarena">Macarena</option>
            </select>
        </p>
        <p>
            <span>Dirección:</span>
            <input class="campo" name="direccion" type="text" placeholder="Avda de la Buhaira" />
        </p>
        <p>
            <span>Número de dormitorios:</span>
            <input class="campo" type="radio" name="dormitorios" value="1" required>1</input>
            <input class="campo" type="radio" name="dormitorios" value="2">2</input>
            <input class="campo" type="radio" name="dormitorios" value="3">3</input>
            <input class="campo" type="radio" name="dormitorios" value="4">4</input>
            <input class="campo" type="radio" name="dormitorios" value="5">5</input>
        </p>
        <p>
            <span>Precio en euros:</span>
            <input class="campo" type="text" name="precio"> &euro;</input>
        </p>
        <p>
            <span>Tamaño en metros cuadrados(m<sup>2</sup>):</span>
            <input class="campo" type="text" name="metros" placeholder="85" />
        </p>
        <p>
            <span>Seleccione un archivo (max: 100mb):</span>
            <input type="file" name="foto">
        </p>
        <p>
            <span>Extras:</span>
            <input class="campo" type="checkbox" name="extras[]" value="Piscina">Piscina</input>
            <input class="campo" type="checkbox" name="extras[]" value="Jardin">Jardín</input>
            <input class="campo" type="checkbox" name="extras[]" value="Garage">Garage</input>
        </p>
        <p>
            <span>Observaciones:</span>
            <textarea class="campo" name="observaciones" cols="50" rows="5"></textarea>
        </p>
        <input type="submit" value="Insertar">
        <input type="reset" value="Limpiar">
    </form>
</body>

</html>