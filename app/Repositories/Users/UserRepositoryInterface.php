<?php


namespace App\Repositories\Users;


interface UserRepositoryInterface
{
    public function create(array $data);
    public function findUserByPhone(string $phone);
    public function getUserByToken(string $token);
}
