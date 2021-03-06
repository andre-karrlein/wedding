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

$app->get('/admin', function(Request $request, Response $response, array $args) use ($factory) {

    $result = $factory->createAdminHandler()->showResults();

    return $response->write($result);
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

    $route = '/guest/' . $username;

    return $response->withRedirect($route);
});

$app->post('/save', function(Request $request, Response $response, array $args) use ($factory) {
    if (!$_SESSION['loggedin']) {
        return $response->withRedirect('/');
    }

    $data = $request->getParsedBody();

    $factory->createDataSaver()->save($data);

    $route = '/guest/' . $_SESSION['user'] . '?success=true';

    return $response->withRedirect($route);
});

$app->get('/guest/{name}', function(Request $request, Response $response, array $args) use ($factory) {

    if (!$_SESSION['loggedin']) {
        return $response->withRedirect('/');
    }

    $page = $factory->createMainPage()->getTemplate($args['name']);

    $success = $request->getQueryParams()['success'];

    $notification = '';

    if ($success === 'true') {
        $notification = '<div class="alert alert-success" role="alert">Erfolgreich angemeldet!</div>';
    }

    $page = str_replace('%notify%', $notification, $page);

	return $response->write($page);
});

$app->run();
