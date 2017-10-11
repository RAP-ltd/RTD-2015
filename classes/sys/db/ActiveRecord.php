<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 14:08
 */


namespace sys\db;


use sys\web\Model;

class ActiveRecord extends Model
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

    protected function where($cond = null)
    {
        if (is_string($cond)) {
            $this->conditions = $cond;
        } elseif (is_array($cond)) {
            $this->conditions = $this->conditionsToString($cond);
        }
    }

    /**
     * @param null $conds
     * @return null|string
     */
    protected function conditionsToString($conds = null)
    {
        $str = "";
        if (is_array($conds)) {
            $i = 0;
            foreach ($conds as $cond => $value) {
                $str .= ($i > 0 && $cond != 'OR' ? ' AND ' : '') . !is_array($value) ? "`{$cond}`='{$value}'" : (!is_numeric($cond) ? " {$cond} " : null) . '(' . $this->conditionsToString($value) . ')';
            }
        } else {
            return "Error! \$conds type must be an array!";
        }
        return $str;
    }
}

