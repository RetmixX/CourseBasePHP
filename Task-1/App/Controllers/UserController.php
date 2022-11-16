<?php
namespace App\Controllers;

use App\Exceptions\InvalidArgumentException;
use App\Models\User;
use App\Models\UserAuthService;

class UserController extends BaseController {

    public function signUp(){
        if (!empty($_POST)){
            try {
                $user = User::signUp($_POST);
            } catch(InvalidArgumentException $exception) {
                $this->view->renderHTML("users/signUp.php", ["error" => $exception->getMessage()]);
                return;
            }

            if ($user instanceof User){
                $this->view->renderHTML("users/signUpSucc.php");
                return;
            }

        }


        $this->view->renderHTML("users/signUp.php");
    }

    public function login(){

        if (!empty($_POST)){
            try{
                $user = User::login($_POST);
                UserAuthService::createToken($user);
                header("Location: /");
                exit();
            }catch (InvalidArgumentException $ex){
                $this->view->renderHTML("users/login.php", ["error"=>$ex->getMessage()]);
                return;
            }
        }

        $this->view->renderHTML("users/login.php");
    }

    public function logOut(){
        setcookie("token", "", false, "/", "");
        header("Location: /");
    }
}