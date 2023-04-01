<?php

class Repository
{
    private $_db;
    private $_table = "products";

    public function __construct()
    {
        $this->_db = new Database();
    }

    public function create($data)
    {
        $this->_db->query("INSERT INTO {$this->_table} (name, category_id) VALUES (?, ?)", [$data->name, $data->category_id]);
    }

    public function list()
    {
        $this->_db->query("SELECT t.*, c.name as category FROM {$this->_table} t JOIN categories c ON c.id = t.category_id");
        return $this->_db->fetchAll();
    }

    public function read($id)
    {
        $this->_db->query("SELECT * FROM {$this->_table} WHERE id = ?", [$id]);
        return $this->_db->fetchRow();
    }
}
