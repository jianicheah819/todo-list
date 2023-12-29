<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();  // Fetch tasks from the model
        return view('task.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'priority' => 'required',
            'status' => 'required'
        ]);
        try {
            $storeTask = new Task();
            $storeTask->title = $request->title;
            $storeTask->desc = $request->desc;
            $storeTask->priority = $request->priority;
            $storeTask->status = $request->status;
            $storeTask->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('task.create')->with('error','Data unable to save');
        } 
        return redirect()->route('task.index')->with('success','Data saved successfully');
    }

    public function show(Task $task)
    {
        return view('task.show',compact('task'));
    }

    public function edit(Task $task)
    {
        return view('task.edit',compact('task'));
    }

    public function update(Request $request, Task $task)
    {    
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'priority' => 'required',
            'status' => 'required'
        ]);
        try {
            $task->title = $request->title;
            $task->desc = $request->desc;
            $task->priority = $request->priority;
            $task->status = $request->status;
            $task->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('task.edit')->with('error','Data unable to update');
        } 
        return redirect()->route('task.index')->with('success','Data updated successfully');
    }

    public function destroy(Task $task)
    {
        try {
            $task->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('task.index')->with('error','Data unable to delete');
        } 
        return redirect()->route('task.index')->with('success','Data deleted successfully');
    }
}
