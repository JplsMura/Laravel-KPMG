@extends('layout.main')

@section('title', 'KPMG - Listagem de Dados')

@section('content')

    <div class="container">
        <div class="m-3">
            <h2 class="text-center">
                Listagem de Dados
            </h2>
            <hr>
        </div>
        @if (count($dados) > 0)

        @if(session('msg'))
                <p class="alert alert-success msg text-center" role="alert">
                    {{ session('msg')}}
                </p>
        @endif

            <table id="table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Matricula:</th>
                        <th scope="col">Nome:</th>
                        <th scope="col">E-mail:</th>
                        <th scope="col">CPF:</th>
                        <th scope="col">Editar:</th>
                        <th scope="col">Excluir:</th>
                    </tr>
                </thead>

                @foreach ($dados as $item)
                    <tr scope="row">
                        <td>{{ $item->registration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                    <td id="cpf" name="cpf">{{ $item->cpf }}</td>

                        <td class="text-center">
                            <a class="btn btn-primary" href="{{ route('edit', ['id' => $item->id]) }}" role="button">
                                Editar
                            </a>
                        </td>

                        <form action="{{ route('delete', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <td class="text-center">
                                <button type="submit" class="btn btn-danger" role="button">
                                    Excluir
                                </button>
                            </td>
                        </form>

                    </tr>
                @endforeach
            </table>
        @else
            <h1 class="text-center"
                style="font-size: 60px; margin-top: 30%">
                Sem dados a ser exibido
            </h1>
        @endif

    </div>

@endsection
