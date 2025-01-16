<!-- Start of Selection -->
<header>
    <div class="logo">
        <h4>Admin Panel</h4>
    </div>
    <div class="setting">
        <img src="{{asset('author/fhd-favicon.png')}}" alt="Admin Profile" id="profileImage" >
        <nav id="navMenu" style="display: none;
    position: absolute;
    right: 50px;">
            <ul>
                <li><a href="{{ url('/admin/settings') }}"> <i class="fa fa-user mr-1"></i> Profile</a></li>
                <li><a href="{{ url('/admin/settings') }}"> <i class="fa fa-cog mr-1"></i> Setting</a></li>
                <li><a href="{{ url('/admin/logout') }}"> <i class="fas fa-sign-out-alt mr-1" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </nav>
    </div>
</header>
<aside class="sidebar">
    <ul>
        <li><a href="{{ url('/admin/reports') }}">Reports</a></li>
        <li><a href="{{ url('/admin/analytics') }}">Analytics</a></li>
        <li><a href="{{ url('/admin/support') }}">Support</a></li>
    </ul>
</aside>
<script>
   
</script>
<style>
    header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0px;
        padding: 0px 15px;
        background-color: #fff;
        box-shadow: 0px -1px 21px -3px var(--light-color)
    }
    header .setting img{
        cursor: pointer;position:relative;max-width:50px;
    }
    header .setting ul li:nth-child(1){
        border-top: 1px solid var(--primary-color);
    }
    header .setting ul li{
        background-color: var(--white-color);
        width: 100%;
        padding: 8px 30px;
        border-bottom: 1px solid var(--primary-color);
        transition: background-color 0.4s ease, color 0.4s ease !important;
        /* box-shadow: -3px -2px 13px -9px var(--dark-color); */
    }

    header .setting ul li a{
        color: var(--primary-color) !important;
        display: inline-block;
    }
    header .setting ul li:hover{
        background-color: var(--light-color);
        transition: background-color 0.4s ease, color 0.4s ease !important;;
    }
    header .setting ul li:hover a{
        color:var(--primary-color) !important;
    }
    aside{
        width: 10%;
        float: left;
        background-color:  var(--primary-color);
        padding: 8px 15px;
        height: 100vh;
    }
    main{
        /* margin-left: 12px; */
        width: 90%;
        float: left;
        padding: 12px 0px 0px 25px;
    }
</style>