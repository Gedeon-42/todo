<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
     public function index()
    {
        $todos = auth()->user()->todos()->latest()->get();
        return view('todos.index', compact('todos'));
    }

     public function create()
    {
        return view('todos.create');
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|max:255',
            'description'=>'nullable',
            'due_date'=>'required|date'
        ]);

        auth()->user()->todos()->create($validated);

        return redirect()->route('todos.index')
               ->with('success','Todo created successfully');
    }

     public function edit(Todo $todo)
    {
        $this->authorize('update',$todo);
        return view('todos.edit',compact('todo'));
    }
    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update',$todo);

        $validated = $request->validate([
            'title'=>'required|max:255',
            'description'=>'nullable',
            'due_date'=>'required|date'
        ]);

        $todo->update($validated);

        return redirect()->route('todos.index')
               ->with('success','Todo updated successfully');
    }

       public function destroy(Todo $todo)
    {
        $this->authorize('delete',$todo);
        $todo->delete();

        return back()->with('success','Todo deleted');
    }

    public function complete(Todo $todo)
    {
        $this->authorize('update',$todo);

        $todo->update([
            'is_completed'=>true,
            'completed_at'=>now()
        ]);

        return back()->with('success','Marked as completed');
    }

}
