<?php

namespace App\Models;

use App\Exceptions\InvalidArgumentException;

class User extends ActiveRecordEntity
{
    private $nickname;
    private $email;
    private $is_confirmed;
    private $role_id;
    private $password_hash;
    private $auth_token;
    private $created_at;

    public static function signUp($userData){
        if (empty($userData["nickname"]))
            throw new InvalidArgumentException("nickname не передано!");

        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname'])) {
            throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита и цифр');
        }

        if (static::findOneByColumn("nickname", $userData["nickname"]!==null))
            throw new InvalidArgumentException("Пользователь с таким ником существует!");

        if (empty($userData["email"]))
            throw new InvalidArgumentException("email не передано!");

        if (static::findOneByColumn("email", $userData["email"]!==null))
            throw new InvalidArgumentException("Пользователь с таким email существует!");

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email некорректен');
        }

        if (empty($userData["password"]))
            throw new InvalidArgumentException("password не передано!");

        if (mb_strlen($userData['password']) < 8) {
            throw new InvalidArgumentException('Пароль должен быть не менее 8 символов');
        }

        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->password_hash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->is_confirmed = 1;
        $user->role_id = 3;
        $user->auth_token = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->created_at = date("Y-m-d");
        $user->save($user);

        return $user;
    }

    public static function login($userData){
        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }

        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }

        $user = User::findOneByColumn('email', $userData['email']);
        if ($user === null) {
            throw new InvalidArgumentException('Нет пользователя с таким email');
        }

        if (!password_verify($userData['password'], $user->getPasswordHash())) {
            throw new InvalidArgumentException('Неправильный пароль');
        }

        if (!$user->is_confirmed) {
            throw new InvalidArgumentException('Пользователь не подтверждён');
        }

        $user->refreshAuthToken();
        $user->save($user);
        return $user;

    }

    protected static function getTableName()
    {
        return "users";
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getIsConfirmed()
    {
        return $this->is_confirmed;
    }

    public function getRole():int
    {
        return $this->role_id;
    }

    public function getPasswordHash()
    {
        return $this->password_hash;
    }

    public function getAuthToken()
    {
        return $this->auth_token;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    private function refreshAuthToken()
    {
        $this->auth_token = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }






}