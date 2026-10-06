<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>

    <h1>Create New User</h1>

    <a href="{{ route('admin.users.index') }}">Back to User Management</a>

    <hr>

    @if ($errors->any())
        <div>
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="password">Password:</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <br>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                required
            >
        </div>

        <br>

        <div>
            <label for="role">Role:</label>

            <select id="role" name="role" required>
                <option value="applicant">Applicant</option>
                <option value="admin">Administrator / HR</option>
            </select>
        </div>

        <br>

        <button type="submit">Create User</button>
    </form>

</body>
</html>