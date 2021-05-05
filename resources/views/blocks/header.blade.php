<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title')</title>
    <script src="{{asset('js/app.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<menu><a href="/">{{ __('labels.index_page') }}</a><a href="/about">{{ __('labels.about_page') }}</a><a href="/news">{{ __('labels.news_page') }}</a><a href="/admin/news">{{ __('labels.admin_news_page') }}</a></menu>
<hr>

