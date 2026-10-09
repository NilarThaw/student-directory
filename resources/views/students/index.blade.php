<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Student Directory</title>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-1">Student Directory</h1>
                <p class="text-muted mb-0">Manage all students</p>
            </div>

            <a href="{{ route('students.create') }}" class="btn btn-primary">
                + Add Student
            </a>
        </div>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form
            action="{{ route('students.index') }}"
            method="GET"
            class="card card-body shadow-sm mb-4">
            <div class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label class="form-label">Search</label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search by name, email, course..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>

                    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                        Clear
                    </a>
                </div>
            </div>
        </form>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr class="table-dark">
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->student_code }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->course }}</td>
                                    <td>
                                        <form
                                            action="{{ route('students.update-status', $student) }}"
                                            method="POST"
                                            class="d-flex align-items-center gap-2">
                                            @csrf
                                            @method('PATCH')

                                            <div class="form-check form-switch">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    role="switch"
                                                    onchange="this.form.submit()"
                                                    {{ $student->status === 'active' ? 'checked' : '' }}>
                                            </div>

                                            <span class="text-muted small">
                                                {{ ucfirst($student->status) }}
                                            </span>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No students found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

        {{ $students->links() }}
    </div>
</body>

</html>