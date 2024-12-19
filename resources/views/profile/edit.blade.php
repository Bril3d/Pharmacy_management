<!-- filepath: /D:/Dev/pharmacy-management/resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Profile</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $user->name) }}" 
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $user->email) }}" 
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        name="password" 
                        placeholder="Leave blank to keep current password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        placeholder="Leave blank to keep current password"
                    >
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ route('profile.show') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection