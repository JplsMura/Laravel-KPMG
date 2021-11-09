<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $dadoRepository)
    {
        $this->repository = $dadoRepository;
    }

    public function getDados()
    {
        return $this->repository->getAllData();
    }
}