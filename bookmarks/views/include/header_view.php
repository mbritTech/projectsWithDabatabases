<?php 
    $profile = $_SESSION['profile'];
    $name = $_SESSION['name'];
?>
<h1>Gestión Bookmarks</h1>
<h3>Muy buenas <?php echo $name?>, estás como <?php echo $profile?></h3>
<nav>
    <ul>
        <li><a href="/">Inicio</a></li>
        <?php if ($profile == "usuario") { ?>
            <li><a href="/bookmarks">Mis bookmarks</a></li>
        <?php } ?>
        <?php if ($profile == "administrador") { ?>
            <li><a href="/usersAdmin">Gestionar usuario</a></li>
        <?php } ?>
        <li><a href="/logout">Salir</a></li>
    </ul>
</nav>
