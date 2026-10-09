@extends('layouts.admin')

@section('title', 'Student List')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Student Directory</h1>
            <p class="text-muted mb-0">Manage all students</p>
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>
            Add Student
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
        <div class="row align-items-end">
            <div class="col-md-6 mb-3">
                <label class="form-label">Search</label>

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search by name, email, course..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Status</label>

                <select name="status" class="form-control">
                    <option value="">All Status</option>

                    <option value="active"
                        {{ request('status') == 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="inactive"
                        {{ request('status') == 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    Search
                </button>

                <a
                    href="{{ route('students.index') }}"
                    class="btn btn-secondary">
                    Clear
                </a>
            </div>
        </div>
    </form>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped table-hover mb-0">
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
                                    class="d-flex align-items-center">
                                    @csrf
                                    @method('PATCH')

                                    <div class="custom-control custom-switch mr-2">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            id="status{{ $student->id }}"
                                            onchange="this.form.submit()"
                                            {{ $student->status === 'active' ? 'checked' : '' }}>

                                        <label
                                            class="custom-control-label"
                                            for="status{{ $student->id }}"></label>
                                    </div>

                                    <span class="text-muted small">
                                        {{ ucfirst($student->status) }}
                                    </span>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No students found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $students->links() }}
    </div>

</div>

@endsection