<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Input;

class TodosController extends Controller
{
    public function index() {
    	$todos = Todo::all();
    	return $todos;
    }

    public function show($id) {
        $todo = Todo::find($id);
        return $todo;
   }

    public function store(Request $request) {
    	$todo = new Todo();
    	// validate
    	$rules = Todo::STORE_RULES;
        // $options = Todo::OPTIONS;
        // dd($options);
    	$request->validate($rules);
    	// new data
    	$todo->title = $request->input('title');
        $todo->completed = $request->input('completed');
        $todo->priority = $request->get('priority');
    	// check if todo already exists in db
    	$existingTodo = Todo::where('title', '=', Input::get('title'))->first();
    	// save new Todo()
        if (!$existingTodo) {
            $todo->save();
        }
        return $todo;
    }

    public function update(Request $request, $id) {
        $todo = Todo::find($id);
        // if no todo in db make message
        if(! $todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        $todo->title = $request->input('title');
        $todo->completed = $request->input('completed');
        $todo->priority = $request->get('priority');
        $todo->save();
        return $todo;
    }

    public function destroy($id) {
        $todo = Todo::find($id);
        if(! $todo) {
            return response()->json(['message' => 'Todo to delete not found'], 404);
        }
        $todo->delete();
        return response()->json(['message' => 'Todo deleted'], 200);
    }
}
