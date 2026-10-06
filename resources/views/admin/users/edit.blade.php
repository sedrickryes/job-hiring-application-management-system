<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

    <h1>Edit User</h1>

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

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
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
                value="{{ old('email', $user->email) }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="role">Role:</label>

            <select id="role" name="role" required>
                <option value="applicant"
                    {{ old('role', $user->role) === 'applicant' ? 'selected' : '' }}>
                    Applicant
                </option>

                <option value="admin"
                    {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>
                    Administrator / HR
                </option>
            </select>
        </div>

        <br>

        <button type="submit">Update User</button>
    </form>

</body>
</html>