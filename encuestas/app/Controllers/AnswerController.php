<?php

namespace App\Controllers;

use App\Models\Question;
use App\Models\Option;
use App\Models\Survey;
use App\Models\QuestionsAnswers;
use App\Models\Answer;


class AnswerController extends BaseController
{

    public function AnswerSurveyAction()
    {
        $objSurv = Survey::getInstancia();
        $objQuest = Question::getInstancia();
        $objOption = Option::getInstancia();
        $objQuestAns = QuestionsAnswers::getInstancia();
        $objAnswer = Answer::getInstancia();

        $data = $objSurv->getAll();

        $this->renderHtml("../views/selAnswerSurvey_view.php", $data);

        $processForm = false;
        $dataAux = [];
        $idSurvey = "";
        $surveyDesc = "";
        $surveyQuestions = "";
        $dataOptions = [];
        $_SESSION['idSurvey'] = "";

        if (isset($_POST["show"])) {
            $processForm = true;

            $idSurvey = $_POST['slSurvey'];
            $surveyDesc = $objSurv->getAllById($idSurvey);
            $surveyQuestions = $objQuest->getQuestionsByIdSurveyQuestionAnswer($idSurvey);

            $dataAux = ["surveyInfo" => $surveyDesc, "questions" => $surveyQuestions];

            foreach ($dataAux['questions'] as $key => $question) {
                array_push($dataOptions, $objOption->getOptionsByIdQuestion($question['id']));
            }

            $dataAux += ["options" => $dataOptions];

        }

        if ($processForm) {
            $this->renderHtml("../views/include/answerSurvey_view.php", $dataAux);
            $_SESSION['idSurvey'] = $dataAux['surveyInfo']['id'];
        }

        $processSendForm = false;
        $answers = [];
        $idSurvey = "";

        if (isset($_POST['send'])) {
            $processSendForm = true;
            $answers = $_POST['answers'];
            $idSurvey = $_POST['idSurvey'];
        }

        if ($processSendForm) {
            $infoQuestAnswers = $objQuestAns->getAllByIdSurvey($idSurvey);

            foreach ($infoQuestAnswers as $key => $element) {
                $idsOptions = $objOption->getIdByIdQuestionAndOption($element['idPregunta'], $answers[$key])[0];

                $objAnswer->setIdEncuestaPregunta($element['id']);
                $objAnswer->setValor($idsOptions['id']);
                $objAnswer->set();

            }
            echo "<br>Encuesta rellenada correctamente";
        }
    }
}
