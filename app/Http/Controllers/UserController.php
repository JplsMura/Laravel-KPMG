<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // OK
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

        $registration = User::where('matricula', $request->registration)->first();

        if($registration = null || $registration != ''){
            return back()->withInput()->with('msgError', 'Este Número de Matricula já existe, por favor tente outro !');
        }

        $email = User::where('email', $request->email)->first();

        if($email = null || $email != ''){
            return back()->withInput()->with('msgError', 'Este E-mail já existe, por favor tente outro !');
        }

        $user = new User;
        $user->name = $request->name;
        $user->matricula = $request->registration;
        $user->email = $request->email;
        $user->cpf = $request->cpf;

        $cpf = User::where('cpf', $user->cpf)->first();

        if($cpf = null || $cpf != ''){
            return back()->withInput()->with('msgError', 'Este CPF já existe, por favor tente outro !');
        }

        $user->save();
        return redirect()->route('index')->with('msg', 'Usuário criado com sucesso!');

    }

    public function edit($id)
    {
        $dados = User::find($id);

        if(!empty($dados)){
            return view('usuarios.update', ['dados' => $dados]);
        }else {
            return back()->withInput()->with('msgErro',
                    'Usuário não encontrado, por favor entre em contato com a área responsável !');
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        // REGISTRATION
        $registration = User::select("*")
                            ->where('matricula', $request->registration)
                            ->exists();

        if($registration === true){
            return back()->withInput()->with('msgError', 'Este Número de Matricula já existe, por favor tente outro !');
        }

        // EMAIL
        $email = User::select("*")
            ->where('email', $request->email)
            ->exists();

        if($email === true){
            return back()->withInput()->with('msgError', 'Este E-mail já existe, por favor tente outro !');
        }

        // CPF
        $cpf = User::select("*")
            ->where('cpf', $request->cpf)
            ->exists();

        if($cpf === true){
            return back()->withInput()->with('msgError', 'Este CPF já existe, por favor tente outro !');
        }

        $user = User::find($id);

        $user->name = $request->name;
        $user->matricula = $request->registration;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->save();

        return redirect()->route('index')->with('msg', 'Usuário atualizado com sucesso!');
    }

    // OK
    public function destroy($id)
    {
        $dado = User::find($id);
        $dado->delete();
        return redirect()->route('index')->with('msg', 'Usuário excluído com sucesso!');

    }
}
