<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

class LoginUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $body = $this->request->getParsedBody();
        $username = $body['username'];
        $password = $body['password'];
        $user = $this->userRepository->loginUser($username, $password);
        $token = JWT::encode(['id' => $user->id, 'username' => $user->username], getenv('JWT_SECRET'), "HS256");
        return $this->respondWithData($token);
    }
}
