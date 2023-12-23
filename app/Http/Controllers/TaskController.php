<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    
    //listar as tarefas de um usuário
    public function index () {

        //ORM - select * from tasks where user_id = id;
        $id = Auth::id();
        $tarefas = Task::where('user_id', $id)->get();
        $tarefas_compartilhada = DB::table('tasks')
            ->join('sharedtasks','tasks.id','=','sharedtasks.task_id')
            ->select('tasks.*')
            ->where('sharedtasks.user_id','=',$id)
            ->get();
        // ('select * from tasks where id = (select task_id from sharedtasks where user_id = ?)',[$id]);

        return view('task.index', [
            'lista' => $tarefas,
            'tasks' => $tarefas_compartilhada,
        ]);
    }

    //acessar formulário para criar tarefa
    public function create () {
        return view ('task.create');
    }

    //receber formulário e salvar dados
    public function store (Request $request) {

        $request->validate ([
            'description' => 'required',
        ], [
            'description' => 'obrigatório',
        ]);

        $task = new Task;
        $task->description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect('/tasks');
    }

    //model binding
    public function edit (Request $request, Task $task) {    
        $users = DB::table('users')->get();                    
        return view('task.edit', [
            'tarefa' => $task,
            'users' => $users
        ]);
    }

    //model binding
    public function update(Request $request, Task $task) {
        
        $resultado = Validator::make($request->all(), [
            'description' => 'required|min:10',
        ]);

        if ($resultado->fails()) {
            return redirect(url("/tasks/$task->id/edit"))
                ->withErrors($resultado);
        }

        $desc = $request->description;
        $task->description = $desc;
        $task->save();

        return redirect ( url('tasks'));

    }

    public function show (Request $request, Task $task) {
        return view('task.show', [
            'tarefa' => $task
        ]);
    }

    public function share (Request $request){

        $user_id = $request->user_id;
        $task_id = $request->task_id;
        if($user_id==Auth::id()){
            return redirect("/tasks/$task_id/edit");
        }
        if(DB::select("select * from sharedtasks where task_id = $task_id and user_id = $user_id")){
            return redirect("/tasks/$task_id/edit");
        }

        DB::insert('insert into sharedtasks (user_id,task_id) values(?,?)',[$user_id,$task_id]);

        return redirect('/tasks');
    }

}
