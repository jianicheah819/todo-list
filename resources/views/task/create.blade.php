
<!DOCTYPE html>
<html>
<head>
  <title>New Task</title>
</head>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

/* Container styles */
.card {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
/* Heading styles */
h5 {
  text-align: center;
  margin-bottom: 20px;
}

/* Form styles */
form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
}

input[type="text"],
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #bbd20c;
}

/* Error message styles */
.error-message {
  color: red;
  margin-bottom: 8px;
}
  </style>
<body>

<div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="m-0">Task Form</h5>
        <div class="button-container">
          <a href="{{ route('task.index') }}" >Back</a>
        </div>
      </div>
      <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name">Title *</label> 
                  <input id="title" name="title" type="text" class="form-control" required="required" aria-describedby="titleHelpBlock" value="{{ old('title') }}"> 
                  @error('title')
                    <span id="titleHelpBlock" class="form-text text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="desc">Description *</label> 
                  <input id="desc" name="desc" type="text" class="form-control" required="required" aria-describedby="descHelpBlock" value="{{ old('desc') }}"> 
                  @error('desc')
                    <span id="descHelpBlock" class="form-text text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="priority">Priority *</label>
                    <select name="priority" id="priority" class="form-control" required>
                        <option value="low" {{ old('priority') === 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority') === 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority') === 'high' ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="not completed" {{ old('status') === 'not completed' ? 'selected' : '' }}>Not Completed</option>
                    </select>
                    @error('status')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                  <button name="submit" type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
      </div>
    </div>
</div>
<!-- /.col-md-6 -->
</body>
</html>