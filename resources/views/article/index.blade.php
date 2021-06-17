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
        <h2><a href="{{route('articles.show', $article)}}">{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection
