@extends('layout.admin.base')

@section('content')

@php $profile = (object) $profile; @endphp

<!-- breadcrumb  -->
<x-breadcrumb page="Profile"></x-breadcrumb>

<section id="profile">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-bio-tab" data-bs-toggle="tab" data-bs-target="#nav-bio" type="button" role="tab" aria-controls="nav-bio" aria-selected="true"> <i class="fa-duotone fa-solid fa-list"></i> &nbsp; Bio Data</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> <i class="fa-duotone fa-solid fa-user"></i> &nbsp; Profile</button>
            <button class="nav-link" id="nav-change-psw-tab" data-bs-toggle="tab" data-bs-target="#nav-change-psw" type="button" role="tab" aria-controls="nav-change-psw" aria-selected="false"> <i class="fa-duotone fa-solid fa-key"></i> &nbsp; Change Password</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active p-3" id="nav-bio" role="tabpanel" aria-labelledby="nav-bio-tab">
            <span class="d-flex"> <label for="">Name </label> :
            <input type="text" id="name" name="name" class="form-control d-block w-25 mx-2" value=" S Tech Quality Parts"> </span>
            <i class="fa fa-pen"></i>
            <label for=""> S Tech Quality Parts </label> 
          
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
        <div class="tab-pane fade" id="nav-change-psw" role="tabpanel" aria-labelledby="nav-change-psw-tab">...</div>
    </div>
    <hr>
            <button class="btn btn-primary edit-btn-bio"  id="edit-btn-bio"> Edit <i class="fa-duotone fa-solid fa-pen-line"></i> </button>
            <button class="btn btn-primary save-btn-bio"  id="save-btn-bio"> Save <i class="fa-duotone fa-solid fa-floppy-disk"></i> </button>
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
