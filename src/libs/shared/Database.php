<?php

class Database
{
    private $_conn;
    private $_stmt;

    private $_host = DB_HOST;
    private $_port = DB_PORT;
    private $_user = DB_USER;
    private $_pass = DB_PASS;
    private $_name = DB_NAME;

    public function __construct()
    {
        $this->_conn = new PDO("mysql:host={$this->_host};port={$this->_port};dbname={$this->_name}", $this->_user, $this->_pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function query($sql, $binds = [])
    {
        $this->_stmt = $this->_conn->prepare($sql);
        $this->_stmt->execute($binds);
    }

    public function fetchAll()
    {
        return $this->_stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchRow()
    {
        return $this->_stmt->fetch(PDO::FETCH_OBJ);
    }
}
