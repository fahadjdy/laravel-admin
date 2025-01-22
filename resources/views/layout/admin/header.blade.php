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
        <li><a class="dropdown-item" href="#"> <i class="fa fa-user"></i> Profile</a></li>
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


<script>
    // JavaScript to handle toggle functionality
    document.querySelectorAll('.toggle-gallery').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const submenu = this.nextElementSibling;
            const icon = this.querySelector('.toggle-icon');
            if (submenu.style.display === 'none' || submenu.style.display === '') {
                submenu.style.display = 'block';
                icon.classList.remove('fa-angle-down');
                icon.classList.add('fa-angle-up');
            } else {
                submenu.style.display = 'none';
                icon.classList.remove('fa-angle-up');
                icon.classList.add('fa-angle-down');
            }
        });
    });
</script>

<style>
    
    header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0px;
        padding: 12px 20px 3px 20px;
        background-color: #fff;
        box-shadow: 0px -1px 21px -3px var(--light-color)
    }
   
    aside{
        width: 220px;
        float: left;
        background-color:  var(--light-color);
        padding: 8px 0px;
        height: 100vh;
    }

    aside a{
        color: var(--primary-color);
        padding: 5px 23px;
    }
    aside a.active{
        background-color: var(--primary-color);
        color: var(--white-color);
        border-radius: 4px;
    }

    aside li{
        line-height: 35px !important;
        margin: 5px 0;
    }

    aside .toggle-gallery {
        cursor: pointer;
        text-decoration: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    aside .toggle-gallery:hover {
        color: #007bff;
    }

    
    aside ul > ul {
        margin: 5px 0;
    }

    main{
        /* margin-left: 12px; */
        /* width: 80%; */
        float: left;
        padding: 12px 0px 0px 25px;
    }
</style>