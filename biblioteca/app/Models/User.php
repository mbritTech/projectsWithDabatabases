<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class User extends DBAbstractModel
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
    private $name;
    private $surname;
    private $dni;
    private $username;
    private $password;
    private $status;
    private $profile;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setUser($user) {
        $this->username = $user;
    }
    public function setPassword($psw) {
        $this->password = $psw;
    }

    public function get(){}
    public function set(){}
    public function edit(){}
    public function delete($id=""){}

    public function login(){
        $this->query = "SELECT *
                        FROM users
                        WHERE username = :user AND password = :psw";
            
        $this->parametros['user']= $this->username;
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
}