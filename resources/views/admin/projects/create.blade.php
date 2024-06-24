@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea un nuovo Progetto</h1>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            {{-- TYPE --}}
            <div class="form-group">
                <label for="type_id">Type</label>
                <select id="type_id" name="type_id" class="form-control">
                    <option value="">Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-success">Crea</button>
            </div>
        </form>
    </div>
@endsection
