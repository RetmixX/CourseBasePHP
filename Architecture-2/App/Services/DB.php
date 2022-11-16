<?php

namespace App\Services;
use PDO;

class DB{
    private $pdo;

    public function __construct(){
        $dbOptions = (require __DIR__ ."/../../service.php")["db"];
        $dsn = "pgsql:host=".$dbOptions["dbname"].";dbname=".$dbOptions["dbname"];
        $this->pdo = new PDO(
            $dsn,
            $dbOptions['user'],
            $dbOptions['password']
        );

    }

    public function query($sql, $params=[]){
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false===$result) return null;

        return $sth->fetchAll();
    }
}
