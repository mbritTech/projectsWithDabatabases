<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class Option extends DBAbstractModel
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
    private $idPregunta;
    private $opcion;

    public function setIdPregunta($idQuest)
    {
        $this->idPregunta = $idQuest;
    }

    public function setOpcion($option)
    {
        $this->opcion = $option;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function get()
    {
    }

    public function getOptionsByIdQuestion($idQuestionForSearch)
    {
        $this->query = "SELECT opcion
                        FROM opciones
                        WHERE idPregunta = :idQuestion";

        $this->parametros['idQuestion'] = $idQuestionForSearch;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getIdByIdQuestionAndOption($idQuestionForSearch, $optionForSearch)
    {
        $this->query = "SELECT id 
                        FROM opciones 
                        WHERE idPregunta = :idQuestion AND opcion = :option";

        $this->parametros['idQuestion'] = $idQuestionForSearch;
        $this->parametros['option'] = $optionForSearch;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO opciones(idPregunta, opcion)
                        VALUES(:questionId, :option)";

        $this->parametros["questionId"] = $this->idPregunta;
        $this->parametros["option"] = $this->opcion;
        $this->get_results_from_query();    
    }

    public function edit()
    {
    }

    public function delete($id = "")
    {
    }
}
