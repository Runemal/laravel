@include('blocks.header')

@section('title')
Admin News Create
@endsection


<div class="row justify-content-center">
    <div class="col-md-6">
        {!! Form::open(['route' => 'admin::news::show']) !!}

        {!! Form::label('titleNews', 'Заголовок', ['class' => 'form-label']) !!}

        <div class="form-group">
            {!! Form::text('title', '', ['class' => 'form-control']) !!}
        </div>

        {!! Form::label('textNews', 'Сообщение', ['class' => 'form-label']) !!}

        <div class="form-group">
            {!! Form::textarea('content', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit("Отправить", ['class' => 'btn btn-success']) !!}

        </div>

        {!! Form::close() !!}
    </div>
</div>


@include('blocks.footer')
