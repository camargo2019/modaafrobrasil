<?php
//Gabriel CMR - Desenvolvimentos
// Plagio e Crime

use Dcblogdev\PdoWrapper\Database;

$options = [
    'username' => $usuario,
    'database' => $db,
    'password' => $senha,
    'host' => $servidor
];

$db = new Database($options);