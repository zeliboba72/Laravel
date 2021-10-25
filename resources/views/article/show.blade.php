@extends('layouts.app')

@section('title', $article->name)
@section('header', $article->name)

@section('content')
    <p>{{ $article->body }}</p>
    <a href="{{ route('articles.index') }}" class="mt-3">Все статьи</a>
@endsection
