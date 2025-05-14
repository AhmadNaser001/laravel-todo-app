<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id',auth()->id())->get();
        return view('theme.home', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => '0',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('task.index')->with('success', 'Task created successfully!');
    }
    public function complete($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->status = !$task->status;
            $task->save();
        }

        return redirect()->route('task.index');
    }public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('theme.home')->with('success', 'The mission has been updated successfully.');
    }


    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('theme.home')->with('success', 'The task was successfully deleted.');
    }

    public function restore($id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->restore();
        return redirect()->route('theme.trashed')->with('success', 'The mission has been successfully restored!');
    }

    public function forceDelete($id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->forceDelete();
        return redirect()->route('theme.trashed')->with('success', 'The mission has been permanently deleted!');
    }



}
