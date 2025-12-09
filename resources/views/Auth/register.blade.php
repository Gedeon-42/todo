@extends('layouts.auth')

@section('content')
<h2 class="text-2xl font-bold text-center mb-6">Create Account</h2>

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    <div>
        <label class="block text-sm font-medium">Full Name</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="w-full border rounded px-3 py-2 mt-1">
    </div>

    <div>
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
               class="w-full border rounded px-3 py-2 mt-1">
    </div>

    <div>
        <label class="block text-sm font-medium">Password</label>
        <input type="password" name="password"
               class="w-full border rounded px-3 py-2 mt-1">
    </div>

    <div>
        <label class="block text-sm font-medium">Confirm Password</label>
        <input type="password" name="password_confirmation"
               class="w-full border rounded px-3 py-2 mt-1">
    </div>

    <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
        Register
    </button>
</form>

<p class="text-center text-sm mt-4">
    Already have an account?
    <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login</a>
</p>
@endsection
