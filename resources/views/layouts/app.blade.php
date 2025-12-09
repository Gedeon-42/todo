<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
</head>
<body>
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button>Logout</button>
        </form>
    @endauth

    <hr>
    @yield('content')
</body>
</html>
