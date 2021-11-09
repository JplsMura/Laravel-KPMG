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

    public function createNewCourse(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->registration = $data['registration'];
        $user->email = $data['email'];
        $user->cpf = $data['cpf'];

        $cpf = User::select('*')
                    ->where('cpf', $user->cpf)
                    ->exists();

        if($cpf === true){
            return back()->withInput()->with('msgError', 'Este CPF já existe, por favor tente outro !');
        }

        $user->save();
        return $user;
    }
}