@extends('layout.admin.base')

@section('content')

@php $profile = (object) $profile; @endphp

<!-- breadcrumb  -->
    <x-breadcrumb page="Profile"></x-breadcrumb>

    <section id="profile">
        <div class="card my-3 p-3">
            <div class="d-flex align-items-center">
                <div class="profile-img  position-relative">
                    <img src="{{ asset('admin/img/auth/login-bg.jpg') }}" alt="profile" class="img-fluid rounded-circle" id="profile-img">
                    <div class="profile-img-overlay position-absolute">
                        <div class="circle">
                            <i class="fa-duotone fa-solid fa-camera" id="profile-icon"></i>
                            <input type="file" class="d-none" id="profile-file" accept="image/*">
                        </div>

                    </div>
                </div>
                <div class="profile-text ms-3 admin-name px-2">
                    <h2><span> Altron </span></h2>
                    <p>We deliver the quality</p>
                </div>
            </div>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-bio-tab" data-bs-toggle="tab" data-bs-target="#nav-bio" type="button" role="tab" aria-controls="nav-bio" aria-selected="true"> <i class="fa-duotone fa-solid fa-list"></i> &nbsp; Bio Data</button>
                <button class="nav-link" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about" aria-selected="false"> <i class="fa-duotone fa-solid fa-user"></i> &nbsp; About</button>
                <button class="nav-link" id="nav-change-psw-tab" data-bs-toggle="tab" data-bs-target="#nav-change-psw" type="button" role="tab" aria-controls="nav-change-psw" aria-selected="false"> <i class="fa-duotone fa-solid fa-key"></i> &nbsp; Change Password</button>
                <button class="nav-link" id="nav-social-media-tab" data-bs-toggle="tab" data-bs-target="#nav-social-media" type="button" role="tab" aria-controls="nav-social-media" aria-selected="false"> <i class="fa-duotone fa-solid fa-earth"></i> &nbsp; Social Media</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active p-3" id="nav-bio" role="tabpanel" aria-labelledby="nav-bio-tab">
                    @include('admin.view.profile.bio-data')
                    
            </div>
            <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                @include('admin.view.profile.about')
            </div>
            <div class="tab-pane fade" id="nav-change-psw" role="tabpanel" aria-labelledby="nav-change-psw-tab">
                @include('admin.view.profile.change-password')
            </div>
            <div class="tab-pane fade" id="nav-social-media" role="tabpanel" aria-labelledby="nav-social-media-tab">
                @include('admin.view.profile.social-media')
            </div>
        </div>
        <hr>
                <button class="btn btn-primary edit-btn"  id="edit-btn"> Edit <i class="fa-duotone fa-solid fa-pen-line"></i> </button>
                <button class="btn btn-primary save-btn"  id="save-btn" > Save <i class="fa-duotone fa-solid fa-floppy-disk"></i> </button>
    </section>

@endsection

@section('js')
<link rel="stylesheet" href="{{asset('admin/css/pages/profile.css')}}">
<script src="{{asset('admin/js/pages/profile.js')}}"></script>
@endsection


<!--
Logo
Company Name
Company Slogan
About us / Image
Contact multiple
Email
Feature management >> is Watermark
Change Password
-->
