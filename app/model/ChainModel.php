<?php

class ChainModel {

    public $belongs_to;
    public $has_many;
    public $has_one;

    function __construct() {
        $this->_Arel = new Arel();
        $this->_Arel->setObject($this);
    }

    function find() {
        return $this->_Arel->find();
    }

    function where($where) {
        $this->_Arel->where($where);
        return $this;
    }
    
    function whereNot($where) {
        $this->_Arel->whereNot($where);
        return $this;
    }

}

class Arel {
    public function setObject($object) {
        $this->object = $object;

        $this->class_name = get_class($object);
        $this->table_name = substr(strtolower(preg_replace("/([A-Z]{1})/", '_$1', $this->class_name)), 1);

        $this->belongs_to = $this->object->belongs_to;
        $this->has_one = $this->object->has_one;
        $this->has_many = $this->object->has_many;
    }

    public function toSql() {
        $sql = sprintf("select * from %s", $this->table_name);
        $sql .= $this->_getWhere();


        print("\n" . $sql . "\n");
        $this->sql = $sql;
    }
    


    private function _getWhere() {
        if (count($this->where) == 0) {
            return "";
        }
        
        return "where ". implode(' and ', $this->where);
    }

    public function find() {
        $this->toSql();
        return $this->sql;
    }
    
    public function whereNot($where) {
        $this->not = true;
        $this->where($where);
        return $this;
    }
    
    public function where($where) {
            $whereSql = array();
            
            $delimiter = $this->not ? '!=' : '=';
            $this->not = false;
            foreach ($where as $field => $value) {
                $whereSql[] = sprintf("%s %s %s", $field, $delimiter, $value);
            }

            $this->where[] = '(' . implode(' and ', $whereSql) . ')';

        return $this;
    }

}