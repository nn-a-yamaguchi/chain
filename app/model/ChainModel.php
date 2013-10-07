<?php

class ChainModel {
    function __construct() {
        $this->_Arel = new Arel(get_class($this));
        
        $this->_Arel->belongs_to($this->belongs_to);
        $this->_Arel->has_one($this->has_one);
        $this->_Arel->has_many($this->has_many);
        
    }
    
    function find() {
        return $this->_Arel->find();
    }
}

class Arel {
    public $class_name;
    function __construct($class_name) {
        $this->class_name = $class_name;
        
        $this->_setTableName();
    }
    
    private function _setTableName() {
        $this->table_name = substr(strtolower(preg_replace("/([A-Z]{1})/", '_$1', $this->class_name)), 1);
    }
    
    public function has_one($has_one) {
        
    }
    
    public function has_many($has_many) {
        
    }
    
    public function belongs_to($belongs_to) {

    }
    
    public function toSql() {
        $this->sql = sprintf("select * from %s", $this->table_name);
    }
    
    public function find() {
        $this->toSql();
        return $this->sql;
    }
}