@extends('layouts.app')

@section('title', 'Статьи')
@section('header', 'Статьи')

@section('content')
    {{ Form::open(['url' => route('articles.index'), 'method' => 'GET']) }}
        {{ Form::text('q', $q ?? "") }}
        {{ Form::submit('Найти статью') }}
    {{ Form::close() }}
    <table class="table table-light table-bordered mt-3">
        <thead>
        <tr class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">Название</th>
            <th scope="col">Текст</th>
            <th scope="col">Кол-во просмотров</th>
            <th scope="col">Ссылка на категорию</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>
                    <a href="{{ route("articles.index") }}/{{ $article->id }}">
                        {{ $article->name }}
                    </a>
                </td>
                <td>{{ Str::limit($article->body, 30) }}</td>
                <td>{{ $article->views_count }}</td>
                <td>
                    @if($article->category_id)
                        <a href="{{ route('article-categories.index') }}/{{ $article->category_id }}">
                            {{ $article->category_name }}
                        </a>
                    @else
                        <p>Без категории</p>
                    @endif

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
