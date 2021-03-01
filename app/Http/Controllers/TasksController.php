<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class TasksController extends Controller
{
    public function list(){

        $list = DB::select('select * from tasks');

        return view('tasks.list', [
            'list' => $list
        ]);
    }

    public function add(){
        return view('tasks.add');
    }

    public function addAction(Request $request){

        $request->validate([
            'title' => [ 'required', 'string' ]
        ]);

        $title = $request->input('title');

        DB::insert('insert into tasks (title) values (:title)', [
            'title' => $title
        ]);

        return redirect()->route('list');
    }

    public function edit($id){

        $data = DB::select('select * from tasks where id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0) {
            return view('tasks.edit', [
                'data' => $data[0]
            ]);

        } else {
            return redirect()->route('list');
        }

    }

    public function editAction(Request $request, $id){
        $request->validate([
            'title' => [ 'required', 'string' ]
        ]);

        $title = $request['title'];

        $data = DB::select('select * from tasks where id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0) {
            DB::update('update tasks set title = :title where id =:id', [
                'id' => $id,
                'title' => $title
            ]);
        }

        return redirect()->route('list');
    }

    public function del($id){

        DB::delete('delete from tasks where id = :id', [
            'id' => $id
        ]);

        return redirect()->route('list');
    }

    public function done($id){

        $data = DB::select('select * from tasks where id = :id', [
            'id' => $id
        ]);
        $done = !$data[0]->done;


        DB::update('update tasks set done = :done where id = :id', [
            'id' => $id,
            'done' => $done
        ]);

        /*DB::update('update tasks set done = 1 - done where id = :id', [
            'id' => $id
        ]);*/

        return redirect()->route('list');

    }
}
