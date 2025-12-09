@if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form method="POST"
 action="{{ isset($todo)?route('todos.update',$todo):route('todos.store') }}">
  @csrf @isset($todo) @method('PUT') @endisset

  <input name="title" value="{{ old('title',$todo->title ?? '') }}">
  <textarea name="description">{{ old('description',$todo->description ?? '') }}</textarea>
  <input type="date" name="due_date" value="{{ old('due_date',$todo->due_date ?? '') }}">

  <button>Save</button>
</form>
