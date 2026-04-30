<?php
require_once(__DIR__ . "/app/controllers/AuthController.php");

$controller = new AuthController();

$page = $_GET['page'] ?? 'login';

switch ($page) {

    case 'signup':
        $controller->signup();
        break;

    case 'login':
        $controller->login();
        break;

    case 'dashboard':
        $controller->dashboard();
        break;

    case 'logout':
        $controller->logout();
        break;

    default:
        echo "404 Not Found";
}
?>