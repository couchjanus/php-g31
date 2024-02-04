<?php 

namespace Core\Models;


abstract class Entity
{
    protected static string $table;

    protected $connect;
    private $columns;
    private $where;
    private $join;


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


    public function select($columns=[])
    {
        $this->columns = $columns;
        return $this;
    }

    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

    public function join($join)
    {
        $this->join = $join;
        return $this;
    }

    public function query()
    {
        $query = "SELECT ";
        if(count($this->columns)>0) {
            $query .= implode(", ", $this->columns);
        } else {
            $query .= "*";
        }

        $query .= " FROM ";
        $query .= static::$table;

        if (!empty($this->join)) {
            foreach ($this->join as $k => $v) {
                $query .= " INNER JOIN ".$k;
                $query .= " ON ".$k;
                $query .= ".id=".static::$table;
                $query .= ".".$v;
            }    
        }

        if (!empty($this->where)) {
            $query .= " WHERE ";
            $query .= $this->where;
        }
        return $query;    
    }

    public function get() 
    {
        $stmt = $this->connect->prepare($this->query());
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findBy($condition)
    {
        $stmt = $this->connect->prepare($this->select()->where($condition)->query());
        $stmt->execute();
        return $stmt->fetch();
    }

    public function insert($sql, $params = []) {
        $stmt = $this->connect->prepare($sql);
        $result = $stmt->execute($params);
        return $result;
    }


}