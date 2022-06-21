<?php if ($_SESSION['perfil'] == "invitado") { ?>
    <form action="" method="post" id="loginForm">
        <h2>Login</h2>
        <label for="us">Introduce el usuario: </label>
        <input type="text" name="user" id="us">
        <br><br>
        <label for="pa">Introduce la contraseña: </label>
        <input type="password" name="pass" id="pa">
        <br><br>
        <button type="submit" name="log-in">Iniciar sesión</button>
    </form>
<?php } ?>