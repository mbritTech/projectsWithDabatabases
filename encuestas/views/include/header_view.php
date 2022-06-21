<h1>Encuestas Gran Capitán</h1>
<h3>Bienvenido <?php echo $_SESSION['name']?>, usted está como <?php echo $_SESSION['profileEnc']?></h3>
<nav>
    <ul>
        <li><a href="<?php echo BASEURLPATH?>/">Inicio</a></li>
        <?php if ($_SESSION['profileEnc'] == "usuario") { ?>
            <li><a href="<?php echo BASEURLPATH?>/answerSurvey">Encuestas</a></li>
        <?php } ?>
        <li><a href="<?php echo BASEURLPATH?>/logout">Salir</a></li>
        
    </ul>
</nav>