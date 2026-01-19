<?php
namespace App\Services;

use App\Models\Todo;

class TodoService
{
    public function createTodo(array $data)
    {
        return Todo::create($data);
    }



    public function updateTodo(Todo $todo,  $data)
    {
        $todo->update($data);
        return $todo;
    }

    public function deleteTodo(Todo $todo)
    {
        return $todo->delete();
    }
}
