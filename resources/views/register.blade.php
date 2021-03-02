@extends('layouts.admin')

@section('title', 'Register')

@section('content')
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <form method="POST">
            @csrf
            <input type="name" name="name" placeholder="name" value="{{ old('name') }}"/><br><br>
            <input type="email" name="email" placeholder="email" value="{{ old('email') }}"/>
            <input type="password" name="password" placeholder="password"/><br><br>
            <input type="password" name="password_confirmation" placeholder="password confirmation"/><br><br>

            <input type="submit" value="login">
        </form>
@endsection
