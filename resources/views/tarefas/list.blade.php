@extends('layouts.admin')

@section('title', 'Listagem de tarefas')

@section('content')
    <h1>Listagem</h1>
    <a href="{{ route('tarefas.add')  }}">Adicionar</a>
    @if(count($list) > 0)
        <ul>
            @foreach($list as $item)
                <li>
                    <a href="{{ route('tarefas.done')  }}"> [@if($item->resolvido ===true) desmarcar @else marcar @endif ]</a>
                    {{ $item->titulo }}
                    <a href="{{ route('tarefas.edit')  }}">[ editar ] </a>
                    <a href="{{ route('tarefas.del')  }}" onclick="return confirm('Tem certeza que deseja excluir?')">[ excluir ] </a>
                </li>
            @endforeach
        </ul>
    @else
        Não há itens.
    @endif

@endsection
