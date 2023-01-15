<?php

declare(strict_types=1);

use App\Infrastructure\Persistence\User\SQLUserRepository;
use App\Infrastructure\Persistence\Message\SQLMessageRepository;
use App\Domain\User\UserRepository;
use App\Domain\Message\MessageRepository;
use Psr\Container\ContainerInterface;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => function (ContainerInterface $c) {
            return new SQLUserRepository($c->get('db')->table('users'));
        },

        MessageRepository::class => function (ContainerInterface $c) {
            return new SQLMessageRepository($c->get('db')->table('messages'));
        },
    ]);
};
