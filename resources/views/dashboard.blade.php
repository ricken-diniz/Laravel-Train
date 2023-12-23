<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>

    <h2>
        @auth
            {{ Auth::user()->email }}    
        @endauth
    </h2>

    <a href="{{route('tasks.create')}}">Criar Tarefa</a>

    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button>Sair</button>
    </form>   

</body>
</html>