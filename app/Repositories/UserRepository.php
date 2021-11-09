<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    protected $entity;

    public function __construct(User $data)
    {
        $this->entity = $data;
    }

    public function getAllData()
    {
        return $this->entity->get();
    }
}