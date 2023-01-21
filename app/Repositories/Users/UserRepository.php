<?php


namespace App\Repositories\Users;


use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->query()->create($data);
    }

    public function findUserByPhone(string $phone)
    {
        return $this->model->query()->where('phone', $phone)->first();
    }

    public function getUserByToken(string $token)
    {
        return $this->model->query()->where('token', $token)->first();
    }
}
