<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class Answer extends DBAbstractModel
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

    private $id;
    private $idEncuestaPregunta;
    private $valor;

    public function setIdEncuestaPregunta($idSurveyQuestion)
    {
        $this->idEncuestaPregunta = $idSurveyQuestion;
    }

    public function setValor($value)
    {
        $this->valor = $value;
    }

    public function get(){}

    public function set(){
        $this->query = "INSERT INTO respuestas(idEncuestaPregunta, valor)
                        VALUES(:idSurveyQuest, :value)";

        $this->parametros["idSurveyQuest"] = $this->idEncuestaPregunta;
        $this->parametros["value"] = $this->valor;
        $this->get_results_from_query();
    }

    public function edit(){}

    public function delete($id = ""){}


}