<?php
declare(strict_types=1);

use App\Task5_6\Controllers\UserController;
use App\Task5_6\Repositories\MySQLUserRepository;
use App\Task5_6\Services\UserService;

require_once __DIR__ . '/../../vendor/autoload.php';

header('Content-Type: application/json');

$pdo = new PDO('mysql:host=localhost;dbname=effective', 'root', 'Rfgbnjirf5891');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userRepository = new MySQLUserRepository($pdo);
$userService = new UserService($userRepository);
$userController = new UserController($userService);

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace('/index.php', '', $uri);

if ($uri === '/users' && $method === 'GET') {
    echo json_encode($userController->index(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

if ($uri === '/email' && $method === 'GET') {
    echo json_encode($userController->getUserByEmail('grigo.ko2020@yandex.ru'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

http_response_code(404);
echo json_encode([
    'error' => 'Route not found'
]);