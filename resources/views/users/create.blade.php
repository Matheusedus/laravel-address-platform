@extends('layouts.app')

@section('content')
<h1>Cadastrar Novo Usuário</h1>
@if($errors->any())
<div class="alert alert-danger">
    <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Nome</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
    </div>
    <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
    </div>
    <div class="mb-2">
        <label>Senha</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>CEP</label>
        <input type="text" name="cep" class="form-control" required value="{{ old('cep') }}">
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@endsection
