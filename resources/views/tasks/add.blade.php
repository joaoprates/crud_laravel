@extends('layouts.admin')

@section('title', 'Add task')

@section('content')
    <h1>Add</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endif

    <form method="POST">
        @csrf
        <label>
            <br>
            Title:
            <br>
            <input type="text" name="title">
        </label>

        <input type="submit" name="Add">
    </form>
@endsection
