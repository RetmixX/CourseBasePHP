<?php
namespace App\Models;

class UserAuthService{

    public static function createToken($user){
        $token = $user->getId().":".$user->getAuthToken();
        setcookie("token", $token, 0, '/', "", false, true);
    }

    public static function getUserByToken(){
        $token = $_COOKIE["token"] ?? "";
        if (empty($token)) return null;

        [$userId, $authToken] = explode(":", $token, 2);

        $user = User::findById((int)$userId);

        if ($user === null || $user[0]->getAuthToken()!==$authToken) return null;

        return $user;


    }
}
