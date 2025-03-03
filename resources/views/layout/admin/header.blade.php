<!-- Start of Selection -->
    <header>
        <div class="left-side d-flex">
            <span class="mx-3" id="bars"><i class="fa fa-bars toggle-btn"></i>  <i class="fa fa-times close-btn d-none"></i> </span>
            <h4>AdminPanel</h4>
        </div>
        <div class="dropdown text-end right-side">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('author/fhd-favicon.png')}}" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="{{url('/admin/profile')}}"> <i class="fa-duotone fa-solid fa-user"></i> Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{url('/admin/logout')}}"> <i class="fa-duotone fa-solid fa-power-off"></i> Sign out</a></li>
            </ul>
        </div>
    </header>
 