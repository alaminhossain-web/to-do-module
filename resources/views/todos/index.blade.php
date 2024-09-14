      
@extends('master')
@section('title')
    To Do Page
@endsection
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between">
        <h3>To-do List</h3>
    <a href="{{ route('todos.create') }}" class="btn btn-outline-primary">Add New To-do</a>
    </div>
    
    <div class="py-5">
        <div id="alerts"></div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>            
    @endif
    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>              
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>               
    @endif
    <table id="example" class="table table-bordered ">
        <thead>
            <tr>
                <th class="px-6 py-3 text-start" width="60">#</th>
                <th>Title</th>
                <th class="px-6 py-3 text-start" width="120">Date</th>
                <th class="px-6 py-3 text-center" width="20">Mark As Complete</th>
                <th class="px-6 py-3 text-center" width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
            <tr >
                <td class="px-6 py-3 text-start">{{ $loop->iteration }}</td>
                <td><a href="{{ route('todos.show', $todo->id) }}">{{ $todo->title }}</a></td>
                <td class="px-6 py-3 text-start">
                    {{ $todo->created_at->format('d M,Y') }}
                </td>
                <td class="px-6 py-3 text-center">
                    <input type="checkbox" value="1" name="is_completed" {{ $todo->is_completed ? 'checked' : '' }} onchange="isComplete(this, {{ $todo->id }})">
                </td>
                <td class="px-6 py-3 text-center">
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
</div>
<script>
    function isComplete(checkbox, todoId) {
    let isCompleted = checkbox.checked ? 1 : 0;

    $.ajax({
        url: `/todos/${todoId}/complete`,
        type: 'PATCH',
        data: {
            is_completed: isCompleted,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                // Show success message
                let successAlert = `
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        ${response.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                $('#alerts').html(successAlert);  // Append the message to a div with id 'alerts'
            }
        },
        error: function(xhr, status, error) {
            let errorAlert = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    An error occurred while updating the to-do status.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            $('#alerts').html(errorAlert);
        }
    });
}

</script>

@endsection

