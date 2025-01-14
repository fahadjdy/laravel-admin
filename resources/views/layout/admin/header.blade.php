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
                <li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ url('/admin/users') }}">Users</a></li>
                <li><a href="{{ url('/admin/settings') }}">Settings</a></li>
                <li><a href="{{ url('/admin/logout') }}">Logout</a></li>
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
        box-shadow: 0px 4px 28px 6px var(--light-color);
    }
    header .setting img{
        cursor: pointer;position:relative;max-width:50px;
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