<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use Illuminate\Http\Request;
use App\Services\TodoService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\TodoResource;
use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{

    public function __construct(protected TodoService $todoService) {}
    //
    public function index(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
        ]);

        $todos = Todo::where('user_id', $request->user_id)->get();

        return response()->json([
            'data' => $todos
        ]);
    }

    public function store(CreateTodoRequest $request)
    {

        $todo = $this->todoService->createTodo($request->validated());
        return response()->json([
            'message' => 'Todo created successfully',
            'todo' => $todo
        ]);
    }

    public function update(UpdateTodoRequest $request, Todo $todo)
    {

         $todo = $this->todoService->updateTodo($todo, $request->validated());
        return new TodoResource($todo);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json([
            'message' => 'Todo deleted successfully'
        ]);
    }
}
