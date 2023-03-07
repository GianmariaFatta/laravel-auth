@extends('layouts.app')

@section('title', 'Projects')


@section('content')
    <header>
        <h1 class='my-5'>Projects</h1>

    </header>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il </th>
                <th scope="col">Aggiornato il </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>

            @forelse($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <a class='btn btn-small btn-primary' href="{{ route('admin.projects.show', $project->id) }}">Vedi</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope='row' colspan='6' class='text-center'>Non ci sono Progetti</th scope='row'>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
