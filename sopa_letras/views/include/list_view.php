<h2>Listado palabras</h2>
<table id="tableList">
    <thead>
        <tr>
            <th>Palabra</th>
            <?php if ($_SESSION["perfil"] == "administrador") { ?>
                <th>Acciones</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data["infWord"] as $word) { ?>
            <tr>
                <td> <?php echo $word["palabra"] ?> </td>
                <?php if ($_SESSION["perfil"] == "administrador") { ?>
                    <td><button>
                            <a href="./edit/<?php echo $word["id"] ?>"><span class="material-icons">edit</span></a>
                        </button></td>
                    <td><button><a href="./del/<?php echo $word["id"] ?>"><span class="material-icons">delete</span></a></button></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>