<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller {
    
    public function index() {
        $tasks = [
            '1' => 'Pergi gim',
            '2' => 'Bayar bill',
            '3' => 'Solat dhuha',
        ];

        return view('task.list', ["tasks"=>$tasks]);
    }

    public function staff() {
        $tasks = [
            '1' => 'Siapkan Document',
            '3' => 'Cari Klien',
            '2' => 'Jumpa klien',
        ];

        return view('task.staff', ["tasks"=>$tasks]);
    }
}
