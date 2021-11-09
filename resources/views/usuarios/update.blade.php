@extends('layout.main')

@section('title', 'Atualização usuário')

@section('content')

    <div class="container">

        <div class="m-3">
            <h2 class="text-center">
                Atualização usuário de Matricula ({{ $dados->registration }})
            </h2>
            <hr>
        </div>

        @if(session('msgError'))
                <p class="alert alert-danger msg text-center" role="alert">
                    {{ session('msgError')}}
                </p>
        @endif

        <form action="{{ route('update', ['id' => $dados->id]) }}"   method="POST" class="row m-3" class="form-signin">

            @csrf
            @method('PUT')

                <!--Nome-->
                <div class="form-group col-md-6">
                    <label for="name">Nome: </label>
                    <input type="text"
                           class="form-control @if ($errors->has('name')) is-invalid @endif"
                           id="name"
                           name="name"
                           value="{{ $dados->name }}"
                           placeholder="Digite o Nome"
                           required
                    >

                    <div class="invalid-feedback">
                        Este campo Nome é obrigatório.
                    </div>
                </div>

                <!--Matricula-->
                <div class="form-group col-md-6">
                    <label for="registration">Matricula: </label>
                    <input type="text"
                           class="form-control @if ($errors->has('registration')) is-invalid @endif"
                           id="registration"
                           name="registration"
                           value="{{ $dados->registration }}"
                           placeholder="Digite o Número de Matricula"
                           required
                    >

                    <div class="invalid-feedback">
                        Este campo Matricula é obrigatório.
                    </div>
                </div>

                <!--Email-->
                <div class="form-group col-md-8">
                    <label for="email">E-mail: </label>
                    <input type="text"
                           class="form-control @if ($errors->has('email')) is-invalid @endif"
                           id="email"
                           name="email"
                           value="{{ $dados->email }}"
                           placeholder="Digite o E-mail"
                           required
                    >

                    <div class="invalid-feedback">
                        Este campo E-mail é obrigatório.
                    </div>
                </div>

                <!--CPF-->
                <div class="form-group col-md-4">
                    <label for="cpf">CPF: </label>
                    <input type="text"
                           class="form-control @if ($errors->has('cpf')) is-invalid @endif"
                           id="cpf"
                           name="cpf"
                           value="{{ $dados->cpf }}"
                           placeholder="Digite o CPF"
                           required
                    >

                    <div class="invalid-feedback">
                        Este campo CPF é obrigatório.
                    </div>
                </div>

            <!--Botão de Cadastro-->
            <button type="submit" class="btn btn-primary btn-lg btn-block md-3">Atualizar</button>
        </form>

    </div>

@endsection
