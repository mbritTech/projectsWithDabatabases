<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class QuestionsAnswers extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $idEncuesta;
    private $idPregunta;

    public function setIdEncuesta($idSurvey){
        $this->idEncuesta = $idSurvey;
    }

    public function setIdPregunta($idQuestion){
        $this->idPregunta = $idQuestion;
    }

    public function get(){

    }

    public function getAllByIdSurvey($idsurveyForSearch){
        $this->query = "SELECT *
                        FROM r_encuestas_preguntas 
                        WHERE idEncuesta = :idSurvey";

        $this->parametros['idSurvey'] = $idsurveyForSearch;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set(){
        $this->query= "INSERT INTO r_encuestas_preguntas(idEncuesta, idPregunta)
                        VALUES(:idSurvey, :idQuestion)";
    
        $this->parametros["idSurvey"] = $this->idEncuesta;
        $this->parametros["idQuestion"] = $this->idPregunta;
        $this->get_results_from_query();
    }

    public function edit(){}

    public function delete($id=""){}

}

