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
    <?php if (!isset($_POST['show'])) { ?>
        <h2>Selecciona la encuesta a responder:</h2>
        <form action="" method="post">
            <select name="slSurvey" id="">
                <?php foreach ($data as $key => $survey) { ?>
                    <option value="<?php echo $survey['id'] ?>"><?php echo $survey['descripcion']; ?></option>
                <?php } ?>
            </select>
            <button type="submit" name="show">Mostrar</button>
        </form>
    <?php } ?>
</body>

</html>