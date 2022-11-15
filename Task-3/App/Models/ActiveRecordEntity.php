<?php

namespace App\Models;

use App\Services\DB;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(){
        return $this->id;
    }

    public function __set(string $key, $value): void
    {
        $this->$key = $value;
    }

    public static function findAll(){
        $db = DB::getInstance();
        return $db->query("SELECT * FROM ".static::getTableName().";", [], static::class);
    }

    public static function findById($id){
        $db = DB::getInstance();
        return $db->query("SELECT * FROM ".static::getTableName()." WHERE id=:id", [":id"=>$id], static::class);
    }

    public function save($obj){
        $mappedProp = $this->mapToEntity($obj);
        if ($this->id!==null)
            $this->update($mappedProp);

        else
            $this->insert($mappedProp);
    }

    private function mapToEntity($obj){
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            if ($propertyName==="id"||$propertyName==="ID") continue;
            $value = $property->getValue($obj);
            $mappedProperties[$propertyName] = $value;
        }
        return $mappedProperties;
    }

    private function update(array $mappedProperties): void
    {
        $data = $this->returnColumnsWithValue($mappedProperties);
        $sql = "update ".static::getTableName()." set ".implode(",  ", $data[0])
            ." where id=".$this->id;
        $db = DB::getInstance();
        $db->query($sql, $data[1], static::class);
    }

    private function insert(array $mappedProperties): void
    {
        $data = $this->returnTitleColumnAndValue($mappedProperties);
        $sql = "insert into ".static::getTableName()."(".implode(", ", $data[0]).")
         values (".implode(", ", $data[1]).");";
        $db = DB::getInstance();
        $db->query($sql,[], static::class);
    }

    public function delete($id){
       $sql = "delete from ".static::getTableName()." where id=:id";
       $db = DB::getInstance();
       $db->query($sql, [":id"=>$id]);
       $this->id = null;

    }

    public static function findOneByColumn($columnName, $value): ?User{
        $db = DB::getInstance();
        $result = $db->query(
            "select * from ".static::getTableName()." where ".$columnName." =:value limit 1;",
            [":value"=>$value], static::class
        );

        if (empty($result)) return null;

        return $result[0];
    }

    private function returnColumnsWithValue($mappedProperties){
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index;
            $columns2params[] = $column . ' = ' . $param;
            $params2values[$param] = $value;
            $index++;
        }

        return [$columns2params, $params2values];
    }

    private function returnTitleColumnAndValue($mappedProperties){
        $articlesColumn = [];
        $articlesValues = [];
        foreach ($mappedProperties as $column => $value) {
            $articlesColumn[] = $column;
            $articlesValues[] = (is_string($value) ? "'" . $value . "'" : $value);
        }

        return [$articlesColumn, $articlesValues];
    }

    abstract protected static function getTableName();

}