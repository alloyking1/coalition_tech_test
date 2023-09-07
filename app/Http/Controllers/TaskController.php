<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.index', [
            'task' => Task::all()
        ]);
    }

    public function createOrUpdate(TaskRequest $request)
    {
        Task::updateOrCreate(
            [
                'id' => $request->id
            ],
            $request->validated()
        );

        if ($request->id == null) {
            return redirect()->back()->with('success', 'task created');
        } else {
            return redirect()->route('task.index')->with('success', 'task created');
        }
    }

    public function edit($id)
    {
        return view('task.edit', [
            'task' => Task::find($id)
        ]);
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        return redirect()->back()->with('success', 'task deleted');
    }
}
