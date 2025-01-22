<!-- Start of Selection -->
<header>
    <div class="logo">
        <h4>AdminPanel</h4>
    </div>
    <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{asset('author/fhd-favicon.png')}}" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#"> <i class="fa fa-cog"></i> Settings</a></li>
        <li><a class="dropdown-item" href="{{url('/admin/profile')}}"> <i class="fa fa-user"></i> Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#"> <i class="fa fa-switch-off"></i> Sign out</a></li>
        </ul>
    </div>
</header>
<aside class="sidebar">
<ul>
    <li>
        <a href="{{ url('/admin/dashboard') }}" class="active"> <i class="fa fa-home"></i> Dashboard</a>
    </li>
    <li>
        <a href="{{ url('/admin/category') }}"> <i class="fa fa-user"></i> Category</a>
    </li>
    <li>
        <a href="{{ url('/admin/slider') }}"> <i class="fa fa-image"></i> Slider</a>
    </li>
    <li>
    <a href="javascript:void(0);" class="toggle-gallery">
        <span><i class="fa fa-image"></i> Gallery</span>
        <i class="fa fa-angle-down toggle-icon" style="float: right;"></i>
    </a>
    <ul class="gallery-submenu" style="display: none; padding-left: 20px;">
        <li><a href="{{ url('/admin/slider') }}">Image Gallery</a></li>
        <li><a href="{{ url('/admin/slider') }}">Video Gallery</a></li>
    </ul>
</li>
</ul>

</aside>

