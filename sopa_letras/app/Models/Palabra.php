<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class Palabra extends DBAbstractModel
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
    private $palabra;

    public $msg;

    public function setPalabra($word){
        $this->palabra = $word;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getPalabra(){
        return $this->palabra;
    }

    public function setMsg($msg){
        $this->msg = $msg;
    }

    public function getMsg(){
        return $this->msg;
    }

    public function get($id="")
    {
        $this->query= "SELECT  * 
                       FROM palabras
                       WHERE id = :id";

        $this->parametros["id"] = $id;
        $this->get_results_from_query();
        $this->setMsg("Listado realizado correctamente");
        return $this->rows;
        
    }

    public function set()
    {
        $this->query= "INSERT INTO palabras(palabra)
                       VALUES(:palabra)";
        
        $this->parametros["palabra"] = $this->palabra;
        $this->get_results_from_query();
        $this->setMsg("Palabra introducida correctamente");
        
    }

    public function edit()
    {
        $this->query = "UPDATE palabras 
                        SET palabra = :word
                        WHERE id = :id";

        $this->parametros['word'] = $this->palabra;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $this->setMsg('Valor editado correctamente');
    }

    public function delete($id)
    {
        $this->query = "DELETE FROM palabras
                        WHERE id = :idToChange";

        $this->parametros['idToChange'] = $id;
        $this->get_results_from_query();
        $this->setMsg('Palabra borrada correctamente');
    }

    public function getAll(){
        $this->query= "SELECT  * 
                       FROM palabras";
        
        $this->get_results_from_query();
        $this->setMsg("Listado realizado correctamente");
        return $this->rows;

    }

    public function getWordByFilter($palabra){
        $this->query= "SELECT  * 
                       FROM palabras
                       WHERE palabra 
                       LIKE CONCAT('%',:palabra,'%')";
        
        $this->parametros['palabra'] = $palabra;
        $this->get_results_from_query();
        $this->setMsg("Búsqueda realizada correctamente");
        return $this->rows;

    }

    public function getLastWords(){
        $this->query= "SELECT  * 
                       FROM palabras
                       ORDER BY id DESC
                       LIMIT 5";
        
        $this->get_results_from_query();
        $this->setMsg("Listado de las últimas palabras realizado correctamente");
        return $this->rows;

    }

}
