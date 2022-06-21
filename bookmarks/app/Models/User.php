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
    private $nombre;
    private $user;
    private $psw;
    private $email;
    private $perfil;
    private $bloqueado;

    public function get()
    {
    }
    public function set()
    {
    }
    public function edit()
    {
    }
    public function delete($id = "")
    {
    }

    public function getAll()
    {
        $this->query = "SELECT *
                        FROM usuarios";

        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAllBlocked()
    {
        $this->query = "SELECT *
                        FROM usuarios
                        WHERE bloqueado = 1";

        $this->get_results_from_query();
        return $this->rows;
    }

    public function editBlockedUsers($idUser)
    {
        $this->query = "UPDATE usuarios
                        SET bloqueado = 0
                        WHERE id = :userId";

        $this->parametros['userId'] = $idUser;
        $this->get_results_from_query();

    }

    public function login($username, $password)
    {
        $this->query = "SELECT *
                        FROM usuarios
                        WHERE user = :us AND psw = :pass";

        $this->parametros['us'] = $username;
        $this->parametros['pass'] = $password;

        $this->get_results_from_query();

        $data = array();

        if (count($this->rows) == 1) {
            $data = $this->rows[0];
        } else {
            $data = false;
        }

        return $data;
    }
}
