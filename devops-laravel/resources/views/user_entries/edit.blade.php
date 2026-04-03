<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Entry</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        .container { max-width: 600px; margin: 0 auto; }
        .field { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 0.35rem; }
        input { width: 100%; padding: 0.55rem; border: 1px solid #ccc; }
        .error-list { color: #b71c1c; margin-bottom: 1rem; }
        .btn { display: inline-block; padding: 0.4rem 0.8rem; text-decoration: none; border: 1px solid #333; color: #333; background: #fff; cursor: pointer; }
        .btn-primary { background: #1976d2; border-color: #1976d2; color: #fff; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit User Entry</h1>

    @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('user-entries.update', $userEntry) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $userEntry->name) }}" required>
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $userEntry->email) }}" required>
        </div>

        <button class="btn btn-primary" type="submit">Update</button>
        <a class="btn" href="{{ route('user-entries.index') }}">Back</a>
    </form>
</div>
</body>
</html>