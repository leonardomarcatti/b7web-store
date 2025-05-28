@extends('layout.layout')

@section('content')
<main>
    <livewire:categories-list :category="$category" title="$title" styles="$styles" />
</main>

@endsection
