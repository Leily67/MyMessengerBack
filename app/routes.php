<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\RegisterUserAction;
use App\Application\Actions\User\LoginUserAction;
use App\Application\Actions\Message\ListUserMessagesAction;
use App\Application\Actions\Message\ViewMessageAction;
use App\Application\Actions\Message\CreateMessageAction;
use App\Application\Actions\Message\EditMessageAction;
use App\Application\Actions\Message\DeleteMessageAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/messages', function (Group $group) {
        $group->get('', ListMessagesAction::class);
        $group->get('/{id}', ViewMessageAction::class);
        $group->post('', CreateMessageAction::class);
        $group->put('/{id}', EditMessageAction::class);
        $group->delete('/{id}', DeleteMessageAction::class);

    });

    $app->get('/users/{id}/messages', ListUserMessagesAction::class);

    $app->post('/register', RegisterUserAction::class);

    $app->post('/login', LoginUserAction::class);
};
