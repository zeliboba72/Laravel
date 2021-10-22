@extends('layouts.app')

@section('title', 'Рейтинг статей')
@section('header', 'Рейтинг статей')

@section('content')
    <table class="table table-light table-bordered mt-3">
        <thead>
        <tr class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">Название</th>
            <th scope="col">Кол-во лайков</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->name }}</td>
                <td>{{ $article->likes_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
