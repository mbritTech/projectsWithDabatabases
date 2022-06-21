<h2><?php echo strtoupper($data['surveyInfo']['descripcion']) ?></h2>
<form action="" method="post" >
    <?php foreach ($data['questions'] as $key => $question) { ?>
        <h3><?php echo ucfirst($question['descripcion'])  ?></h3>
        <?php foreach ($data['options'] as $k => $options) { ?>
            <?php if ($key == $k) { ?>
                <?php foreach ($options as $index => $option) { ?>
                    <input type="radio" name="answers[<?php echo $k ?>]" id="<?php echo $index ?>" value="<?php echo $option['opcion'] ?>">
                    <label for="<?php echo $index ?>"><?php echo $option['opcion'] ?></label>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>
    <br><br>
    <button type="submit" name="send">Enviar</button>
    <input type="text" name="idSurvey" value="<?php echo $data['surveyInfo']['id']?>" id="" hidden>
</form>

<!-- Para dar un paso hacia delante hay que dar uno para atrás y sobre todo muchas en el 
el sector tecnológico lo más inteligente es esto -->