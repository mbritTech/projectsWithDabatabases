<ul>
    <li><a href="/">Inicio</a></li>
    <li><a href="/api">Datos api</a></li>
    <?php if ($_SESSION["perfil"] != "invitado") {?>
        <li><a href="/logout">Cerrar sesión</a></li>
    <?php } ?>
</ul>