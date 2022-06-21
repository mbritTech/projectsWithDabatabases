<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class Loan extends DBAbstractModel
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
    private $id_user;
    private $id_book;
    private $start_date;
    private $finish_date;

    public function get(){}
    public function set($userId = "", $bookId = "", $dateStart = "", $dateFinish = ""){
        $this->query= "INSERT INTO loans(id_user, id_book, start_date, finish_date)
                       VALUES(:idUser, :idBook, :startDate, :finishDate)";
        
        $this->parametros["idUser"] = $userId;
        $this->parametros["idBook"] = $bookId;
        $this->parametros["startDate"] = $dateStart;
        $this->parametros["finishDate"] = $dateFinish;
        $this->get_results_from_query();
    }
    public function edit(){}
    public function delete($id){
        $this->query= "DELETE
                       FROM loans
                       WHERE id_book = :id";

        $this->parametros["id"]= $id;
        $this->get_results_from_query();

    }

}