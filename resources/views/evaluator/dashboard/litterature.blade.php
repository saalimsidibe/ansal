<html>
<head>
    <title></title>
</head>
<body>
    <h1>Bienvenue Evaluateur Litterature</h1>
    <p>.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>