<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("include/header_view.php") ?>
    <form action="" method="post">
        <label for="quest">Introduce la descripción de la encuesta: </label>
        <br><br>
        <input type="text" name="surveyDesc" id="desc" size="60">
        <h3>Preguntas disponibles</h3>
        <table>
        <?php foreach ($data as $key => $question) { ?>
            <tr>
                <td><?php echo $question["descripcion"]?></td>
                <td><input type="checkbox" name="questions[]" id="question<?php echo $question["id"]?>" value="<?php echo $question["id"]?>"></td>
            </tr>
        <?php } ?>
        </table>
        <br>
        <button type="submit" name="send">Crear</button>
    </form>

</body>

</html>