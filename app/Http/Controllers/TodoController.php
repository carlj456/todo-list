<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $todos = DB::table('todos')->orderBy('created_at', 'desc')->get();
        return view('todos', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        DB::table('todos')->insert([
            'task' => $request->task,
            'completed' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return redirect('/');
    }

    public function destroy($id)
    {
        DB::table('todos')->where('id', $id)->delete();
        return redirect('/');
    }
}