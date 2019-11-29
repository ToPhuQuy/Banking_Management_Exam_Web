<?php

namespace Utils;

class QuerySet
{
    private $db;
    private $table;
    private $filer;
    private $limit;

    public function __construct($table, $filter=[], $limit=null)
    {
        $this->db = new Database();
        $this->table = $table;
        $this->filter = $filter;
        $this->limit = $limit;
    }

    public function where($col, $op, $value)
    {
        $new_filter = $this->filter;
        array_push($new_filter, [$col, $op, $value]);
        return new QuerySet($this->table, $new_filter, $this->limit);
    }

    public function whereOr(...$orArr)
    {
        $new_filter = $this->filter;
        array_push($new_filter, $orArr);
        return new QuerySet($this->table, $new_filter, $this->limit);
    }

    public function limit($num)
    {
        return new QuerySet($this->table, $this->filter, $num);
    }

    public function loadCondition()
    {
        $cond = array_map(function ($x)
        {
            if (!is_array($x[0]))
            {
                return "$x[0] $x[1] '$x[2]'";
            }
            
            $orCond = array_map(function ($orX) {
                return "$orX[0] $orX[1] '$orX[2]'";
            }, $x);

            return "( " . join(' or ', $orCond) . " )";
        }, $this->filter);

        array_push($cond, '1=1');
        
        return join(' and ', $cond);
    }

    public function get()
    {
        $sql = "select * from ". $this->table. " where " . $this->loadCondition() . " order by id";

        $result = $this->db->conn->query($sql);
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

    public function exists()
    {
        $sql = "select 1 from $this->table where " . $this->loadCondition() . " limit 1";
        $result = $this->db->conn->query($sql);
        return $result->num_rows !== 0;
    }

    public function delete()
    {
        $sql = "delete from $this->table where " . $this->loadCondition();
        $result = $this->db->conn->query($sql);
        return $result;
    }

    public function update($data)
    {
        $keys = array_keys($data);
        $update_col = array_map(function ($key, $val) {
            return "$key = '$val'";
        }, $keys, $data);
        $update_col_stmt = join(',', $update_col);
        $sql = "update $this->table set " . $update_col_stmt . " where " . $this->loadCondition();
        return $this->db->conn->query($sql);
    }
}