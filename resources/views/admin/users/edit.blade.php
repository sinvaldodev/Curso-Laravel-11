@extends('admin.layouts.layouts.app')
@section('title', 'Editar o usuário')


@section('content')
<h1>Editar o usuário {{ $user->name }}</h1>
{{-- <x-alert /> --}}

{{-- Formulário de cadastro --}}
<form action=" {{ route('users.update', $user->id) }} " method="POST">
    @csrf()
    @method('PUT')
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    <input type="text" name="name" placeholder="Nome" value="{{ $user->name }}">
    <input type="email" name="email" placeholder="E-mail" value="{{ $user->email }}">
    {{-- <input type="password" name="password" placeholder="Senha"> --}}
    <button type="submit">Enviar</button>
</form>
@endsection
