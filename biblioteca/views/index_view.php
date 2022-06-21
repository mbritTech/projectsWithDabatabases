<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
</head>

<body>
    <?php include("include/header_view.php") ?>

    <?php include("include/login_view.php") ?>

    <h2>Libros disponibles</h2>
    <table>
    <?php foreach ($data as $key  => $books) {
        if ($key == "books") { foreach ($books as $key => $value) { ?>
            <tr>
                <td><?php echo $value["title"] ?> - <?php echo $value["author"] ?></td>
                <?php if ($_SESSION["profileLib"] != "guest") { ?>
                    <td><button><a href="./confirmLoan/<?php echo $value["id"] ?>">realizar préstamo</a></button></td>
                <?php } ?>
            </tr>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    </table>

</body>

</html>