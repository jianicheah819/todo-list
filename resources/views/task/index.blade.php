<!DOCTYPE html>
<html>
<head>
  <title>Manage Task</title>
  <style>
    /* CSS styles for the homepage */
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
    }
    
    .header {
      background-color: #f2b8b8;
      color: #080000;
      padding: 20px;
    }
    
    .header h1 {
      margin: 0;
      padding: 0;
    }
    
    .content {
      background-color: #fff;
      color: #333;
      padding: 20px;
    }

    .button-container {
      margin-bottom: 20px;
      text-align: right;
    }
    
    .button-container a {
      background-color: #0d39ec;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
      margin-right: 10px;
    }
    
    .button-container a:hover {
      background-color: #d8e217;
    }

    .dropdown {
        display: inline-block;
    }
    
    /* CSS styles for the dropdown button */
    .dropbtn {
      background-color: #135ee0;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 3px;
    }
    
    .dropbtn:hover {
      background-color: #d32f2f;
    }
    
    /* CSS styles for the dropdown content */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 200px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: #333;
      padding: 12px 16px;
      text-decoration: none;
      display:block;
    }
    
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    .footer {
      background-color: #f2b8b8;
      color: #070000;
      padding: 20px;
    }
    .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #f5f5f5;
}

.table td.actions {
    white-space: nowrap;
}

.table .btn {
    margin-right: 5px;
}

/* CSS styles for alerts */
.alert {
    margin-top: 20px;
}

.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
        border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-warning {
    color: #212529;
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>List of Task</h1>
    </div>
    
    <div class="content">
        <div class="button-container">
         
          <a href="{{ route('task.create') }}" >New Task</a>
        </div>
        
      <h2>Daily Task </h2>
      <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->desc }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a href="{{ route('task.show', $task->id) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                        
                            <!-- Add a space or separator between buttons for better visual separation -->
                            <span class="mx-1"></span>
                        
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
      <br>
    
    </div>
   
    
    <div class="footer">
      <p>&copy; 2023. All rights reserved.</p>
    </div>
  </div>
</body>
</html>