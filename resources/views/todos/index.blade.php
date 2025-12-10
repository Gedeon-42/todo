@extends('layouts.app')

@section('content')
<div class="todos-container">
    <header class="todos-header">
        <h1>My Todo List</h1>
        <a href="{{ route('todos.create') }}" class="btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add New Todo
        </a>
    </header>

    @if(count($todos) > 0)
    <div class="todos-table-container">
        <table class="todos-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                <tr class="todo-item {{ $todo->is_completed ? 'completed' : 'pending' }}">
                    <td class="todo-title">
                        <span class="title-text">{{ $todo->title }}</span>
                    </td>
                    <td class="todo-due-date">
                        <div class="due-date-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span>{{ $todo->due_date }}</span>
                        </div>
                    </td>
                    <td class="todo-status">
                        <span class="status-badge {{ $todo->is_completed ? 'completed' : 'pending' }}">
                            {{ $todo->is_completed ? 'Completed' : 'Pending' }}
                        </span>
                        @if($todo->is_completed)
                        <div class="completed-info">at {{ $todo->completed_at }}</div>
                        @endif
                    </td>
                    <td class="todo-actions">
                        <div class="action-buttons">
                            <a href="{{ route('todos.edit',$todo) }}" class="btn-edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Edit
                            </a>
                            
                            <form method="POST" action="{{ route('todos.destroy',$todo) }}" class="delete-form">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this todo?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                            
                            @if(!$todo->is_completed)
                            <form method="POST" action="{{ route('todos.complete',$todo) }}" class="complete-form">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn-complete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    Mark Complete
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="todos-summary">
        <p>Total: {{ count($todos) }} todos ({{ $todos->where('is_completed', true)->count() }} completed, {{ $todos->where('is_completed', false)->count() }} pending)</p>
    </div>
    
    @else
    <div class="empty-state">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
        </svg>
        <h2>No todos yet</h2>
        <p>Get started by creating your first todo item</p>
        <a href="{{ route('todos.create') }}" class="btn-primary">Create Your First Todo</a>
    </div>
    @endif
</div>

<style>
    /* Modern CSS Variables */
    :root {
        --primary-color: #4361ee;
        --primary-light: #eef2ff;
        --success-color: #10b981;
        --success-light: #d1fae5;
        --warning-color: #f59e0b;
        --warning-light: #fef3c7;
        --danger-color: #ef4444;
        --danger-light: #fee2e2;
        --text-dark: #1f2937;
        --text-light: #6b7280;
        --border-color: #e5e7eb;
        --background-color: #f9fafb;
        --white: #ffffff;
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --radius: 8px;
        --radius-lg: 12px;
        --transition: all 0.2s ease;
    }

    /* Base Styles */
    .todos-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
        color: var(--text-dark);
        background-color: var(--background-color);
        min-height: 100vh;
    }

    /* Header */
    .todos-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .todos-header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }

    /* Buttons */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background-color: var(--primary-color);
        color: var(--white);
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        box-shadow: var(--shadow-sm);
    }

    .btn-primary:hover {
        background-color: #3a56d4;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Table Container */
    .todos-table-container {
        background-color: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        margin-bottom: 1.5rem;
        overflow-x: auto;
    }

    /* Table */
    .todos-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }

    .todos-table thead {
        background-color: var(--primary-light);
        border-bottom: 2px solid var(--border-color);
    }

    .todos-table th {
        padding: 1.25rem 1.5rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--text-light);
    }

    .todos-table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: var(--transition);
    }

    .todos-table tbody tr:hover {
        background-color: var(--background-color);
    }

    .todos-table tbody tr.completed {
        opacity: 0.8;
    }

    .todos-table tbody tr.completed .todo-title .title-text {
        text-decoration: line-through;
        color: var(--text-light);
    }

    .todos-table td {
        padding: 1.25rem 1.5rem;
        vertical-align: middle;
    }

    /* Todo Title */
    .todo-title .title-text {
        font-weight: 500;
        color: var(--text-dark);
    }

    /* Due Date */
    .due-date-wrapper {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-light);
    }

    /* Status Badge */
    .status-badge {
        display: inline-block;
        padding: 0.375rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .status-badge.pending {
        background-color: var(--warning-light);
        color: var(--warning-color);
    }

    .status-badge.completed {
        background-color: var(--success-light);
        color: var(--success-color);
    }

    .completed-info {
        font-size: 0.75rem;
        color: var(--text-light);
        margin-top: 0.25rem;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-edit,
    .btn-delete,
    .btn-complete {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.5rem 0.875rem;
        border-radius: var(--radius);
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: var(--transition);
        border: none;
        cursor: pointer;
    }

    .btn-edit {
        background-color: var(--primary-light);
        color: var(--primary-color);
    }

    .btn-edit:hover {
        background-color: #e0e7ff;
    }

    .btn-delete {
        background-color: var(--danger-light);
        color: var(--danger-color);
    }

    .btn-delete:hover {
        background-color: #fecaca;
    }

    .btn-complete {
        background-color: var(--success-light);
        color: var(--success-color);
    }

    .btn-complete:hover {
        background-color: #a7f3d0;
    }

    .delete-form,
    .complete-form {
        display: inline;
    }

    /* Summary */
    .todos-summary {
        padding: 1rem 1.5rem;
        background-color: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        color: var(--text-light);
        font-size: 0.875rem;
    }

    .todos-summary p {
        margin: 0;
    }

    /* Empty State */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 4rem 2rem;
        background-color: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
    }

    .empty-state svg {
        color: var(--text-light);
        margin-bottom: 1.5rem;
    }

    .empty-state h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: var(--text-light);
        margin-bottom: 2rem;
        max-width: 24rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .todos-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .todos-header h1 {
            font-size: 1.75rem;
        }
        
        .action-buttons {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .btn-edit,
        .btn-delete,
        .btn-complete {
            width: 100%;
            justify-content: center;
        }
        
        .todos-table th,
        .todos-table td {
            padding: 1rem;
        }
    }

    @media (max-width: 480px) {
        .todos-container {
            padding: 1rem;
        }
        
        .todos-table td {
            display: block;
            padding: 0.75rem 1rem;
        }
        
        .todos-table td:before {
            content: attr(data-label);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-light);
            display: block;
            margin-bottom: 0.25rem;
        }
        
        .todos-table thead {
            display: none;
        }
        
        .todos-table tr {
            display: block;
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 1rem;
        }
        
        .todos-table-container {
            background-color: transparent;
            box-shadow: none;
            padding: 0;
        }
        
        .todo-actions {
            border-top: 1px solid var(--border-color);
            margin-top: 0.75rem;
            padding-top: 0.75rem;
        }
    }
</style>
@endsection