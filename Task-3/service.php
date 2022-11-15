<?php
return [
    "db"=>[
        "host"=>'localhost',
        "dbname"=>getenv("POSTGRES_DB"),
        "user"=>getenv("POSTGRES_USER"),
        "password"=>getenv("POSTGRES_PASSWORD")
    ]
];
