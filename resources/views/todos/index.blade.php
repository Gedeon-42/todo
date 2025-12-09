@extends('layouts.app')

@section('content')
<a href="{{ route('todos.create') }}">Add Todo</a>

<table border="1">
<tr>
  <th>Title</th>
  <th>Due</th>
  <th>Status</th>
  <th>Actions</th>
</tr>

@foreach($todos as $todo)
<tr>
  <td>{{ $todo->title }}</td>
  <td>{{ $todo->due_date }}</td>
  <td>
    {{ $todo->is_completed ? 'Completed at '.$todo->completed_at : 'Pending' }}
  </td>
  <td>
    <a href="{{ route('todos.edit',$todo) }}">Edit</a>

    <form method="POST" action="{{ route('todos.destroy',$todo) }}">
        @csrf @method('DELETE')
        <button>Delete</button>
    </form>

    @if(!$todo->is_completed)
    <form method="POST" action="{{ route('todos.complete',$todo) }}">
        @csrf @method('PATCH')
        <button>Mark Complete</button>
    </form>
    @endif
  </td>
</tr>
@endforeach
</table>
@endsection
