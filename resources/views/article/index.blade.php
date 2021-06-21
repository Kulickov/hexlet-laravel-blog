@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    <a href="{{route('articles.create')}}">Создать статью</a>
    <h2>Поиск статей</h2>
    {{Form::open(['url' => route('articles.index'), 'method' => 'GET'])}}
        {{Form::text('q', $query)}}
        {{Form::submit('Найти')}}
    {{Form::close()}}
    <h2>Список статей</h2>
    @foreach ($articles as $article)
        <h2><a href="{{route('articles.show', $article)}}">{{$article->name}}</a><a href="{{route('articles.edit', $article)}}" style="margin-left: 15px; font-size: 14px;">редактировать</a><a href="{{route('articles.destroy', $article)}}" style="color: tomato; font-size: 11px;" data-method="delete" rel="nofollow">Удалить</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection
