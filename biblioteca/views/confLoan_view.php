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

    <?php include("include/login_view.php") ?>

    <h2>Estos son los datos del libro que va a realizar el préstamo</h2>
    <h3>Autor: <?php echo $data[0]['author']?></h3>
    <h3>Título: <?php echo $data[0]['title']?></h3>
    <h3>Editorial: <?php echo $data[0]['editorial']?></h3>
    <form action="" method="post">
        <button type="submit" name="yes">Aceptar</button>
        <button type="submit" name="no">Cancelar</button>
    </form>

</body>

</html>