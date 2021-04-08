@include('blocks.header')

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

@include('blocks.footer')
