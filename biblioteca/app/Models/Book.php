<?php
/**
 * relación 1:N con palabras
 */

namespace App\Models;

require_once 'DBAbstractModel.php';

class Book extends DBAbstractModel
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
    private $author;
    private $title;
    private $editorial;

    public function getId(){
        return $this->id;
    }

    public function get($id = ""){
        $this->query= "SELECT  * 
                       FROM books
                       WHERE id = :id";

        $this->parametros['id']= $id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function set(){}
    public function edit(){}
    public function delete($id=""){}

    public function getAll(){
        $this->query= "SELECT  * 
                       FROM books";
        
        $this->get_results_from_query();
        return $this->rows;

    }

    public function getBooksByUser($idUser){
        $this->query = "SELECT * 
                        FROM books 
                        WHERE id IN (SELECT id_book 
                                    FROM loans 
                                    WHERE id_user = :userId)";

        $this->parametros['userId']= $idUser;
        $this->get_results_from_query();
        return $this->rows;
    }

}