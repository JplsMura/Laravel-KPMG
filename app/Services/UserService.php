<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\User;

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

    public function createNewUser(array $data)
    {
        $registration = User::select('*')
                            ->where('registration', $data['registration']
                            )->exists();

        if($registration === true){
            return back()->withInput()->with('msgError', 'Este Número de Matricula já existe, por favor tente outro !');
        }

        $email = User::select('*')
                        ->where('email', $data['email'])
                        ->exists();

        if($email === true){
            return back()->withInput()->with('msgError', 'Este E-mail já existe, por favor tente outro !');
        }

        return $this->repository->createNewCourse($data);
    }
}