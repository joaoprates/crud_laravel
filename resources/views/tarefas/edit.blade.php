@extends('layouts.admin')

@section('title', 'Editar tarefas')

@section('content')
    <h1>Editar</h1>

    @if(session('warning'))
        @alert
        {{ session('warning') }}
        @endalert
    @endif

    <form method="POST">
        @csrf

        <label>
            Titúlo:<br>
            <input type="text" name="title" value="{{ $data->titulo }}">
        </label>

        <input type="submit" name="Salvar">
    </form>
@endsection
