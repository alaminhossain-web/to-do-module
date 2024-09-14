@extends('master')
@section('title')
    Add To Do
@endsection
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mx-auto card shadow-lg border-0 p-4">
            <h3 class="text-center card-header">Add To-do</h3>
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="title">Title :</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div>
                @error('title')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
                <div class="form-group mt-2">
                    <label for="description">Description :</label>
                    <textarea name="description" class="form-control" rows="8" cols="5" placeholder="Enter Description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </form>
            <div class="card-footer text-center mt-3">
                <a href="{{ route('todos.index') }}" class="btn btn-outline-secondary ">Back to To-do List</a>
            </div>
        </div>
    </div>
    
</div>
@endsection
