<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class TasksController extends Controller
{
    public function list(){

        $list = Task::all();

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

        $task  = new Task;
        $task->title = $title;
        $task->save();

        return redirect()->route('list');
    }

    public function edit($id){
        $data = Task::find($id);

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

        Task::find($id)->update(['titulo'=>$title]);

        return redirect()->route('list');
    }

    public function del($id){

        Task::find($id)->delete();

        return redirect()->route('list');
    }

    public function done($id){

        $task  = Task::find($id);
        $task->title = 1 - $task->done;
        $task->save();

        return redirect()->route('list');

    }
}
