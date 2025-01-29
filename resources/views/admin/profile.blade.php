@extends('layout.admin.base')

@section('content')

@php $profile = (object) $profile; @endphp

<!-- breadcrumb  -->
<x-breadcrumb page="Profile"></x-breadcrumb>

<section id="profile">
    <div class="container">
    <div class="profile-header">
        <div class="profile-img">
            <img src="./bg.jpg" width="150" alt="Profile Image">
        </div>
        <div class="profile-nav-info">
        <h3 class="user-name">Bright Code</h3>
        <div class="address">
            <p id="state" class="state">New York,</p>
            <span id="country" class="country">USA.</span>
        </div>

        </div>
        <div class="profile-option">
        <div class="notification">
            <i class="fa fa-bell"></i>
            <span class="alert-message">3</span>
        </div>
        </div>
    </div>

    <div class="main-bd">
        <div class="left-side">
        <div class="profile-side">
            <p class="mobile-no"><i class="fa fa-phone"></i> +23470xxxxx700</p>
            <p class="user-mail"><i class="fa fa-envelope"></i> Brightisaac80@gmail.com</p>
            <div class="user-bio">
            <h3>Bio</h3>
            <p class="bio">
                Lorem ipsum dolor sit amet, hello how consectetur adipisicing elit. Sint consectetur provident magni yohoho consequuntur, voluptatibus ghdfff exercitationem at quis similique. Optio, amet!
            </p>
            </div>
            <div class="profile-btn">
            <button class="chatbtn" id="chatBtn"><i class="fa fa-comment"></i> Chat</button>
            <button class="createbtn" id="Create-post"><i class="fa fa-plus"></i> Create</button>
            </div>
            <div class="user-rating">
            <h3 class="rating">4.5</h3>
            <div class="rate">
                <div class="star-outer">
                <div class="star-inner">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                </div>
                <span class="no-of-user-rate"><span>123</span>&nbsp;&nbsp;reviews</span>
            </div>

            </div>
        </div>

        </div>
        <div class="right-side">

        <div class="nav">
            <ul>
            <li onclick="tabs(0)" class="user-post active">Deatils</li>
            <li onclick="tabs(1)" class="user-review">Feature</li>
            <li onclick="tabs(2)" class="user-setting">password</li>
            </ul>
        </div>
        <div class="profile-body">

            <!-- // first tab //-->
            <div class="profile-posts tab">
                <div class="mb-3">
                    <label class="form-label">Choose Logo</label>
                    <input type="file" class=" p-2 w-100" id="logo" name="logo">
                </div>
                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" class=" p-2 w-100" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">About Us</label>
                    <textarea name="about_us" id="about_us" cols="4" rows="6" class="w-100 "></textarea>
                </div>
            </div>

            <!-- // second tab //-->
            <div class="profile-reviews tab">
                <h1>User reviews</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam pariatur officia, aperiam quidem quasi, tenetur molestiae. Architecto mollitia laborum possimus iste esse. Perferendis tempora consectetur, quae qui nihil voluptas. Maiores debitis
                    repellendus excepturi quisquam temporibus quam nobis voluptatem, reiciendis distinctio deserunt vitae! Maxime provident, distinctio animi commodi nemo, eveniet fugit porro quos nesciunt quidem a, corporis nisi dolorum minus sit eaque error
                    sequi ullam. Quidem ut fugiat, praesentium velit aliquam!</p>
            </div>

            <!-- // third tab //-->
            <div class="profile-settings tab">
                <div class="account-setting">
                    <h1>Acount Setting</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit omnis eaque, expedita nostrum, facere libero provident laudantium. Quis, hic doloribus! Laboriosam nemo tempora praesentium. Culpa quo velit omnis, debitis maxime, sequi
                    animi dolores commodi odio placeat, magnam, cupiditate facilis impedit veniam? Soluta aliquam excepturi illum natus adipisci ipsum quo, voluptatem, nemo, commodi, molestiae doloribus magni et. Cum, saepe enim quam voluptatum vel debitis
                    nihil, recusandae, omnis officiis tenetur, ullam rerum.</p>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
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
