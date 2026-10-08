<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1> Register </h1>
    <form action="{{ route('registerCreer')}}" method="POST">
        @csrf 
        <input type="text" name="nom" placeholder="nom" >
        <input type="email" name="email" placeholder="email" >
        <input type="password" name="password" placeholder="password" >
        <button> Créer </button>
    </form>
    
</body>
</html>