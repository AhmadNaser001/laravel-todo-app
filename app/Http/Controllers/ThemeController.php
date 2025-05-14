<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ThemeController extends Controller
{
    public function welcome(){
        return view('theme.welcome');
    }
    public function home(){
        $tasks = Task::where('user_id',auth()->id())->get();
        return view('theme.home',compact('tasks'));
    }
    public function login(){
        return view('theme.login');
    }
    public function register(Request $request){
        return view('theme.register');
    }
    public function trashed(){
        $deletedTasks = Task::onlyTrashed()->get();

        return view('theme.trashed',compact('deletedTasks'));
    }
    public function trash()
{
}

    public function edit($id)
    {
            $tasks = Task::where('user_id', auth()->id())->get();
            $task = Task::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

            return view('theme.editPage', compact('task'));

    }
}
