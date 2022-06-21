<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public function AdminUsersAction()
    {

        $userObj = User::getInstancia();

        $data = $userObj->getAllBlocked();

        $this->renderHtml("../views/usersActivation_view.php", $data);

        $processForm = false;
        //$user = "";
        //$password = "";

        if (isset($_POST["send"])) {
            $processForm = true;
            //$user = $_POST["user"];
            //$password = $_POST["password"];
        }

        if ($processForm) {
            foreach ($data as $key => $users) {
                if (array_key_exists($users['id'], $_POST)) {
                    $userObj->editBlockedUsers($users['id']);
                }
            }
        }
    }
}
