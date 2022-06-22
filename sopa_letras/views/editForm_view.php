<!DOCTYPE html>
<html lang="en">
<?php include("include/head_view.php")?>
<body>
    <?php include("include/header_view.php") ?>
    <?php include("include/navBar_view.php") ?>
    
    <h2>Editar palabra</h2>
    <form action="" method="post">
        <label for="name">Nombre: </label>
        <input type="text" name="newWord" id="" value="<?php echo $data["word"]?>">
        <button type="submit" name="send"><?php echo strtoupper("editar")?></button>
    </form>

</body>

</html>