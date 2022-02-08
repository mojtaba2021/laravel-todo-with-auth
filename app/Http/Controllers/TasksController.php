<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
//        $tasks = Task::all()->sortDesc();
//        $trashed = Task::onlyTrashed()->get()->sortDesc();
        $tasks =Task::withTrashed()->get();
        return view('tasks.todo',compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
        $title = $request->validated();

        Task::create($title);
        return back();
    }

    public function destroy(Task $task)
    {

        $task->delete();
        return back();
    }
    public function restore($id)
    {
        Task::withTrashed()->find($id)->restore();
        //$trash->restore();
        return back();
    }

    public function edit(Task $id)
    {

        $tasks = Task::all()->sortDesc();
        $task = Task::find($id)->first();
        return view('tasks.edit',compact('task'))->with('tasks',$tasks);
    }
    public function update(TaskRequest $request,Task $id)
    {

        $task = Task::find($id)->first();
        $req = $request->validated();
        $task->title = $req['title'];
        $task->save();
        //$tasks = Task::all()->sortDesc();
        return redirect('tasks');
    }
}
