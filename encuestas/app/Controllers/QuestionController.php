<?php

namespace App\Controllers;

use App\Models\Question;
use App\Models\Option;


class QuestionController extends BaseController
{

    public function CreateQuestAction()
    {
        $this->renderHtml("../views/createQuest_view.php");
        $questObj = Question::getInstancia();
        $optObj = Option::getInstancia();

        $processForm = false;
        $description = "";

        if (isset($_POST["send"])) {
            $processForm = true;
            $description = $_POST["question"];
        }

        if ($processForm) {
            $questObj->setDescription($description);
            $questObj->set();

            foreach ($_POST["options"] as $key => $value) {
                $questObj->setOptions($value);
            }

            $idInputQuestion = $questObj->lastInsertId();

            $inputOptions = $questObj->getOptions();

            foreach ($inputOptions as $key => $value) {
                $optObj->setIdPregunta($idInputQuestion);
                $optObj->setOpcion($value);
                $optObj->set();
            }

            echo "<br>Pregunta creada";
        }
    }
}
