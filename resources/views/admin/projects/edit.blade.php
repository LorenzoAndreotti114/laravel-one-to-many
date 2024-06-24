@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Modifica:</h1>
        <h3>{{ $project->title }}</h3>
        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title" class="form-control" id="title" value=""{{ $project->title }}
                    required>
            </div>
            {{-- TYPE --}}
            <div class="form-group">
                <label for="type_id">Type</label>
                <select id="type_id" name="type_id" class="form-control">
                    <option value="">Select a type</option>
                    @foreach ($types as $type)
                        <option @selected($project->type?->id === $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea name="description" class="form-control" id="description" required>{{ $project->description }}</textarea>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-success">Crea</button>
            </div>
        </form>
    </div>
@endsection
