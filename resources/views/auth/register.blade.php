@extends('layouts.auth')

@section('content')
<div class="auth-container">
    <div class="auth-card">
     

        <div class="auth-header">
           
            <h1 class="auth-title">Create Your Account</h1>
            <p class="auth-subtitle">Join us today! It only takes a minute</p>
        </div>

        @if ($errors->any())
        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <div class="alert-content">
                <strong>Please check the following:</strong>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="auth-form" id="registerForm">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Full Name
                </label>
                <div class="input-wrapper">
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}"
                           class="form-input"
                           placeholder="Enter your full name"
                           autocomplete="name"
                           required>
                    <div class="input-icon success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                </div>
               
            </div>

            <div class="form-group">
                <label for="email" class="form-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <path d="M16 10l-4 4-4-4"></path>
                    </svg>
                    Email Address
                </label>
                <div class="input-wrapper">
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           class="form-input"
                           placeholder="you@example.com"
                           autocomplete="email"
                           required>
                    <div class="input-icon success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                </div>
                <div class="input-hint">We'll send a verification link to this email</div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        Password
                    </label>
                    <div class="input-wrapper">
                        <input type="password" 
                               id="password" 
                               name="password"
                               class="form-input"
                               placeholder="Create a password"
                               autocomplete="new-password"
                               required>
                        <button type="button" class="password-toggle" data-target="password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-icon">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="strength-meter">
                            <div class="strength-bar"></div>
                        </div>
                        <div class="strength-text">Password strength: <span>Weak</span></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 9.9 1"></path>
                        </svg>
                        Confirm Password
                    </label>
                    <div class="input-wrapper">
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation"
                               class="form-input"
                               placeholder="Confirm your password"
                               autocomplete="new-password"
                               required>
                        <button type="button" class="password-toggle" data-target="password_confirmation">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="eye-icon">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                        <div class="input-icon match">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                    </div>
                    <div class="input-hint">Re-enter your password for verification</div>
                </div>
            </div>

        
            <button type="submit" class="auth-button" id="submitButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <polyline points="17 11 19 13 23 9"></polyline>
                </svg>
                <span>Create Account</span>
                <div class="button-loading">
                    <div class="spinner"></div>
                </div>
            </button>
        </form>

        <div class="auth-divider">
            <span>or sign up with</span>
        </div>

    

        <div class="auth-footer">
            <p>Already have an account?</p>
            <a href="{{ route('login') }}" class="auth-link">
                Sign in to your account
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
    /* CSS Variables */
    :root {
        --primary-color: #10b981;
        --primary-hover: #059669;
        --secondary-color: #6c757d;
        --success-color: #10b981;
        --error-color: #ef4444;
        --warning-color: #f59e0b;
        --background-color: #f8fafc;
        --card-background: #ffffff;
        --text-primary: #1f2937;
        --text-secondary: #6b7280;
        --border-color: #e5e7eb;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --radius-sm: 6px;
        --radius-md: 8px;
        --radius-lg: 12px;
        --radius-xl: 16px;
        --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Base Styles */
    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
       
        animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .auth-card {
        background: var(--card-background);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-lg);
        padding: 2.5rem;
        width: 100%;
        max-width: 500px;
        transition: var(--transition);
    }


    /* Header */
    .auth-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .auth-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
        border-radius: 50%;
        margin-bottom: 1rem;
        color: white;
    }

    .auth-icon svg {
        width: 28px;
        height: 28px;
    }

    .auth-title {
        font-size: 1.875rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .auth-subtitle {
        color: var(--text-secondary);
        font-size: 0.95rem;
    }

    /* Alerts */
    .alert {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 1rem;
        border-radius: var(--radius-md);
        margin-bottom: 1.5rem;
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

    /* Form Layout */
    .auth-form {
        margin-bottom: 1.5rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
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

    .input-wrapper {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 0.875rem 1rem;
        padding-right: 3rem;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        font-size: 1rem;
        transition: var(--transition);
        background-color: var(--background-color);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        background-color: white;
    }

    .form-input::placeholder {
        color: #9ca3af;
    }

    .input-hint {
        font-size: 0.75rem;
        color: var(--text-secondary);
        margin-top: 0.375rem;
    }

    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        opacity: 0;
        transition: var(--transition);
    }

    .input-icon.success {
        background-color: var(--success-color);
        color: white;
    }

    .input-icon.match {
        background-color: var(--success-color);
        color: white;
    }

    .input-icon svg {
        width: 12px;
        height: 12px;
    }

    .password-toggle {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        padding: 0.25rem;
        cursor: pointer;
        color: var(--text-secondary);
        transition: var(--transition);
        border-radius: var(--radius-sm);
        z-index: 2;
    }

    .password-toggle:hover {
        color: var(--primary-color);
        background-color: rgba(16, 185, 129, 0.1);
    }

    /* Password Strength */
    .password-strength {
        margin-top: 0.5rem;
    }

    .strength-meter {
        height: 4px;
        background: var(--border-color);
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 0.25rem;
    }

    .strength-bar {
        height: 100%;
        width: 0%;
        background: var(--error-color);
        border-radius: 2px;
        transition: var(--transition);
    }

    .strength-text {
        font-size: 0.75rem;
        color: var(--text-secondary);
    }

    .strength-text span {
        font-weight: 600;
    }

    /* Password Requirements */
    .password-requirements {
        background: var(--background-color);
        border-radius: var(--radius-md);
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .requirements-title {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
    }

    .requirements-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5rem;
    }

    @media (max-width: 480px) {
        .requirements-list {
            grid-template-columns: 1fr;
        }
    }

    .requirement {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.75rem;
        color: var(--text-secondary);
        transition: var(--transition);
    }

    .requirement.valid {
        color: var(--success-color);
    }

    .requirement.valid svg {
        color: var(--success-color);
        transform: rotate(360deg);
    }

    .requirement svg {
        transition: var(--transition);
        color: var(--text-secondary);
    }

    /* Terms Agreement */
    .terms-agreement {
        margin: 1.5rem 0;
        padding: 1rem;
        background: var(--background-color);
        border-radius: var(--radius-md);
    }

    .checkbox-container {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        cursor: pointer;
        font-size: 0.875rem;
        color: var(--text-secondary);
        user-select: none;
    }

    .checkbox-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkbox-checkmark {
        position: relative;
        height: 18px;
        width: 18px;
        background-color: white;
        border: 2px solid var(--border-color);
        border-radius: 4px;
        transition: var(--transition);
        flex-shrink: 0;
        margin-top: 0.125rem;
    }

    .checkbox-input:checked ~ .checkbox-checkmark {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .checkbox-checkmark:after {
        content: "";
        position: absolute;
        display: none;
        left: 5px;
        top: 1px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .checkbox-input:checked ~ .checkbox-checkmark:after {
        display: block;
    }

    .terms-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .terms-link:hover {
        text-decoration: underline;
    }

    /* Auth Button */
    .auth-button {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1rem;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
        color: white;
        border: none;
        border-radius: var(--radius-md);
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        margin-bottom: 1.5rem;
        position: relative;
    }

    .auth-button:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
        background: linear-gradient(135deg, var(--primary-hover), #047857);
    }

    .auth-button:active {
        transform: translateY(0);
    }

    .auth-button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    .button-loading {
        display: none;
        position: absolute;
        right: 1rem;
    }

    .spinner {
        width: 18px;
        height: 18px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Divider */
    .auth-divider {
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
        color: var(--text-secondary);
        font-size: 0.875rem;
    }

    .auth-divider::before,
    .auth-divider::after {
        content: "";
        flex: 1;
        height: 1px;
        background-color: var(--border-color);
    }

    .auth-divider span {
        padding: 0 1rem;
    }

    /* Social Auth */
    .social-auth {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .social-button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 0.875rem;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-md);
        background: white;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
    }

    .social-button:hover {
        border-color: var(--primary-color);
        transform: translateY(-1px);
        box-shadow: var(--shadow-sm);
    }

    .google-button {
        color: #1f2937;
    }

    .github-button {
        color: #1f2937;
    }

    .github-button svg {
        color: #1f2937;
    }

    /* Footer */
    .auth-footer {
        text-align: center;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border-color);
        color: var(--text-secondary);
        font-size: 0.875rem;
    }

    .auth-footer p {
        margin-bottom: 0.5rem;
    }

    .auth-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
    }

    .auth-link:hover {
        color: var(--primary-hover);
        gap: 0.75rem;
    }