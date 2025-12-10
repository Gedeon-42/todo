<div class="todo-form-container">
    @if ($errors->any())
    <div class="form-alerts">
        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <div class="alert-content">
                <strong>Please fix the following errors:</strong>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <form method="POST" action="{{ isset($todo) ? route('update', $todo) : route('todos.create') }}" 
          class="todo-form" id="todoForm">
        @csrf 
        @isset($todo) 
            @method('PUT') 
        @endisset

        <!-- Form Header -->
        <div class="form-header">
          
            <h2 class="form-title">
                {{ isset($todo) ? 'Edit Todo' : 'Create New Todo' }}
            </h2>
            <p class="form-subtitle">
                {{ isset($todo) ? 'Update your todo details' : 'Add a new task to your list' }}
            </p>
        </div>

        <!-- Title Input -->
        <div class="form-group">
            <label for="title" class="form-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                    <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                    <path d="M2 2l7.586 7.586"></path>
                    <circle cx="11" cy="11" r="2"></circle>
                </svg>
                Title <span class="required-star">*</span>
            </label>
            <div class="input-wrapper">
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $todo->title ?? '') }}"
                       class="form-input"
                       placeholder="What needs to be done?"
                       autocomplete="off"
                       required>
                <div class="char-counter">
                    <span id="titleCounter">0</span>/60
                </div>
            </div>
            <div class="input-hint">Keep it short and descriptive</div>
        </div>

        <!-- Description Input -->
        <div class="form-group">
            <label for="description" class="form-label">
              
                Description
            </label>
            <div class="input-wrapper">
                <textarea id="description" 
                          name="description" 
                          class="form-textarea"
                          placeholder="Add details, notes, or instructions..."
                          rows="4">{{ old('description', $todo->description ?? '') }}</textarea>
                <div class="char-counter">
                    <span id="descriptionCounter">0</span>/500
                </div>
            </div>
           
        </div>

        <!-- Due Date Input -->
        <div class="form-group">
            <label for="due_date" class="form-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                Due Date
            </label>
            <div class="input-wrapper">
                <div class="date-input-wrapper">
                    <input type="date" 
                           id="due_date" 
                           name="due_date" 
                           value="{{ old('due_date', $todo->due_date ?? '') }}"
                           class="form-input date-input">
                 
                  
                </div>
            </div>
            <div class="date-display" id="dateDisplay">
                @if(isset($todo) && $todo->due_date)
                    <span class="date-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        Due: {{ \Carbon\Carbon::parse($todo->due_date)->format('M d, Y') }}
                    </span>
                @endif
            </div>
        </div>

     

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn-secondary" onclick="window.history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Cancel
            </button>
            <button type="submit" class="btn-primary" id="submitBtn">
                @isset($todo)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                    <polyline points="7 3 7 8 15 8"></polyline>
                </svg>
                Update Todo
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Create Todo
                @endisset
                <div class="button-loading">
                    <div class="spinner"></div>
                </div>
            </button>
        </div>
    </form>
</div>

<style>
    /* CSS Variables */
    :root {
        --primary-color: #4361ee;
        --primary-hover: #3a56d4;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --error-color: #ef4444;
        --low-priority: #6b7280;
        --medium-priority: #f59e0b;
        --high-priority: #ef4444;
        --background-color: #f8fafc;
        --card-background: #ffffff;
        --text-primary: #1f2937;
        --text-secondary: #6b7280;
        --border-color: #e5e7eb;
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --radius-sm: 6px;
        --radius-md: 8px;
        --radius-lg: 12px;
        --transition: all 0.2s ease;
    }

    /* Form Container */
    .todo-form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    /* Form Alerts */
    .form-alerts {
        margin-bottom: 1.5rem;
    }

    .alert {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 1rem;
        border-radius: var(--radius-md);
        margin-bottom: 1rem;
        font-size: 0.875rem;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-error {
        background-color: #fef2f2;
        border: 1px solid #fee2e2;
        color: var(--error-color);
    }

    .alert svg {
        flex-shrink: 0;
        margin-top: 0.125rem;
    }

    .alert-content {
        flex: 1;
    }

    .error-list {
        margin: 0.5rem 0 0 0;
        padding-left: 1.25rem;
        list-style-type: disc;
    }

    .error-list li {
        margin-bottom: 0.25rem;
    }

    /* Form Card */
    .todo-form {
        background: var(--card-background);
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }

    .todo-form:hover {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }

    /* Form Header */
    .form-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--border-color);
    }

   

    .header-icon svg {
        width: 24px;
        height: 24px;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .form-subtitle {
        color: var(--text-secondary);
        font-size: 0.95rem;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 1.75rem;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .form-label svg {
        color: var(--text-secondary);
    }

    .required-star {
        color: var(--error-color);
        margin-left: 0.125rem;
    }

    /* Input Wrapper */
    .input-wrapper {
        position: relative;
    }

    /* Text Input */
    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        font-size: 1rem;
        transition: var(--transition);
        background-color: var(--background-color);
        font-family: inherit;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        background-color: white;
    }

    .form-input::placeholder {
        color: #9ca3af;
    }

    /* Textarea */
    .form-textarea {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        font-size: 1rem;
        transition: var(--transition);
        background-color: var(--background-color);
        font-family: inherit;
        resize: vertical;
        min-height: 120px;
        line-height: 1.5;
    }

    .form-textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        background-color: white;
    }

    /* Date Input Wrapper */
    .date-input-wrapper {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .date-input {
        flex: 1;
    }

    .date-picker-btn {
        padding: 0.75rem 1rem;
        background: var(--background-color);
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        color: var(--text-secondary);
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.375rem;
        white-space: nowrap;
    }

    .date-picker-btn:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        background-color: white;
    }

    .date-picker-btn svg {
        width: 14px;
        height: 14px;
    }

    /* Date Display */
    .date-display {
        margin-top: 0.5rem;
    }

    .date-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        background: var(--background-color);
        border-radius: var(--radius-md);
        font-size: 0.875rem;
        color: var(--text-secondary);
    }

    .date-badge svg {
        width: 12px;
        height: 12px;
    }

    /* Character Counter */
    .char-counter {
        position: absolute;
        right: 0.75rem;
        bottom: 0.75rem;
        font-size: 0.75rem;
        color: var(--text-secondary);
        background: var(--background-color);
        padding: 0.125rem 0.375rem;
        border-radius: var(--radius-sm);
        opacity: 0.8;
    }

    /* Input Hint */
    .input-hint {
        font-size: 0.75rem;
        color: var(--text-secondary);
        margin-top: 0.375rem;
    }

   

   


    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border-color);
    }

    .btn-primary,
    .btn-secondary {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 0.875rem 1.5rem;
        border: none;
        border-radius: var(--radius-md);
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #7c3aed);
        color: white;
    }

    .btn-primary:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
        background: linear-gradient(135deg, var(--primary-hover), #6d28d9);
    }

    .btn-secondary {
        background: var(--background-color);
        color: var(--text-secondary);
        border: 2px solid var(--border-color);
    }

    .btn-secondary:hover {
        border-color: var(--text-secondary);
        color: var(--text-primary);
    }

    .btn-primary:active,
    .btn-secondary:active {
        transform: translateY(0);
    }


    

  
</style>

