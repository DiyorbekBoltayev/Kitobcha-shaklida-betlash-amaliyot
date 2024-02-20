<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input{
            display: block;
            margin: 10px 0;
        }
        form{
            width: 200px;
            margin: 0 auto;
            text-align: center;
        }
        body{
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        button{
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body>
<form action="/login" method="post">
    @csrf
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color: red">{{$error}}</p>
        @endforeach
    @endif
</form>
</body>
</html>
