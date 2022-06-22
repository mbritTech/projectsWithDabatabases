<h2>Búsqueda de palabras</h2>
<form action="" method="get" id="wordSearch">
    <input type="text" name="searchText" id="" placeholder="buscar palabras">
    <button type="submit"><?php echo strtoupper("buscar")?></button>
    <br><br>
</form>
<?php if ($_SESSION['perfil'] == "administrador") {?>
    <button><a href="./add"><?php echo strtoupper("nueva palabra")?></a></button>
<?php } ?>
