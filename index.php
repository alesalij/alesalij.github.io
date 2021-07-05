<?php
#http://alsal.atwebpages.com/
//https://api.telegram.org/bot1821097852:AAEaRyAbSd8jYPqmGBQZIYdBSdvl0GgKK0o/setwebhook?url=http://alsal.atwebpages.com/index.php
//https://api.telegram.org/bot1821097852:AAEaRyAbSd8jYPqmGBQZIYdBSdvl0GgKK0o/deleteWebhook
require __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;

$url = 'http://alsal.atwebpages.com/index.php';
$token = '';
//$urlbot = "https://api.telegram.org/bot' . TOKEN . '/' . $method";
$data = json_decode(file_get_contents('php://input'), TRUE);
//пишем в файл лог сообщений
file_put_contents('file.txt', '$data: ' . print_r($data, 1) . "\n", FILE_APPEND);

$app = AppFactory::create();

$app->add(function (Request $request, RequestHandler $handler) {
    file_put_contents('file.txt', '$get: ' . print_r($request, 1) . "\n", FILE_APPEND);
});
$app->get('/{name}', function (Request $request, Response $response, array $args) {
    $data = $args['name'];
    file_put_contents('file.txt', '$get: ' . print_r($data, 1) . "\n", FILE_APPEND);
});

$app->post('/{name}', function ($request, $response, array $args) {
    $data = $args['name'];
    file_put_contents('file.txt', '$post: ' . print_r($data, 1) . "\n", FILE_APPEND);
});

$app->put('/{name}', function ($request, $response, array $args) {
    $data = $args['name'];
    file_put_contents('file.txt', '$put: ' . print_r($data, 1) . "\n", FILE_APPEND);
});
$app->delete('/{name}', function ($request, $response, array $args) {
    $data = $args['name'];
    file_put_contents('file.txt', '$delete: ' . print_r($data, 1) . "\n", FILE_APPEND);
});
$app->options('/{name}', function ($request, $response, array $args) {
    $data = $args['name'];
    file_put_contents('file.txt', '$options: ' . print_r($data, 1) . "\n", FILE_APPEND);
});
$app->any('/{name}', function ($request, $response, array $args) {
    $data = $args['name'];
    file_put_contents('file.txt', '$any: ' . print_r($data, 1) . "\n", FILE_APPEND);
});
$app->run();
