<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
</head>
<body>
<menu><a href="/">Главная</a><a href="/about">О нас</a><a href="/news">Новости</a><a href="/auth">Авторизация</a></menu>

@if ($newsCart)
    <h1>News {{$cart}} Category {{$id}}</h1>
    {{$newsCart}}
@elseif ($id)
        <h1>News Category {{$id}}</h1>
        @foreach ($news as $idNews => $titleNews)

            <div>
                <a href='/news/{{$id}}/{{$idNews}}'>News {{$idNews}}</a>
            </div>

        @endforeach
@else
        <h1>Catalog</h1>

        @foreach ($news as $id => $title)

            <div>
                <a href='news/{{$id}}'>Category {{$id}}</a>
            </div>

        @endforeach
@endif

</body>
</html>
