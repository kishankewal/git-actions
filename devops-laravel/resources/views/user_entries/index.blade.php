<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Entries</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        .container { max-width: 800px; margin: 0 auto; }
        .flash { padding: 0.75rem; margin-bottom: 1rem; background: #e8f5e9; border: 1px solid #81c784; }
        .error-list { color: #b71c1c; margin-bottom: 1rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #ddd; padding: 0.5rem; text-align: left; }
        th { background: #f5f5f5; }
        .actions { display: flex; gap: 0.5rem; }
        .btn { display: inline-block; padding: 0.4rem 0.8rem; text-decoration: none; border: 1px solid #333; color: #333; background: #fff; }
        .btn-primary { background: #1976d2; border-color: #1976d2; color: #fff; }
        .btn-danger { background: #c62828; border-color: #c62828; color: #fff; }
        form { margin: 0; }
    </style>
</head>
<body>
<div class="container">
    <h1>User Entries</h1>

    @if (session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a class="btn btn-primary" href="{{ route('user-entries.create') }}">Add User</a>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($entries as $entry)
            <tr>
                <td>{{ $entry->id }}</td>
                <td>{{ $entry->name }}</td>
                <td>{{ $entry->email }}</td>
                <td>{{ $entry->created_at?->format('Y-m-d H:i') }}</td>
                <td>
                    <div class="actions">
                        <a class="btn" href="{{ route('user-entries.edit', $entry) }}">Edit</a>
                        <form action="{{ route('user-entries.destroy', $entry) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Delete this entry?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No user entries found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>