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
    <?php if ($_SESSION['profileEnc'] == "administrador") { ?>
        <form action="" method="post">
            <button type="submit"><a href="./createQuestion">Crear pregunta</a></button>
            <button type="submit"><a href="./createSurvey">Crear encuesta</a></button>
        </form>
        <?php } ?>
    </body>
    <?php include("include/loginForm_view.php") ?>

</html>