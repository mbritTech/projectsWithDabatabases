<?php if ($_SESSION["profile"] === "invitado") { ?>
    <h2>Login</h2>
    <form action="" method="post">
        <label for="us">Usuario: </label>
        <input type="text" id="us" name="user">
        <br><br>
        <label for="pass">Contraseña: </label>
        <input type="password" id="pass" name="password">
        <br><br>
        <button type="submit" name="login"><?php echo strtoupper("iniciar sesion") ?></button>
    </form>
<?php } ?>