@extends('layout.admin.base')

@section('content')


<!-- breadcrumb  -->
    <x-breadcrumb page="Profile"></x-breadcrumb>

    <section id="profile">
        <div class="card my-3 p-3">
            <div class="d-flex align-items-center">
                <div class="profile-img  position-relative">
                    <img data-src="{{ isset($profile->logo) ? url($profile->logo) : '' }}" alt="profile" class="img-fluid rounded-circle lazy" id="profile-img">
                    <div class="profile-img-overlay position-absolute">
                        <div class="circle">
                            <i class="fa-duotone fa-solid fa-camera" id="profile-icon"></i>
                            <input type="file" class="d-none" id="profile-file" accept="image/*">
                        </div>

                    </div>
                </div>
                <div class="profile-text ms-3 admin-name px-2">
                    <h2><span> {{ @$profile->name }} </span></h2>
                    <p>{{ @$profile->slogan }}</p>
                </div>
            </div>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-bio-tab" data-bs-toggle="tab" data-bs-target="#nav-bio" type="button" role="tab" aria-controls="nav-bio" aria-selected="true"> <i class="fa-duotone fa-solid fa-list"></i> &nbsp; Bio Data</button>
                <button class="nav-link" id="nav-site-details-tab" data-bs-toggle="tab" data-bs-target="#nav-site-details" type="button" role="tab" aria-controls="nav-site-details" aria-selected="false"> <i class="fa-duotone fa-solid fa-user"></i> &nbsp; Site Details</button>
                <button class="nav-link" id="nav-change-psw-tab" data-bs-toggle="tab" data-bs-target="#nav-change-psw" type="button" role="tab" aria-controls="nav-change-psw" aria-selected="false"> <i class="fa-duotone fa-solid fa-key"></i> &nbsp; Change Password</button>
                <button class="nav-link" id="nav-social-media-tab" data-bs-toggle="tab" data-bs-target="#nav-social-media" type="button" role="tab" aria-controls="nav-social-media" aria-selected="false"> <i class="fa-duotone fa-solid fa-earth"></i> &nbsp; Social Media</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active p-3" id="nav-bio" role="tabpanel" aria-labelledby="nav-bio-tab">
                    @include('admin.view.profile.bio-data')                    
            </div>
            <div class="tab-pane fade" id="nav-site-details" role="tabpanel" aria-labelledby="nav-site-details-tab">
                @include('admin.view.profile.site-details')
            </div>
            <div class="tab-pane fade" id="nav-change-psw" role="tabpanel" aria-labelledby="nav-change-psw-tab">
                @include('admin.view.profile.change-password')
            </div>
            <div class="tab-pane fade" id="nav-social-media" role="tabpanel" aria-labelledby="nav-social-media-tab">
                @include('admin.view.profile.social-media')
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{{asset('admin/css/pages/profile.css')}}">
    <script src="{{asset('admin/js/pages/profile.js')}}"></script>
@endsection
    