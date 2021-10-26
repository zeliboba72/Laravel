@extends('layouts.app')

@section('title', 'Создать категорию')
@section('header', 'Создать категорию')

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
    {{ Form::model($articleCategory, ['url' => route('article-categories.store')]) }}
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name') }}<br>
        {{ Form::label('description', 'Описание') }}
        {{ Form::textarea('description') }}<br>
        {{ Form::submit('Добавить') }}
    {{ Form::close() }}
@endsection
