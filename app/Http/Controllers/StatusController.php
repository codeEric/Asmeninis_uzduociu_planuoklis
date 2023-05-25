<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('statuses.index', ['statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3|max:16',
        ]);

        Status::create($attributes);

        return redirect('/tasks')->with('success', 'Status has been created successfully.');
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
    public function edit(Status $status)
    {

        return view('statuses.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Status $status)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:16',

        ]);

        $status->update($attributes);

        return redirect("/tasks")->with('success', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect("/tasks")->with('success', 'Status has been deleted');
    }
}
