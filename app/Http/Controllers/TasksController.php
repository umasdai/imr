<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index() {
        $tasks = [
            '1' => 'Pergi gim',
            '2' => 'Bayar bill',
            '3' => 'Solat dhuha',
        ];
        $user = Auth::user();

        $tasks = Task::latest()->get();

        
        // if ($user->role == 1) {
            return view('task.list', ["tasks"=>$tasks, "user" => $user]);
        // }
        // else {
        //     return view('task.staff', ["tasks"=>$tasks]);
        // }
    }

    public function create() {
        return view('task.create');
    }

    public function store(Request $request) {
        $task = Task::create([
            'userid' => Auth::user()->id,
            'note' => $request->note,
            'done' => 0,
        ]);
        return redirect('/tasks');
    }

    public function update(Request $request, Task $task) {
        $task->update($request->all());
        return redirect('/tasks');
    }

    public function destroy(Task $task) {
        $task->delete();
        return redirect('/tasks');
    }
}
