<?php

namespace App\Services;
use PDO;

class DB{
    private static $instance;

    private $pdo;

    private function __construct(){
        $dbOptions = (require __DIR__ ."/../../service.php")["db"];
        $dsn = "pgsql:host=".$dbOptions["dbname"].";dbname=".$dbOptions["dbname"];
        $this->pdo = new PDO(
            $dsn,
            $dbOptions['user'],
            $dbOptions['password']
        );

    }

    public function query($sql, $params=[], $className = "stdClass"){
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false===$result) return null;

        return $sth->fetchAll(PDO::FETCH_CLASS, $className);
    }

    public static function getInstance(){
        if (self::$instance===null)
            self::$instance = new self();

        return self::$instance;
    }
}
