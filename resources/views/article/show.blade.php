@extends('layouts.app')

@section('header', $article->name)

@section('content')
    <p>{{$article->body}}</p>
@endsection
