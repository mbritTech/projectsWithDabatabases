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
    <h2>Mis préstamos</h2>
    <table>
    <?php foreach ($data as $key => $value) { ?>
        <tr>
            <td><p><?php echo $value["author"]?>, <?php echo $value['title']?></p></td>
            <td><button><a href="./myLoans/<?php echo $value["id"]?>">cancelar</a></button></td>
        </tr>
    <?php } ?>
    </table>

</body>

</html>