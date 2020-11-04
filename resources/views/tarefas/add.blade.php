@extends('layouts.admin')

@section('title', 'Adicionar tarefas')

@section('content')
    <h1>Adicionar</h1>

    @if(session('warning'))
        @alert
            {{ session('warning') }}
        @endalert
    @endif

    <form method="POST">
        @csrf

        <label>
            Titúlo:<br>
            <input type="text" name="title">
        </label>

        <input type="submit" name="Adicionar">
    </form>
@endsection
