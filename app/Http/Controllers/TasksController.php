<?php

namespace App\Http\Controllers;

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
        if ($user->role == 1) {
            return view('task.list', ["tasks"=>$tasks]);
        }
        else {
            return view('task.staff', ["tasks"=>$tasks]);
        }
    }

    public function create(Request $request) {
        // $task = Task::create([
        //     'userid' => Auth::user()->id,
        //     'note' => Auth::user()->id,
        //     'status' => 'Done',
        // ]);
        return $request;    
    }
}
