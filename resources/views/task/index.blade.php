<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarefas</title>
    <style>
        .linha {
            display: flex;
            justify-content: space-around
        }
    </style>
</head>
<body>

    <h1>Tarefas</h1>

    @foreach ($lista as $item)
    <div class="linha">
        <p>{{$item->description}}</p>
        <a href="{{url("/tasks/$item->id/edit")}}">Editar</a>
    </div>

    @endforeach
    <h1>Tarefas compartilhadas:</h1>
    @foreach ($tasks as $item)
    <div class="linha">
        <p>{{$item->description}}</p>
    </div>

    @endforeach

    <a href="{{url('/tasks/create')}}">Criar nova</a>

    
</body>
</html>