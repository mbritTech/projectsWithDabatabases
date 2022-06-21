<?php
/**
 * relación 1:N con palabras
 */

namespace App\Models;

require_once 'DBAbstractModel.php';

class Usuario extends DBAbstractModel
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
    private $usuario;
    private $password;
    private $perfil;

    public function setId($id) {
        $this->id = $id;
    }
    public function setUser($user) {
        $this->usuario = $user;
    }
    public function setPassword($psw) {
        $this->password = $psw;
    }

    public function get($id=""){
        $this->query= "SELECT  * 
                       FROM usuarios
                       WHERE id = :id";

        $this->parametros["id"] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function login(){
        $this->query = "SELECT *
                        FROM usuarios
                        WHERE usuario = :user AND password = :psw";
            
        $this->parametros['user']= $this->usuario;
        $this->parametros['psw']=$this->password;

        $this->get_results_from_query();

        $data = array();

        if (count($this->rows) == 1) {
            $data = $this->rows[0];
        }else{
            $data = false;    
        }
        
        return $data;

        

    }
    public function set(){}
    public function edit(){}
    public function delete($id=""){}
}