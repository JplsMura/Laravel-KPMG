@extends('layout.main')

@section('title', 'Cadastro de novos usuários')

@section('content')

    <div class="container">

        <div class="m-3">
            <h2 class="text-center">
                Cadastro de usuário
            </h2>
            <hr>
        </div>

        @if(session('msgError'))
            <p class="alert alert-danger msg text-center" role="alert">
                {{ session('msgError') }}
            </p>
        @endif

        <form action="{{ route('create.record') }}"  method="POST" class="row m-4" class="form-signin">

            @csrf

                <!--Nome-->
                <div class="form-group col-md-6">
                    <label for="name">Nome: </label>
                    <input type="text"
                           class="form-control @if ($errors->has('name')) is-invalid @endif"
                           id="name"
                           name="name"
                           value="{{ old('name')}}"
                           placeholder="Digite o Nome"
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
                           value="{{ old('registration')}}"
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
                    <input type="email"
                           class="form-control @if ($errors->has('email')) is-invalid @endif"
                           id="email"
                           name="email"
                           value="{{ old('email')}}"
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
                           value="{{ old('cpf')}}"
                           placeholder="Digite o CPF"
                           required
                           onkeyup="cpfCheck(this)"
                           maxlength="18"
                           onkeydown="javascript: fMasc( this, mCPF )"

                    >
                    <span id="cpfResponse"></span>

                    <div class="invalid-feedback">
                        Este campo CPF é obrigatório.
                    </div>
                </div>

            <!--Botão de Cadastro-->
            <button type="submit" class="btn btn-primary btn-lg btn-block md-3">Cadastrar</button>
        </form>

    </div>

@endsection
