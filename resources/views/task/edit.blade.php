<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Edição de Tarefa - {{$tarefa->id}}</h1>

    <form action="{{route('tasks.update', ['task' => $tarefa->id])}}" method="post">
        @csrf
        <label for="description">
            Descrição
        </label>
        <input type="text" name="description" value="{{$tarefa->description}}">
        @error('description')
            {{$message}}
        @enderror
        <br>
        <button>Enviar</button>
    </form>

    <h2>Compartilhar tarefa</h2>

    <form action="{{route('tasks.share', ['task' => $tarefa->id])}}" method="post">
        @csrf
        <input type="hidden" name="task_id" value='{{$tarefa->id}}'>
        <select name="user_id">
            @foreach($users as $id)
                <option value={{$id->id}}>Usuário {{$id->id}}</option>
            @endforeach
        </select>
        <br>
        <button>Enviar</button>
    </form>

    
</body>
</html>