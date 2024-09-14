<?php
namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $todos = ToDo::orderBy('id','desc')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ToDo::newTodo($request);
        return redirect()->route('todos.index')->with('success', 'To-do created successfully.');
    }

    public function show($id)
    {
        $todo = ToDo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    public function edit($id)
    {
        $todo = ToDo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        ToDo::updateTodo($request,$id);
        return redirect()->route('todos.index')->with('warning', 'To-do updated successfully.');
    }

    public function destroy($id)
    {
        ToDo::deleteTodo($id);
        return redirect()->route('todos.index')->with('error', 'To-do deleted successfully.');
    }
    public function markComplete(Request $request, $id)
    {
        $todo = ToDo::findOrFail($id);
        $todo->is_completed = $request->is_completed;
        $todo->save();
        return response()->json([
            'success' => true,
            'message' => 'To-do status updated successfully.'
        ]);
    }


}
