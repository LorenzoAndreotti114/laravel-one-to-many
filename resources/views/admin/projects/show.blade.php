@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        @if ($project->type)
        <p class="text-primary">{{$project->type->name}}</p>            
        @endif

        <p>{{ $project->description }}</p>
    </div>
@endsection
