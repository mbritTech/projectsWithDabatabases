<h2>Listado palabras</h2>
<table border="2px solid black">
    <thead>
        <tr>
            <th>Palabra</th>
            <?php if ($_SESSION["perfil"] != "invitado" ) {?>
                <th>Acciones</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data["infWord"] as $word) { ?>
            <tr>
                <td> <?php echo $word["palabra"] ?> </td>
                <?php if ($_SESSION["perfil"] != "invitado" ) {?>
                    <td><button><a href="./edit/<?php echo $word["id"]?>">edit</a></button></td>
                    <td><button><a href="./del/<?php echo $word["id"]?>">del</a></button></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>