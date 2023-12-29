@extends('layouts.app')

@section('content')
<main role="main" class="container">
    <h1 class="text-center mt-5">Show Task</h1>
    <div class="d-flex flex-row-reverse bd-highlight mb-3">
        <a class="btn btn-danger" href="{{ route('book.index') }}"> Back</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Priority</th>
                <th scope="col">Status</th>
               
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th scope="row">{{ $task->id}}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->desc }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->status }}</td>
                
                </tr>
        </tbody>
    </table>
</main>
@endsection