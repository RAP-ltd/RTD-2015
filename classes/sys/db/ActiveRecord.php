<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 14:08
 */


namespace sys\db;


class ActiveRecord
{
    protected $db;
    protected $sql = "";
    protected $columns = "*";
    protected $conditions = "1";
    protected $limit = "0, 1";
    protected $order = "id DESC";

    public function __construct($id)
    {
        $this->db = \Sys::$app->db->connection;
    }

    public function one()
    {
        return $this->query("SELECT {$this->columns} FROM {$this->tableName()} WHERE {$this->conditions} ORDER BY {$this->order} LIMIT {$this->limit}");
    }

    public function tableName()
    {
        return get_class($this);
    }

    protected function query($sql)
    {
        $db = $this->db;
        return $db->query($sql)->fetchObject();
    }
}

