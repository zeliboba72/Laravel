@extends('layouts.app')

@section('title', 'Изменение статьи')
@section('header', 'Изменить статью')

@php
    $selectArray = [];
    foreach ($categories as $category) {
        $selectArray[$category->id] = $category->name;
    }
@endphp

@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    {{ Form::model($article, ['url' => route('articles.update', $article), 'method' => 'PATCH']) }}
    {{ Form::label('name', 'Название') }}
    {{ Form::text('name') }}<br>
    {{ Form::label('body', 'Содержание') }}
    {{ Form::textarea('body') }}<br>
    {{ Form::label('category_id', 'Выбор категории') }}
    {{ Form::select('category_id', $selectArray) }}<br>
    {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
