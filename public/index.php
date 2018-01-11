<?php declare(strict_types=1);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use ak1\wedding\Factory;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$factory = Factory();

$app = new Slim\App();

$app->get('/', function(Request $request, Response $response, array $args) use ($factory) {
    return $response->write('');
});

$app->post('/login', function(Request $request, Response $response, array $args) use ($factory) {

    $data = $request->getParsedBody();
    $username = filter_var($data['username'], FILTER_SANITIZE_STRING);

    $_SESSION['loggedin'] = true;

    $route = '/' . $username;

    return $response->withRedirect($route);
});

$app->get('/{name}', function(Request $request, Response $response, array $args) use ($factory) {

    if (!$_SESSION['loggedin']) {
        return $response->withRedirect('/');
    }

	return $response->write($factory->createMainPage()->getTemplate($args['name']));
});

$app->run();

session_destroy();
