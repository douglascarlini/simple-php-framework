<?php

require ROOT . "/libs/modules/products/Repository.php";
require ROOT . "/libs/modules/products/Category.php";
require ROOT . "/libs/database/Database.php";

class Handler
{
    private $_repo;

    public function __construct()
    {
        $this->_repo = new Repository();
    }

    public function run()
    {
        switch (Request::method()) {
            case "GET":
                $id = (int)Request::get("id");
                if ($id > 0)
                    return $this->read($id);
                return $this->list();
            case "POST":
                return $this->create();
            case "DELETE":
                return $this->delete();
        }
    }

    public function create()
    {
        try {
            $input = Request::input();
            $this->_repo->create($input);
            Response::sendCreated();
        } catch (Exception $ex) {
            Response::sendError($ex->getMessage());
        }
    }

    public function delete($id = 0)
    {
        Response::sendCreated();
    }

    public function list()
    {
        $list = $this->_repo->list();
        Response::sendData($list);
    }

    public function read($id = 0)
    {
        $item = $this->_repo->read($id);
        Response::sendData($item);
    }
}
