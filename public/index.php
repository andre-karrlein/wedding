<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$app = new Slim\App();
$app->get('/{name}', function($request, $response, $args) {
	$factory = new ak1\wedding\Factory();
	return $response->write($factory->createMainPage()->getTemplate($args['name']));
});

$app->run();
