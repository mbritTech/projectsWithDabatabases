<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class Survey extends DBAbstractModel
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
    private $fecha;

    public function setDescription($desc)
    {
        $this->description = $desc;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDate($date)
    {
        $this->fecha = $date;
    }


    public function get()
    {
    }

    public function getAll()
    {
        $this->query = "SELECT *
                        FROM encuestas";

        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllById($idForSearch)
    {
        $this->query = "SELECT *
                        FROM encuestas
                        WHERE id = :id";

        $this->parametros["id"] = $idForSearch;
        $this->get_results_from_query();
        
        $data = array();

        if (count($this->rows) == 1) {
            $data = $this->rows[0];
        }else{
            $data = false;    
        }
        
        return $data;
    }

    public function set()
    {
        $this->query = "INSERT INTO encuestas(descripcion, fecha)
                        VALUES(:desc, :date)";

        $this->parametros["desc"] = $this->description;
        $this->parametros["date"] = $this->fecha;
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
