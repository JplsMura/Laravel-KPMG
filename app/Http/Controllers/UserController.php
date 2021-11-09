<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;

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

        if(session('msgError')){
            return $user;
        }

        return redirect()->route('index')->with('msg', 'Usuário criado com sucesso!');

    }

    public function edit($id)
    {
        $dados = $this->userService->searchUser($id);

        if(session('msgError')){
            return $dados;
        }

        return view('usuarios.update', ['dados' => $dados]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $dados = $this->userService->updateUser($request->validated(), $id);

        if(session('msgError')){
            return $dados;
        }

        return redirect()->route('index')->with('msg', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $dados = $this->userService->deleteUser($id);

        return redirect()->route('index')->with('msg', 'Usuário excluído com sucesso!');
    }
}
