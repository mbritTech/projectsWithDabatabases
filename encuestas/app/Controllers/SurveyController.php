<?php

namespace App\Controllers;

use App\Models\Question;
use App\Models\Survey;
use App\Models\QuestionsAnswers;

class SurveyController extends BaseController
{

    public function CreateSurveyAction()
    {
        $questObj = Question::getInstancia();
        $questAnsObj = QuestionsAnswers::getInstancia();
        $survObj = Survey::getInstancia();

        $data = $questObj->getAll();

        $this->renderHtml("../views/createSurvey_view.php", $data);

        $processForm = false;
        $description = "";
        $questions = [];

        if (isset($_POST["send"])) {
            $processForm = true;
            $description = $_POST["surveyDesc"];
            $questions = $_POST["questions"];
        }

        if ($processForm) {
            $survObj->setDescription($description);
            $survObj->setDate("2000-03-12");
            $survObj->set();

            foreach ($questions as $key => $idQuestion) {
                $questAnsObj->setIdEncuesta($survObj->lastInsertId());
                $questAnsObj->setIdPregunta($idQuestion);
                $questAnsObj->set();
            }

            echo "<br>Encuesta creada correctamente";
        }
    }
}
