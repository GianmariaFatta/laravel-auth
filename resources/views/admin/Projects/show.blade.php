@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <header>
        <h1 class="my-5">{{ $project->title }}</h1>
    </header>
    <div class="clearfix">
        @if ($project->thumb)
            <img class='me-4 float-start' src="{{ $project->thumb }}" alt="{{ $project->title }}">
        @endif
        <p>{{ $project->description }}</p>
        <div>
            <strong>Creato il </strong>
            <time>{{ $project->created_at }}</time>
        </div>
        <hr>
        <div class="d-flex justify-content-end">
            <a class='btn btn-success' href="{{ route('admin.projects.index') }}">Torna ai progetti</a>
        </div>
    </div>


@endsection
