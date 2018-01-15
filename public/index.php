<?php declare(strict_types=1);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use ak1\wedding\Factory;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$factory = new Factory();

$app = new Slim\App();

$app->get('/', function(Request $request, Response $response, array $args) use ($factory) {
    return $response->write($factory->createLoginPage()->getTemplate());
});

$app->post('/login', function(Request $request, Response $response, array $args) use ($factory) {

    $data = $request->getParsedBody();
    $password = filter_var($data['username'], FILTER_SANITIZE_STRING);

    $username = $factory->createLoginHandler()->login($password);

    if ($username === '') {
        return $response->withRedirect('/');
    }

    $_SESSION['loggedin'] = true;
    $_SESSION['user'] = $username;

    $route = '/' . $username;

    return $response->withRedirect($route);
});

$app->post('/save', function(Request $request, Response $response, array $args) use ($factory) {
    if (!$_SESSION['loggedin']) {
        return $response->withRedirect('/');
    }

    $data = $request->getParsedBody();

    $factory->createDataSaver()->save($data);

    $route = '/' . $_SESSION['user'];

    return $response->withRedirect($route);
});

$app->get('/{name}', function(Request $request, Response $response, array $args) use ($factory) {

    if (!$_SESSION['loggedin']) {
        return $response->withRedirect('/');
    }

	return $response->write($factory->createMainPage()->getTemplate($args['name']));
});

$app->run();
