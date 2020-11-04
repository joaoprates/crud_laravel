<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function list(){

        $list = DB::select('select * from tarefas');

        return view('tarefas.list', [
            'list' => $list
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){

        if ($request->filled('titulo')) {
            $title = $request->input('titulo');

            DB::insert('insert into tarefas (titulo) values (:titulo)', [
                'titulo' => $title
            ]);

            return redirect()->route('tarefas.list');

        } else {
            return redirect()
                ->route('tarefas.add')
                ->with('warning', 'Você não preencheu o título.');
        }

    }

    public function edit($id){

        $data = DB::select('select * from tarefas where id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0) {
            return view('tarefas.edit', [
                'data' => $data[0]
            ]);

        } else {
            return redirect()->route('tarefas.list');
        }

    }

    public function editAction(Request $request, $id){
        if($request->filled('titulo')) {
            $titulo = $request->filled('titulo');

            $data = DB::select('select * from tarefas where id = :id', [
                'id' => $id
            ]);

            if(count($data) > 0) {
                DB::update('update tarefas set titulo = :titulo where id =:id', [
                    'id' => $id,
                    'titulo' => $titulo
                ]);
            }

            return redirect()->route('tarefas.list');
        } else {

            return redirect()
                ->route('tarefas.edit', ['id'=>$id])
                ->width('warning', 'Você não preencheu o título.');
        }
    }

    public function del($id){

        DB::delete('delete from tarefas where id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');


    }

    public function done($id){

        DB::update('update tarefas set resolvido = 1 - resolvido where id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');

    }
}
