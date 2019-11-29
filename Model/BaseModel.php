<?php

namespace Model;

use Utils\Database;
use Utils\QuerySet;

class BaseModel
{
    public $tableFields = [];

    public function __construct()
    {

    }

    public function fields()
    {
        return null;
    }

    public function table()
    {
        return null;
    }

    public static function all()
    {
        $obj = new static();
        $query_set = new QuerySet($obj->table());
        return $query_set->get();
    }

    public static function insert($data)
    {
        $db = new Database();
        $obj = new static();
        $key = '(' . join(',', array_keys($data)) . ')';
        $values = "('" . join("','", array_values($data)) . "')";
        $sql = 'insert into ' . $obj->table() . " $key values $values";
        $result = $db->conn->query($sql);
        return $result;
    }

    public static function where($col, $op, $val)
    {
        $obj = new static();
        return ((new QuerySet($obj->table())) -> where($col, $op, $val));
    }

    public static function whereOr(...$orCond)
    {
        $obj = new static();
        return ((new QuerySet($obj->table())) -> whereOr(...$orCond));
    }

    public static function delete()
    {
        $obj = new static();
        return (new QuerySet($obj->table()))->delete();
    }

    public static function getById($id)
    {
        $obj = new static();
        $result =  ((new QuerySet($obj->table()))->where('id', '=', $id))->get();
        if (count($result) > 0)
        {
            return $result[0];
        }
        return NULL;
    }

    public static function update($data)
    {
        $obj = new static();
        return (new QuerySet($obj->table()))->update($data);
    }

    public static function rawQuery($query) {
        $db = new Database();
        $result = $db->conn->query($query);
        $result_arr = [];
        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($result_arr, $row);
            }
        }
        return $result_arr;
    }
}
