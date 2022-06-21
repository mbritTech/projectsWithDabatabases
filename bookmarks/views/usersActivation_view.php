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
    <?php if (count($data) != 0) { ?>
        <h2>Activación de usuarios</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td></td>
                    <td>
                        <?php if (isset($_POST['markAll'])) { ?>
                            <button type="submit">Desmarcar</button>
                        <?php } else { ?>
                            <button type="submit" name="markAll">Marcar</button>
                        <?php } ?>
                    </td>
                </tr>
                <?php foreach ($data as $key => $users) { ?>
                    <tr>
                        <td><?php echo $users['user'] . " -> " . $users['nombre'] ?></td>
                        <td><input type="checkbox" name="<?php echo $users['id'] ?>" id="" <?php if (isset($_POST['markAll'])) { ?> checked <?php } else { ?> <?php } ?>>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="send">Enviar</button>
                    </td>
                </tr>
            </table>
        </form>
    <?php } else { ?>
        <h2>Todos los usuarios están desbloqueados</h2>
    <?php } ?>

</body>

</html>