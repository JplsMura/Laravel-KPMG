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
        // REGISTRATION
        $registration = User::select('*')
                            ->where('registration', $data['registration']
                            )->exists();

        if($registration === true){
            return back()->withInput()->with('msgError', 'Este Número de Matricula já existe, por favor tente outro !');
        }

        // EMAIL
        $email = User::select('*')
                        ->where('email', $data['email'])
                        ->exists();

        if($email === true){
            return back()->withInput()->with('msgError', 'Este E-mail já existe, por favor tente outro !');
        }

        return $this->repository->createNewCourse($data);
    }

    public function searchUser(string $id)
    {
        $dados = $this->repository->searchUser($id);

        if(!empty($dados)){
            return $dados;
        }else {
            return back()->withInput()->with('msgErro',
                    'Usuário não encontrado, por favor entre em contato com a área responsável !');
        }
    }

    public function updateUser(array $data, string $id)
    {
        // REGISTRATION
        $registration = User::select("*")
                            ->where('registration', $data['registration'])
                            ->exists();

        if($registration === true){
            return back()->withInput()->with('msgError', 'Este Número de Matricula já existe, por favor tente outro !');
        }

        // EMAIL
        $email = User::select("*")
                    ->where('email', $data['email'])
                    ->exists();

        if($email === true){
            return back()->withInput()->with('msgError', 'Este E-mail já existe, por favor tente outro !');
        }

        // CPF
        $cpf = User::select("*")
                    ->where('cpf', $data['cpf'])
                    ->exists();

        if($cpf === true){
            return back()->withInput()->with('msgError', 'Este CPF já existe, por favor tente outro !');
        }

        return $this->repository->updateUser($data, $id);
    }

    public function deleteUser(string $id)
    {
        return $this->repository->deleteUser($id);
    }
}