@extends('admin.layouts.layouts.app')
@section('title', 'Criar novo usuário')


@section('content')
<h1>Novo Usuário</h1>


{{-- Verificação de erro --}}
@if ($errors->any())
    <ul>
        @foreach ( $errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{-- Formulário de cadastro --}}
<form action=" {{ route('users.store') }} " method="POST">
    @csrf()
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    <input type="text" name="name" placeholder="Nome">
    <input type="email" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit">Enviar</button>
</form>
@endsection
