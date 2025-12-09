@extends('layouts.auth')

@section('content')
<h2 class="text-2xl font-bold text-center mb-6">Login</h2>

@if(session('error'))
<div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <div>
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
               class="w-full border rounded px-3 py-2 mt-1 focus:ring focus:ring-blue-300">
    </div>

    <div>
        <label class="block text-sm font-medium">Password</label>
        <input type="password" name="password"
               class="w-full border rounded px-3 py-2 mt-1 focus:ring focus:ring-blue-300">
    </div>

    <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
        Login
    </button>
</form>

<p class="text-center text-sm mt-4">
    Don't have an account?
    <a href="{{ route('register') }}" class="text-blue-600 font-semibold">Sign up</a>
</p>
@endsection
