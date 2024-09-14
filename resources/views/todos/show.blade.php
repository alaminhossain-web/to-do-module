@extends('master')
@section('title')
    To Do Show
@endsection
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 p-4">
                <div class="card-header bg-primary text-white text-center">
                    <h2>{{ $todo->title }}</h2>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ $todo->description }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('todos.index') }}" class="btn btn-outline-secondary">Back to To-do List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
