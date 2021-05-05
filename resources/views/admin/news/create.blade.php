@php

    /** @var \App\Models\Category[] $category */

@endphp

@include('blocks.header')

<div class="row justify-content-center">

    <div class="col-md-6">
        <h1>{{ __('labels.admin_news_create') }} </h1>
        {!! Form::open(['route' => 'admin::news::show']) !!}
        @if($model->id)
            <input type="hidden" name="id" value="{{$model->id}}">
        @endif
        <div class="form-group">
            <label>{{ __('labels.news_title') }}</label>
            {!! Form::text("title",$model->title ?? old('title'), ['class' => "form-control"]) !!}
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>{{ __('labels.news_description') }}</label>
            {!! Form::textarea("description",$model->description ?? old('content') ??"", ['class' => "form-control"]) !!}
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>{{ __('labels.news_category') }}</label>
            {!! Form::select('category', $category, $model->category, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <input type="hidden" name="active" value="0">
            <label>
                {!! Form::checkbox("status",1, $model->status) !!}
                {{ __('labels.news_active') }}
            </label>
        </div>
        <div class="form-group">
            <label>{{ __('labels.news_publish_date') }}</label>
            {!! Form::date(
                    'publish_date',
                    $model->publish_date ?? old('publish_date'),
                    ['data-format-as' =>'Y-m-d', 'class' => 'form-control'] )
            !!}
            @error('publish_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input class="btn btn-success" type="submit" value="{{ __('labels.news_save') }}">
        </div>
        {!! Form::close() !!}
    </div>
</div>


@include('blocks.footer')
