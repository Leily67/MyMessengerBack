<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;
use App\Domain\User\UserNotFoundException;

use App\Domain\User\UserRepository;

class SQLUserRepository implements UserRepository
{
    public function __construct(\Illuminate\Database\Query\Builder $table)
    {
        $this->table = $table;
    }

    public function findAll()
    {
        return $this->table->select()->get();
    }

    public function findUserOfId(int $id)
    {
        $users = $this->table->select()->where('id', $id)->get();
        if(count($users) > 0){
            return $users[0];
        }
        else{
            throw new UserNotFoundException();
        } 
    }

    public function createUser($user)
    {
        $id = $this->table->insertGetId($user);
        return $this->findUserOfId($id); 
    }

    public function loginUser($username, $password)
    {
        $users = $this->table->select()->where('username', $username)->where('password', $password)->get();
        if(count($users) > 0){
            return $users[0];
        }
        else{
            throw new UserNotFoundException();
        } 
    }
}
