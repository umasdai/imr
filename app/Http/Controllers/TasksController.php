<?php

namespace App\Http\Controllers;

use App\Task;
use App\User as AppUser;
use Hamcrest\Arrays\IsArray;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index() {
        // $tasks = [
        //     '1' => 'Pergi gim',
        //     '2' => 'Bayar bill',
        //     '3' => 'Solat dhuha',
        // ];
        $currUser = Auth::user();
        $users = AppUser::all();

        $tasks = Task::latest()->get();

        /* Filter task for staff */
        if ($currUser->role == 2 && is_array(json_decode($tasks))) {
            $tasks = array_filter(json_decode($tasks), function ($value) use ($currUser) {
                return $value->userid == $currUser->id; // Auth::user()->id;
            });
        };

        if ($currUser) {
            return view('task.list', compact('tasks', 'currUser', 'users'));
        }
        else {
            return redirect('/login');
        }
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
