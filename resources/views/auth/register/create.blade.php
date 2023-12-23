<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Cadastro</h1>

    <form action="{{route('register')}}" method="post">
        @csrf
        <label for="">Email</label> 
        <input type="email" name="email" value={{old('email')}}>   
        @error('email')
        <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="">Nome</label> 
        <input type="text" name="name" value={{old('name')}}>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="">Senha</label> 
        <input type="password" name="password">
        @error('password')
        <span>{{ $message }}</span>
        @enderror
        <br>

        <label for="">Confirmar Senha</label> 
        <input type="password" name="password_confirmation">
        @error('password')
        <span>{{ $message }}</span>
        @enderror
        <br>

        <button>Enviar</button>
    </form>

</body>
</html>