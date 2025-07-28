<ul>
    <li>
        <a href="{{ url('/admin/dashboard') }}" class="active"> <i class="fa-duotone fa-solid fa-home"></i> Dashboard</a>
    </li>
    <li>
        <a href="{{ url('/admin/category') }}"> <i class="fa-duotone fa-solid fa-user"></i> Category</a>
    </li>
    <li>
        <a href="{{ url('/admin/testimonial') }}"> <i class="fa-duotone fa-solid fa-users"></i> Testimonial</a>
    </li>
    <li>
        <a href="{{ url('/admin/slider') }}"> <i class="fa-duotone fa-solid fa-image"></i> Slider</a>
    </li>
    <li>
        <a href="javascript:void(0);" class="toggle-gallery">
            <span><i class="fa-duotone fa-solid fa-image"></i> Gallery</span>
            <i class="fa-duotone fa-solid fa-angle-down toggle-icon" style="float: right;"></i>
        </a>
        <ul class="gallery-submenu" style="display: none; padding-left: 20px;">
            <li><a href="{{ url('/admin/slider') }}">Image Gallery</a></li>
            <li><a href="{{ url('/admin/slider') }}">Video Gallery</a></li>
        </ul>
    </li>
</ul>