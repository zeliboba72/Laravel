@extends('layouts.app')

@section('title', $articleCategory->name)
@section('header', 'Категория статей ' . $articleCategory->name)

@section('content')
    <p>{{ $articleCategory->description }}</p>
    <h2 class="mt-4 mb-4">Список статей данной категории:</h2>
    @if(!empty($articles))
        <ol>
            @foreach($articles as $article)
                <li class="mb-2">
                    <a href="{{ route('articles.index') }}/{{ $article->id }}">{{ $article->name }}</a>
                </li>
            @endforeach
        </ol>
    @else
        <p>Нет статей.</p>
    @endif
    <a href="{{ route('article-categories.edit', $articleCategory->id) }}" class="btn btn-primary mt-4">Редактировать эту категорию</a>
@endsection
