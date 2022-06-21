<h2>Búsqueda de palabras</h2>
<form action="" method="get">
    <input type="text" name="searchText" id="" placeholder="buscar palabras">
    <button type="submit">buscar</button>
    <br><br>
</form>
<?php if ($_SESSION['perfil'] == "administrador") {?>
    <button><a href="./add">Nueva palabra</a></button>
<?php } ?>
