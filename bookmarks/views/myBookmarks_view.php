<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks</title>
</head>

<body>
    <?php include("include/header_view.php") ?>
    <h2>Mis Bookmarks</h2>
    <form action="" method="post"></form>
    <table>
        <?php foreach ($data as $key => $bmks) { ?>
            <tr>
                <td><a target="_blank" href="<?php echo $bmks['bmk_url'] ?>"><?php echo $bmks['bmk_url'] ?></a></td>
                <td><?php echo $bmks['description'] ?></td>
                <td><button type="submit" name="edit"><a href="./edit/<?php echo $bmks['id']?>">Editar</a></button></td>
                <td><button type="submit" name="del"><a href="./del/<?php echo $bmks['id']?>">Borrar</a></button></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <button type="submit" name="add"><a href="bookmarks/add">Añadir bookmark</a></button>


</body>

</html>