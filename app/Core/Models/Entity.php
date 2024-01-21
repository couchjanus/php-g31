<?php 

namespace Core\Models;


class Entity
{
    protected static string $table;

    protected $connect;

    public function __construct()
    {
        $this->connect = DB::connect();
    }

    public function getTable()
    {
        return static::$table;
    }

    public function save(): bool 
    {
        $class = new \ReflectionClass($this);
        $properties = [];

        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            if (isset($this->{$property->getName()})) {
                $properties[] = ''.$property->getName().' = "'.$this->{$property->getName()}.'"';
            }
        }

        $Value = implode(', ', $properties);

        if ($this->id === null) {
            $sql = "INSERT INTO " . $this->getTable() . " SET $Value";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            return true;
        }

        # update
        $sql = "UPDATE " . $this->getTable() . " SET " . $Value . "WHERE id = " . $this->id;
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return true;
    }

    public function first($id) {
        $sql = "SELECT * FROM ". $this->getTable() . " WHERE id = " . $id;
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function all()
    {
        $sql = "SELECT * FROM ". $this->getTable();
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM ". $this->getTable() . " WHERE id = " . $id;
        $stmt = $this->connect->prepare($sql);
        return $stmt->execute();
    }
}