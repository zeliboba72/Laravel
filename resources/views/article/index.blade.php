@extends('layouts.app')

@section('title', 'Статьи')
@section('header', 'Статьи')

@section('content')
    <table class="table table-light table-bordered mt-3">
        <thead>
        <tr class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">Название</th>
            <th scope="col">Текст</th>
            <th scope="col">Кол-во просмотров</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->name }}</td>
                <td>{{ Str::limit($article->body, 30) }}</td>
                <td>{{ $article->views_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
