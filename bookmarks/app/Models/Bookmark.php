<?php

namespace App\Models;

require_once 'DBAbstractModel.php';

class Bookmark extends DBAbstractModel
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
    private $bmk_url;
    private $description;
    private $id_usuario;

    public function get()
    {
    }

    public function set($bmkUrl="", $descrip="", $idUser="")
    {
        $this->query= "INSERT INTO bookmarks(bmk_url, description, 	id_usuario)
                       VALUES(:url, :desc, :user_id)";
        
        $this->parametros["url"] = $bmkUrl;
        $this->parametros["desc"] = $descrip;
        $this->parametros["user_id"] = $idUser;
        $this->get_results_from_query();
    }

    public function edit($newBmk="", $newDesc="", $idBmk="")
    {
        $this->query = "UPDATE bookmarks 
                        SET bmk_url = :bmk, description = :desc
                        WHERE id = :id";

        $this->parametros['bmk'] = $newBmk;
        $this->parametros['desc'] = $newDesc;
        $this->parametros['id'] = $idBmk;
        $this->get_results_from_query();
    }

    public function delete($id = "")
    {
        $this->query = "DELETE FROM bookmarks
                        WHERE id = :idToChange";

        $this->parametros['idToChange'] = $id;
        $this->get_results_from_query();
    }

    public function getBookmarksByIdUsuario($idUser)
    {
        $this->query = "SELECT *
                        FROM bookmarks
                        WHERE id_usuario IN(
                            SELECT id
                            FROM usuarios
                            WHERE id = :userId
                        )";

        $this->parametros['userId']= $idUser;
        $this->get_results_from_query();

        return $this->rows;
    }
}
