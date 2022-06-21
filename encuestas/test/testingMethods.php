<?php
require("../app/Config/constants.php");
require_once('../vendor/autoload.php');
use App\Models\Question;
use App\Models\Option;
use App\Models\Survey;
use App\Models\QuestionsAnswers;

$questObj = Question::getInstancia();
$optionObj = Option::getInstancia();
//$survObj = Survey::getInstancia();
$qaObj = QuestionsAnswers::getInstancia();

//$questObj->setDescription("esto es una pregunta de prueba");
//$questObj->set();

//$data = $questObj->getIdByDescription("esto es una pregunta de prueba");
//echo "<pre>",print_r($data[0]['id']),"</pre>";
//$optionObj->setIdPregunta(2);
//$optionObj->setOpcion("sí");
//$optionObj->set();
//echo "ready";

//$survObj->setDescription("encuesta sobre eficacia");
//$survObj->setDate("2000-03-12");
//$survObj->set();
//
//$qaObj->setIdEncuesta($survObj->lastInsertId());
//$qaObj->setIdPregunta(25);
//$qaObj->set();

//echo "<pre>",print_r($survObj->getDescById(5)),"</pre>";
//echo "<pre>",print_r($questObj->getQuestionsByIdSurveyQuestionAnswer(5)),"</pre>";
//echo $questObj->getQuestionsByIdSurveyQuestionAnswer(5)[1]['id'];
//echo "<pre>",print_r($optionObj->getOptionsByIdQuestion(27)),"</pre>";

//echo "<pre>",print_r($qaObj->getAllByIdSurvey(6)),"</pre>";
echo "<pre>",print_r($optionObj->getIdByIdQuestionAndOption(1, "televisión")),"</pre>";



