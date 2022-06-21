<!-- TODO form confirmación-->
<!DOCTYPE html>
<html lang="en">
<?php include("include/head_view.php")?>
<body>
    <?php include("include/header_view.php")?>
    <?php include("include/navBar_view.php")?>

    <h2>Información del registro seleccionado</h2>
    <form action="">
        <label for="name">Nombre: </label>
        <input type="text" name="" id="name" value="<?php echo $data["word"]?>" disabled>
    </form>

    <form action="" method="post">
        <h2>¿Seguro que quieres borrarlo?</h2>
        <input type="radio" name="ans" id="s" value="s"> <!-- tipo submit-->
        <label for="s">Sí</label>
        <input type="radio" name="ans" id="n" value="n">
        <label for="n">No</label>
        <br><br>
        <button type="submit" name="send">Enviar</button>
    </form>
    
</body>
</html>