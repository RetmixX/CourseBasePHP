<?php

namespace App\Models;

class User extends ActiveRecordEntity
{
    private $nickname;
    private $email;
    private $isConfirmed;
    private $role;
    private $passwordHash;
    private $authToken;
    private $createdAt;

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
        return $this->isConfirmed;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    public function getAuthToken()
    {
        return $this->authToken;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }






}