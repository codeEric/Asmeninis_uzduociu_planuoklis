<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Status;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request()->session()->get('filterTasks', (object)['status_id' => null]);
        $tasks = Task::filter($filter)->latest('add_date')->get();
        return view('tasks.index', ['tasks' => $tasks, 'filter' => $filter]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'task_name' => 'required|min:3|max:16',
            'task_description' => 'required|min:3',
            'status_id' => 'required'
        ]);

        $attributes['add_date'] = Carbon::now();

        if (Status::find($attributes['status_id'])->name == "Finished") {
            $attributes['completed_date'] = Carbon::now();
        } else {
            $attributes['completed_date'] = null;
        }

        // dd($attributes);

        Task::create($attributes);

        return redirect('/tasks')->with('success', 'Task has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {

        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task)
    {
        $attributes = request()->validate([
            'task_name' => 'required|min:3|max:16',
            'task_description' => 'required|min:3',
            'status_id' => 'required',
        ]);

        if (Status::find($attributes['status_id'])->name == "Finished") {
            $attributes['completed_date'] = Carbon::now();
        } else {
            $attributes['completed_date'] = null;
        }

        $task->update($attributes);

        return redirect("/tasks")->with('success', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect("/tasks")->with('success', 'Task has been deleted');
    }

    public function search()
    {
        $filterTasks = new \stdClass();
        $filterTasks->status_id = request('status_id');
        request()->session()->put('filterTasks', $filterTasks);
        return redirect('/tasks');
    }
}
