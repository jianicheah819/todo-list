@extends('layouts.app')

@section('content')
<form action="{{ route('task.store') }}" method="POST">
    @csrf
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td> <input type="text" name="title"  class="form-control" placeholder="Title" required> </td>
                        @error('title')
                            {{ $message }}
                        @enderror
                        
                        <td> <textarea name="desc" value="" cols="30" rows="10" >{{ old('desc') }}</textarea> </td>
                        @error('desc')
                        {{ $message }}
                    @enderror
                    <td> <select name="priority">
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select> </td>
                    @error('desc')
                    {{ $message }}
                @enderror
                <td>   
                    <select name="status">
                    <option value="complete" {{ old('status') == 'complete' ? 'selected' : '' }}>Complete</option>
                    <option value="not_complete" {{ old('status') == 'not_complete' ? 'selected' : '' }}>Not Complete</option>
                </select> </td>
                @error('desc')
                {{ $message }}
            @enderror
                        <td><button type="submit" class="btn btn-primary">Submit</button></td>
                    </tr>
            </tbody>
        </table>
</form>
@endsection