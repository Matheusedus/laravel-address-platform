@extends('layouts.app')

@section('content')
<h1 class="mb-4">Usuários cadastrados</h1>
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered align-middle table-hover">
        <thead class="table-light">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CEP</th>
                <th>Endereço completo</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address->cep ?? '-' }}</td>
                <td>
                    @if($user->address)
                    {{ $user->address->logradouro ?? '-' }},
                    {{ $user->address->bairro ?? '-' }}
                    @else
                    -
                    @endif
                </td>
                <td>{{ $user->address->cidade ?? '-' }}</td>
                <td>{{ $user->address->estado ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhum usuário cadastrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Paginação, se houver --}}
@if (method_exists($users, 'links'))
<div class="d-flex justify-content-center my-4">
    {{ $users->links() }}
</div>
@endif
@endsection