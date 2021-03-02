@extends('layouts.admin')

@section('title', 'Edit task')

@section('content')
    <h1>Edit</h1>

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
            <input type="text" name="title" value="{{ $data->title }}">
        </label>

        <input type="submit" name="Save">
    </form>
@endsection
