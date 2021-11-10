<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use App\User;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $dados = $this->userService->getDados();
        return view('usuarios.index', ['dados' => $dados]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->createNewUser($request->validated());

        if (session('msgError')) {
            return $user;
        }

        return redirect()->route('index')->with('msg', 'Usuário criado com sucesso!');
    }

    public function edit($id)
    {
        $dados = $this->userService->searchUser($id);

        if (session('msgError')) {
            return $dados;
        }

        return view('usuarios.update', ['dados' => $dados]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        // REGISTRATION
        $registration = User::select("*")
            ->where('registration', $request->registration)
            ->exists();

        if ($registration === true) {
           return back()->withFail('Este Número de Matricula já existe, por favor tente outro !');
        }

        // EMAIL
        $email = User::select("*")
            ->where('email', $request->email)
            ->exists();

        if ($email === true) {
            return back()->withFail('Este E-mail já existe, por favor tente outro !');
        }

        $user = str_replace('.' ,  '' , $request->cpf);
        $cpfClear = str_replace('-' ,  '' , $user);

        // CPF
        $cpf = User::select("*")
            ->where('cpf', $cpfClear)
            ->exists();

        if ($cpf === true) {
            return back()->withFail('Este CPF já existe, por favor tente outro !');
        }

        $dados = $this->userService->updateUser($request->validated(), $id);

        return redirect()->route('index')->with('msg', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $dados = $this->userService->deleteUser($id);

        return redirect()->route('index')->with('msg', 'Usuário excluído com sucesso!');
    }
}
