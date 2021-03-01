@extends('layout.admin')

@section('title', 'Tasks List')

@section('content')
    <h1>List</h1>
    <a href="{{ route('add')  }}">Add</a>
    @if(count($list) > 0)
        <ul>
            @foreach($list as $item)
                <li>
                    <a href="{{ route('done', $item->id) }}"> [@if($item->done == true) done @else to do @endif ]</a>
                    {{ $item->title }}
                    <a href="{{ route('edit', $item->id) }}">[ edit ] </a>
                    <a href="{{ route('del', $item->id) }}" onclick="return confirm('Dou you have sure?')">[ delete ] </a>
                </li>
            @endforeach
        </ul>
    @else
        <br>
        Nothing yet.
    @endif

@endsection
