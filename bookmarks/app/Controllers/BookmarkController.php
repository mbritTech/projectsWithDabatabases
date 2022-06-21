<?php

namespace App\Controllers;

use App\Models\Bookmark;
use App\Models\User;

class BookmarkController extends BaseController
{

    public function MyBookmarksAction()
    {
        $bmkObj = Bookmark::getInstancia();

        $data = $bmkObj->getBookmarksByIdUsuario($_SESSION['userId']);

        $this->renderHtml("../views/myBookmarks_view.php", $data);
    }

    public function AddBookmarkAction()
    {

        $bmkObj = Bookmark::getInstancia();
        $userObj = User::getInstancia();

        $data = $userObj->getAll();

        $this->renderHtml("../views/addBookmarkForm_view.php", $data);

        $processForm = false;
        $bmkUrl = "";
        $description = "";
        $user = "";

        if (isset($_POST["send"])) {
            $processForm = true;
            $bmkUrl = $_POST["url"];
            $description = $_POST["descrip"];
            $user = $_POST["slIdUser"];
        }

        if ($processForm) {
            $bmkObj->set($bmkUrl, $description, $user);
            echo "<br>TODO OK";
        }

    }

    public function EditBookmarkAction(){

        $this->renderHtml("../views/editBookmark_view.php");

        $bmkObj = Bookmark::getInstancia();

        $processForm = false;
        $newBmkUrl = "";
        $newDescription = "";
        $idBookmark = "";

        $urlSplit = explode("/",$_SERVER["REQUEST_URI"]);
        $idSelBk = end($urlSplit);

        if (isset($_POST["send"])) {
            $processForm = true;
            $newBmkUrl = $_POST["url"];
            $newDescription = $_POST["descrip"];
            $idBookmark = $idSelBk;
        }

        if ($processForm) {
            $bmkObj->edit($newBmkUrl, $newDescription, $idBookmark);
            echo "<br>Bookmark editado correctamente";
        }
    }

    public function DelBookmarkAction(){
        $bmkObj = Bookmark::getInstancia();

        $urlSplit = explode("/",$_SERVER["REQUEST_URI"]);
        $idSelBk = end($urlSplit);

        $bmkObj->delete($idSelBk);

        header("location: ../bookmarks");

    }
}
