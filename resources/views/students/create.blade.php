@extends('layouts.admin')

@section('title', 'Create Student')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Add Student
        </h1>

        <a
            href="{{ route('students.index') }}"
            class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Back
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Student Information
                    </h6>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Please fix the following errors:</strong>

                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form
                        action="{{ route('students.store') }}"
                        method="POST"
                        class="needs-validation"
                        novalidate>
                        @csrf

                        <div class="form-group">
                            <label for="name">
                                Name
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                maxlength="255"
                                required>

                            <div class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @else
                                Please enter student name.
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                maxlength="255"
                                required>

                            <div class="invalid-feedback">
                                @error('email')
                                {{ $message }}
                                @else
                                Please enter a valid email address.
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">
                                Phone
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}"
                                maxlength="11">

                            <div class="invalid-feedback">
                                @error('phone')
                                {{ $message }}
                                @else
                                Phone number must be 11 characters or less.
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="course">
                                Course
                            </label>

                            <input
                                type="text"
                                id="course"
                                name="course"
                                class="form-control @error('course') is-invalid @enderror"
                                value="{{ old('course') }}"
                                maxlength="255"
                                required>

                            <div class="invalid-feedback">
                                @error('course')
                                {{ $message }}
                                @else
                                Please enter course name.
                                @enderror
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Save Student
                        </button>

                        <a
                            href="{{ route('students.index') }}"
                            class="btn btn-secondary">
                            Cancel
                        </a>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    (function() {
        'use strict';

        var forms = document.getElementsByClassName('needs-validation');

        Array.prototype.forEach.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endpush