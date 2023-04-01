<?php

// RESTful API: comunicação via JSON
define("ROOT", dirname(__FILE__));

// Adiciona configurações do app
require ROOT . "/config/app.php";

// Adicionar peças do sistema
require ROOT . "/libs/shared/Request.php";
require ROOT . "/libs/shared/Response.php";

// Identificar qual o módulo o cliente está requisitamdo
$module = Request::get("url");

// Verificar se o módulo requisitado existe
if (!is_dir(ROOT . "/libs/modules/{$module}")) {
    Response::sendNotFound();
}

// Invoca o manipulador responsável pelo módulo (endpoint)
require ROOT . "/libs/modules/{$module}/Handler.php";
$handler = new Handler();
$handler->run();
