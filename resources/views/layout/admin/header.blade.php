<!-- Start of Selection -->
<header>
    <div class="logo">
        <h1>Admin Panel</h1>
    </div>
    <nav>
        <ul>
            <li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/admin/users') }}">Users</a></li>
            <li><a href="{{ url('/admin/settings') }}">Settings</a></li>
            <li><a href="{{ url('/admin/logout') }}">Logout</a></li>
        </ul>
    </nav>
</header>
<aside class="sidebar">
    <ul>
        <li><a href="{{ url('/admin/reports') }}">Reports</a></li>
        <li><a href="{{ url('/admin/analytics') }}">Analytics</a></li>
        <li><a href="{{ url('/admin/support') }}">Support</a></li>
    </ul>
</aside>

<!-- Start Generation Here -->
<style>
    

    header {
        background-color: var(--primary-color);
        color: var(--light-color);
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header .logo h1 {
        margin: 0;
        font-size: 24px;
    }

    nav ul {
        list-style-type: none;
        display: flex;
        padding: 0;
    }

    nav ul li {
        margin-right: 15px;
    }

    nav ul li a {
        color: var(--light-color);
        text-decoration: none;
        font-weight: bold;
    }

    nav ul li a:hover {
        color: var(--secondary-color);
        text-decoration: underline;
    }

    .sidebar {
        background-color: var(--light-color);
        padding: 15px;
        width: 200px;
        border-right: 2px solid var(--border-color);
        position: fixed;
        height: 100vh;
        overflow-y: auto;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin-bottom: 10px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: var(--primary-color);
        font-weight: bold;
        padding: 5px 10px;
        display: block;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .sidebar ul li a:hover {
        background-color: var(--secondary-color);
        color: var(--light-color);
    }

    main {
        margin-left: 100px;
        padding: 20px;
        background-color: #fff;
        min-height: 100vh;
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        header {
            flex-direction: column;
            align-items: flex-start;
        }

        nav ul {
            flex-direction: column;
            width: 100%;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        .sidebar {
            position: relative;
            width: 100%;
            height: auto;
            border-right: none;
            margin-bottom: 20px;
        }

        main {
            margin-left: 0;
        }
    }
</style>
<!-- End Generation Here -->
