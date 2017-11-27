<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\TodosFormRequest;
use Illuminate\Support\Facades\Input;

class TodosController extends Controller
{
    public function index() {
        return Todo::all();
    }

    public function show($id) {
        return Todo::findOrFail($id);
   }

    public function store(TodosFormRequest $request) {
    	$todo = new Todo();
        // new data
    	$todo->title = $request->input('title');
        $todo->completed = $request->input('completed');
        $todo->priority = $request->get('priority');
        $todo->save();
        return $todo;
    }

    public function update(Todo $todo, Request $request) {
        $todo->title = $request->input('title');
        $todo->completed = $request->input('completed');
        $todo->priority = $request->get('priority');
        $todo->save();
        return $todo;
    }

    public function destroy($id) {
        Todo::findOrFail($id)->delete();
    }
}
