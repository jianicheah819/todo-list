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

.button-container {
      margin-bottom: 20px;
      text-align: right;
    }
    
    .button-container a {
      background-color: #ec0d0d;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
      margin-right: 10px;
    }
    
    .button-container a:hover {
      background-color: #f39e00;
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
         
          <a href="{{ route('task.index') }}" >Back</a>
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
    </div>
      <br>
    
    </div>
   
    
    <div class="footer">
      <p>&copy; 2023. All rights reserved.</p>
    </div>
  </div>
</body>
</html>