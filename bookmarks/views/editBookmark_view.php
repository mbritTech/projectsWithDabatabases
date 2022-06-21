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
    <h2>Editar bookmark</h2>
    <form action="" method="post">
        <label for="link">Introduce una nueva url: </label>
        <input type="text" name="url" id="link" placeholder="https://www.sitioejemplo.es/">
        <br><br>
        <label for="des">Introduce una nueva descripción: </label>
        <input type="text" name="descrip" id="des">
        <br><br>
        <button type="submit" name="send">Editar</button>
    </form>

</body>

</html>