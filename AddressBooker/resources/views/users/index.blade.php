@extends('layouts.app')

@section('content')
<h1>Usuários Cadastrados</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary">Novo Usuário</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>CEP</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address->logradouro ?? '-' }}</td>
            <td>{{ $user->address->cep ?? '-' }}</td>
            <td>{{ $user->address->cidade ?? '-' }}</td>
            <td>{{ $user->address->estado ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection