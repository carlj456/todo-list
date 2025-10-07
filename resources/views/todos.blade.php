<!DOCTYPE html>
<html>
<head>
    <title>Simple Todo List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f8fafc; }
        h1 { color: #333; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 8px; width: 250px; }
        button { padding: 8px 12px; margin-left: 5px; cursor: pointer; }
        ul { list-style-type: none; padding: 0; }
        li { background: white; padding: 10px; margin-bottom: 5px; border-radius: 5px; }
        form.inline { display: inline; }
    </style>
</head>
<body>
    <h1>📝 Simple Todo List</h1>

    <!-- Add new todo -->
    <form method="POST" action="/todo">
        @csrf
        <input type="text" name="task" placeholder="Enter a new task..." required>
        <button type="submit">Add</button>
    </form>

    <!-- Show existing todos -->
    <ul>
        @foreach ($todos as $todo)
            <li>
                {{ $todo->task }}
                <form method="POST" action="/todo/{{ $todo->id }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">❌</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
