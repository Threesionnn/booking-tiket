<?php
require_once __DIR__.'/config/database.php';
require_once __DIR__.'/controllers/HomeController.php';

$request_uri = $_SERVER['REQUEST_URI'];
$base_path = '/booking-tiket';
$path = str_replace($base_path, '', parse_url($request_uri, PHP_URL_PATH));
$path = trim($path, '/');

if ($path === '' || $path === 'home') {
    $page = 'home';
    $id = null;
} else {
    $parts = explode('/', $path);
    $page = $parts[0];
    $id = $parts[1] ?? null;
    if (isset($parts[2])) {
        $page .= '/' . $parts[1];
        $id = $parts[2] ?? null;
    }
}

switch ($page) {
    case 'home':
    default:
        $controller = new HomeController($pdo);
        $controller->index();
        break;

    case 'movie':
        require_once __DIR__.'/controllers/MovieController.php';
        $controller = new MovieController($pdo);
        $controller->detail($id);
        break;
    
    case 'login':
        require_once __DIR__.'/controllers/AuthController.php';
        $controller = new AuthController($pdo);
        $controller->login();
        break;

    case 'register':
        require_once __DIR__.'/controllers/AuthController.php';
        $controller = new AuthController($pdo);
        $controller->register();
        break;

    case 'logout':
        require_once __DIR__.'/controllers/AuthController.php';
        $controller = new AuthController($pdo);
        $controller->logout();
        break;
    
    case 'user':
        if (($id ?? '') === 'dashboard') {
            require_once __DIR__.'/controllers/UserController.php';
            $controller = new UserController($pdo);
            $controller->dashboard();
            break;
        }

    case 'booking':
        require_once __DIR__.'/controllers/BookingController.php';
        $controller = new BookingController($pdo);
        $controller->index($id);
        break;

    case 'payment':
        require_once __DIR__.'/controllers/PaymentController.php';
        $controller = new PaymentController($pdo);
        $controller->index($id);
        break;

    case 'admin':
        require_once __DIR__.'/controllers/AdminController.php';
        $controller = new AdminController($pdo);
        if ($id === 'dashboard') {
            $controller->dashboard();
        } else {
        $controller->index();
        }
        break;

    case 'admin/movies':
        require_once __DIR__.'/controllers/AdminController.php';
        $controller = new AdminController($pdo);
        $controller->movies();
        break;
}