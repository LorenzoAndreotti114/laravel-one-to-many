@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success m-2">
            {{ session('message') }}
        </div>
    @endif

    <div class="container">
        <h1>Progetti</h1>
        <div class="d-flex justify-content-end">
            {{-- i bottoni solo dentro il form --}}
            <a class="btn btn-success m-3" href="{{ route('admin.projects.create') }}">Crea</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Slug</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        {{-- aggiungo il type e se non c'è '?'' --}}
                        <td>{{ $project->type?->name }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td> <a class="btn btn-outline-warning btn-sm btn-details "
                                href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">Dettagli</a></td>
                        <td>
                            <!-- Pulsanti -->
                            <div class="d-flex">
                                {{-- MODIFICA --}}
                                <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" type="button"
                                    class="btn btn-outline-primary btn-sm me-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- CANCELLA --}}
                                    <button type="submit" class="btn btn-outline-danger btn-sm me-2" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
