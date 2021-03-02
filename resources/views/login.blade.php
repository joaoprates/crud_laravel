@extends('layouts.admin')

@section('title', 'Login')

@section('content')
    @if(Session::has('warning'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
    <form method="POST">
        @csrf
        <input type="email" name="email" placeholder="email"><br><br>
        <input type="password" name="password" placeholder="password">br><br><br>

        <input type="submit" value="login">
    </form>
@endsection
