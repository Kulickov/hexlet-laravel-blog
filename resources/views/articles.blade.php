@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('header', 'Статьи')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    @if ($articles)
        <ul class="articles">
            @foreach ($articles as $article)
                <li class="articles__item">
                    <h4>{{$article->name}}</h4>
                    <p>{{$article->body}}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
