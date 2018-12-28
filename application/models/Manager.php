<?php

class Application_Model_Manager
{
    protected $_dbTable;
    protected $_row;

    public function __construct($id = null)
    {
        $this->_dbTable = new Application_Model_DbTable_Managers();
        if ($id){
            $this->_row = $this->_dbTable->find($id)->current() ;
        } else {
            $this->_row = $this->_dbTable->createRow();
        }
    }

    public function getAllManagers()
    {
        return $this->_dbTable->fetchAll();
    }

    public function fill($data)
    {
        foreach ($data as $key => $value){
            if (isset($this->_row->$key)){
                $this->_row->$key = $value;
            }
        }

    }

    public function save()
    {
        $this->_row->save();
    }

    public function delete()
    {
        $this->_row->delete();
    }

    public function __set($name, $value)
    {
        if (isset($this->_row->$name)){
            $this->_row->$name = $value;
        }
    }

    public function __get($name)
    {
        if (isset($this->_row->$name)){
            return $this->_row->$name;
        }
        return 0;
    }

}