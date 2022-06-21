<h1>Biblioteca</h1>
<ul>
    <a href="/">Home</a>
    <?php if ($_SESSION["profileLib"] != "guest") { ?>
        <a href="/myLoans">Mis préstamos</a>
        <a href="/logout">Salir</a>
    <?php } ?>
</ul>
<h3>Bienvenido <?php echo $_SESSION['name']?> <?php echo $_SESSION['surname']?>, estás como <?php echo $_SESSION['profileLib']?></h3>