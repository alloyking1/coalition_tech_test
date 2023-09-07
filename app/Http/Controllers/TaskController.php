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

    public function create(TaskRequest $request)
    {
        Task::updateOrCreate(
            [
                'id' => $request->id
            ],
            $request->validated()
        );

        return redirect()->back()->with('success', 'task created');
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        return redirect()->back()->with('success', 'task deleted');
    }
}
