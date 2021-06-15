@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('header', 'О блоге')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    <p>Эксперименты с Laravel на Хекслете</p>
    <h4>Команда</h4>
    <div class="">
        @foreach ($team as $human)
            <div class="">
                Имя: {{$human['name']}}, Должность: {{$human['position']}}
            </div>
        @endforeach
    </div>
@endsection
