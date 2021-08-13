<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Mốc</h1>
    @foreach ($post as $item)
    <tr>
        <td>id</td>
        <td>name</td>
    </tr>
    <tr>
        <td>{{$item->title}}</td>
    </tr>
    @endforeach
</body>

</html>