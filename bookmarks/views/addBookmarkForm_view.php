<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleAdd.css">
    <title>Bookmarks</title>
</head>

<body>
    <?php include("include/header_view.php") ?>
    <h2>Añade un nuevo bookmark</h2>
    <form action="" method="post">
        <label for="link">Introduce la url: </label>
        <input type="text" name="url" id="link" placeholder="https://www.sitioejemplo.es/">
        <br><br>
        <label for="des">Introduce su descripción: </label>
        <input type="text" name="descrip" id="des">
        <br><br>
        <label for="sl">Selecciona el usuario: </label>
        <select name="slIdUser" id="sl">
            <?php foreach ($data as $key => $users) { ?>
                <option value="<?php echo $users['id']?>"><?php echo $users['nombre']?></option>
            <?php } ?>
        </select>
        <br><br>
        <button type="submit" name="send"><?php echo strtoupper("add")?></button>
    </form>
</body>

</html>