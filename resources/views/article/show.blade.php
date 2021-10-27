@extends('layouts.app')

@section('title', $article->name)
@section('header', $article->name)

@section('content')
    <p>{{ $article->body }}</p>
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Все статьи</a>
    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary ms-3 me-3">Отредактировать эту статью</a>
    <a href="{{ route('articles.destroy', $article->id) }}" class="btn btn-danger"
       data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить эту статью</a>
@endsection
