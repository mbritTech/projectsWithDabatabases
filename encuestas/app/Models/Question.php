<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class Question extends DBAbstractModel
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
    private $description;
    private $options = [];

    public function setDescription($desc)
    {
        $this->description = $desc;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setOptions($opt)
    {
        array_push($this->options, $opt);
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function get()
    {
    }

    public function getAll()
    {
        $this->query = "SELECT *
                       FROM preguntas";

        $this->get_results_from_query();
        return $this->rows;
    }

    public function getQuestionsByIdSurveyQuestionAnswer($idSurveyForSearch)
    {
        $this->query = "SELECT * 
                        FROM preguntas 
                        WHERE id IN(SELECT idPregunta 
                                    FROM r_encuestas_preguntas
                                    WHERE idEncuesta = :idSurvey)";

        $this->parametros['idSurvey'] = $idSurveyForSearch;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set()
    {
        $this->query = "INSERT INTO preguntas(descripcion)
                        VALUES(:desc)";

        $this->parametros["desc"] = $this->description;
        $this->get_results_from_query();
    }

    public function edit()
    {
    }

    public function delete($id = "")
    {
    }

    public function lastInsertId()
    {
        return $this->lastInsert();
    }
}
