@extends('master')
@section('title')
    To Do Edit
@endsection
@section('content')
<div class="container py-5">
   
    <div class="row">
        <div class="col-md-6 mx-auto card shadow-lg border-0 p-4">
            <h3 class="text-center card-header">Edit To-do</h3>
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <label for="title">Title :</label>
                    <input type="text" name="title" class="form-control" value="{{ $todo->title }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="description">Description :</label>
                    <textarea name="description" class="form-control" rows="8" cols="5">{{ $todo->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
            <div class="card-footer text-center mt-3">
                <a href="{{ route('todos.index') }}" class="btn btn-outline-secondary ">Back to To-do List</a>
            </div>
        </div>
    </div>
   
</div>
@endsection
