@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Cadastrar Usuário</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('users.store') }}" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control" value="{{ old('cep') }}" required>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </div>
    </form>
@endsection