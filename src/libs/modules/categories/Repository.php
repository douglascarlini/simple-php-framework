<?php

class Repository
{
    private $_db;
    private $_table = "categories";

    public function __construct()
    {
        $this->_db = new Database();
    }

    public function create($data)
    {
        $this->_db->query("INSERT INTO {$this->_table} (name) VALUES (?)", [$data->name]);
    }

    public function list()
    {
        $this->_db->query("SELECT * FROM {$this->_table}");
        return $this->_db->fetchAll();
    }

    public function read($id)
    {
        $this->_db->query("SELECT * FROM {$this->_table} WHERE id = ?", [$id]);
        return $this->_db->fetchRow();
    }
}
