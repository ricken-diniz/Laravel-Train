<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Cadastro de Tarefas</h1>

    <form action="{{url('/tasks/store')}}" method="post">
        @csrf
        <label for="description">
            Descrição
        </label>
        <input type="text" name="description">
        @error('description')
            {{$message}}
        @enderror
        <br>
        <button>Enviar</button>
    </form>

    
</body>
</html>