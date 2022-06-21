<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("include/header_view.php")?>
    <form action="" method="post">
        <label for="quest">Introduce la descripción de la pregunta: </label>
        <br><br>
        <input type="text" name="question" id="quest" size="60" <?php if (isset($_POST["addOpt"])) { ?>
            value="<?php echo $_POST["question"]?>"<?php }?>>
        <br><br>
        <label for="opts">Selecciona el número de opciones: </label>
        <select name="slOpt" id="opts">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <button type="submit" name="addOpt">Actualizar</button>
        <br><br>
        <?php if (isset($_POST["addOpt"])) { ?>
            <?php for ($i=0; $i < $_POST["slOpt"]; $i++) { ?>
                <label for="opt">Introduce la opción: </label>
                <input type="text" size="22" name="options[]" id="opt">
                <br><br>
            <?php } ?>
        <?php } ?>
        <button type="submit" name="send">Crear</button>
    </form>


</body>

</html>