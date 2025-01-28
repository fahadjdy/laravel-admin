@extends('layout.admin.base')

@section('content')

    @php $profile = (object) $profile; @endphp 
   
    <!-- breadcrumb  -->
    <x-breadcrumb page="Profile"></x-breadcrumb>
    

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Logo -->
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
                @if ($profile->logo)
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" height="50">
                @endif
            </div>

            <!-- Favicon -->
            <div class="mb-3">
                <label for="favicon" class="form-label">Favicon</label>
                <input type="file" class="form-control" id="favicon" name="favicon">
                @if ($profile->favicon)
                    <img src="{{ asset('storage/' . $profile->favicon) }}" alt="Favicon" height="50">
                @endif
            </div>

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $profile->name }}" required>
            </div>

            <!-- Slogan -->
            <div class="mb-3">
                <label for="slogan" class="form-label">Slogan</label>
                <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $profile->slogan }}">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}" required>
            </div>

            <!-- About Content -->
            <div class="mb-3">
                <label for="about_content" class="form-label">About Content</label>
                <textarea class="form-control" id="about_content" name="about_content" rows="5">{{ $profile->about_content }}</textarea>
            </div>

            <!-- About Image -->
            <div class="mb-3">
                <label for="about_image" class="form-label">About Image</label>
                <input type="file" class="form-control" id="about_image" name="about_image">
                @if ($profile->about_image)
                    <img src="{{ asset('storage/' . $profile->about_image) }}" alt="About Image" height="100">
                @endif
            </div>

            <!-- Checkbox Options -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="watermark_images" name="watermark_images" {{ $profile->watermark_images ? 'checked' : '' }}>
                <label class="form-check-label" for="watermark_images">Enable Watermark for Images</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="feature_x" name="feature_x" {{ $profile->feature_x ? 'checked' : '' }}>
                <label class="form-check-label" for="feature_x">Enable Feature X</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>

        <hr>

        <h2>Change Password</h2>
        <form action="{{ url('admin.profile.change_password') }}" method="POST">
            @csrf

            <!-- Current Password -->
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>

            <!-- Confirm New Password -->
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-warning">Change Password</button>
        </form>
@endsection

