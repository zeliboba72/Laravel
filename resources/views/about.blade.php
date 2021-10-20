@extends('layouts.app')

@section('title', 'О блоге')
@section('header', 'О блоге')

@section('content')
    <p>Эксперименты с Laravel</p>
    <ul>
        @foreach($team as $person)
            <li>{{ $person["name"] }} - {{ $person["position"] }}</li>
        @endforeach
    </ul>
@endsection
