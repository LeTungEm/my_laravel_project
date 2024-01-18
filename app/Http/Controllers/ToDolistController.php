<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class ToDolistController extends Controller
{
    public function __construct()
    {

    }

    public function showToDOList($err = '')
    {
        $todolist = DB::table('todolist')->get();
        if (strlen(trim($todolist)) == 0) {
            return view('todolist', ['todolist' => $todolist, 'err' => $err]);
        } else {
            return view('todolist', ['todolist' => $todolist, 'err' => $err]);
        }
    }

    public function insertToDoList(Request $request)
    {
        $toDoName = $request->input('todoName');
        if (strlen(trim($toDoName)) == 0) {
            $err = "Hãy nhập tên công việc";
            return $this->showToDOList($err);
        } else {
            DB::table('todolist')->insert([
                'name' => $toDoName,
            ]);
            return $this->showToDOList();
        }

    }
    public function deleteToDoList(Request $request)
    {
        $todoId = $request->input('todoId');
        DB::table('todolist')->where('id', '=', $todoId)->delete();
        return $this->showToDOList();
    }

}
