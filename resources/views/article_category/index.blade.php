@extends('layouts.app')

@section('title', 'Категории')
@section('header', 'Категории статей')

@section('content')
    <table class="table table-light table-bordered mt-3">
        <thead>
        <tr class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">Название категории</th>
            <th scope="col">Описание категории</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articleCategories as $articleCategory)
            <tr>
                <th scope="row">{{ $articleCategory->id }}</th>
                <td>
                    <a href="{{ route('article-categories.index') }}/{{$articleCategory->id}}">{{ $articleCategory->name }}</a>
                </td>
                <td>{{ $articleCategory->description }}</td>
                <td>
                    @if($articleCategory->state === 'unpublished')
                        неактивно
                    @else
                        активно
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
