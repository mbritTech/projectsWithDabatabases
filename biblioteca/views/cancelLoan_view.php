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

    <h2>Va a cancelar el préstamo con los siguientes datos</h2>
    <p>Autor: <?php echo $data["author"]?></p>
    <p>Nombre: <?php echo $data["name"]?></p>
    <form action="" method="post">
        <button type="submit" name="acept">Aceptar</button>
    </form>

</body>

</html>