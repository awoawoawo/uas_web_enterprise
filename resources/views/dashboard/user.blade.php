<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sleepy Panda - Database User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #20223F;
            font-family: 'Urbanist', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: #20223F;
            padding: 15px 30px;
        }

        .hamburger {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-text {
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin: 0;
        }

        .search-container {
            position: relative;
        }

        .search-bar {
            background-color: #2d2f4a;
            border: none;
            color: white;
            padding: 10px 15px 10px 40px;
            border-radius: 20px;
            width: 250px;
        }

        .search-bar::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-bar:focus {
            outline: none;
            background-color: #4a5770;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
        }

        .profile-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile-circle {
            width: 40px;
            height: 40px;
            background-color: #e6e6e6;
            border-radius: 50%;
        }

        .profile-text {
            color: white;
            font-size: 14px;
            margin: 0;
        }

        .dashboard-container {
            padding: 20px 80px;
        }

        .stat-card {
            background-color: #272E49;
            border-radius: 12px;
            padding: 25px 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-content h6 {
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            font-weight: 500;
            margin: 0 0 8px 0;
        }

        .stat-content h2 {
            color: white;
            font-size: 36px;
            font-weight: 700;
            margin: 0;
        }

        /* User Table Styles */
        .user-table-container {
            background-color: #272E49;
            border-radius: 12px;
            padding: 30px;
            margin-top: 30px;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .table-search {
            position: relative;
            flex: 1;
            max-width: 500px;
        }

        .table-search input {
            width: 100%;
            background-color: #323448;
            border: none;
            color: white;
            padding: 12px 15px 12px 45px;
            border-radius: 12px;
            font-size: 14px;
        }

        .table-search input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .table-search svg {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
        }

        .table-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .action-btn {
            background-color: #3A4265;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            border-radius: 12px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
        }

        .action-btn:hover {
            background-color: #4A5275;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .user-table thead {
            background-color: #323448;
        }

        .user-table thead th {
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
            font-weight: 600;
            padding: 18px 20px;
            text-align: center;
        }

        .user-table thead th:first-child {
            border-radius: 12px 0 0 12px;
        }

        .user-table thead th:last-child {
            border-radius: 0 12px 12px 0;
        }

        .user-table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 1);
        }

        .user-table tbody tr:last-child {
            border-bottom: none;
        }

        .user-table tbody td {
            padding: 20px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            text-align: center;
        }

        .user-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            text-align: left;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar svg {
            width: 24px;
            height: 24px;
            color: rgba(255, 255, 255, 0.6);
        }

        .user-details h5 {
            margin: 0 0 5px 0;
            color: white;
            font-size: 16px;
            font-weight: 600;
        }

        .user-details p {
            margin: 0;
            color: white;
            font-size: 16px;
        }

        .contact-info {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 12px;
            text-align: left;
        }

        .contact-info svg {
            width: 20px;
            height: 20px;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 2px;
        }

        .contact-details p {
            margin: 0 0 5px 0;
            color: white;
            font-size: 16px;
        }

        .contact-details p:last-child {
            color: white;
            font-size: 16px;
        }

        .sleep-info p {
            margin: 0 0 5px 0;
            color: white;
            font-size: 16px;
        }

        .sleep-info p:last-child {
            color: white;
            font-size: 14px;
        }

        .status-badge {
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            display: inline-block;
        }

        .status-active {
            background-color: #4A7FFF;
            color: white;
        }

        .status-inactive {
            background-color: #FF6B7E;
            color: white;
        }

        .last-active {
            color: white;
            font-size: 16px;
        }

        .history-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .history-icon svg {
            width: 24px;
            height: 24px;
            color: white;
            cursor: pointer;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            left: -20%;
            top: 0;
            width: 20%;
            height: 100vh;
            background-color: #2C2E4E;
            z-index: 1000;
            transition: left 0.3s ease;
            padding: 30px 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar-header {
            color: white;
            font-size: 20px;
            font-weight: 600;
            padding: 0 30px;
            margin-bottom: 40px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0 20px;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 30px;
        }

        .sidebar-menu a {
            display: block;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            padding: 15px 20px;
            transition: all 0.3s ease;
            font-size: 16px;
            border-radius: 10px;
            text-align: center;
            background-color: #2C2E4E;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .sidebar-menu a.active {
            color: rgba(255, 255, 255, 1);
            border-color: rgba(255, 255, 255, 1);
        }

        /* Reduce spacing for grouped menu items */
        .sidebar-menu li.menu-group {
            margin-bottom: 5px;
        }

        .sidebar-menu li.menu-group-end {
            margin-bottom: 15px;
        }

        /* Hide hamburger when sidebar is active */
        .hamburger {
            transition: opacity 0.3s ease;
        }

        .hamburger.hidden {
            opacity: 0;
            pointer-events: none;
        }

        /* Main Content Shift */
        .main-wrapper {
            transition: margin-left 0.3s ease;
        }

        .main-wrapper.shifted {
            margin-left: 20%;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">Admin Site</div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('jurnal') }}">Jurnal</a></li>
            <li><a href="#">Report</a></li>
            <li class="menu-group"><a href="{{ route('user') }}" class="active">Database User</a></li>
            <li class="menu-group"><a href="#" class="active">Update Data</a></li>
            <li class="menu-group-end"><a href="#" class="active">Reset Password</a></li>
        </ul>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper" id="mainWrapper">
        <!-- Navbar -->
        <nav class="navbar-custom">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center gap-4">
                    <button class="hamburger">☰</button>
                    <div class="logo-section">
                        <img src="{{ asset('images/icon.png') }}" alt="Sleepy Panda" style="width: 50px; height: 50px;">
                        <h1 class="logo-text">Sleepy Panda</h1>
                    </div>
                    <div class="search-container">
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        <input type="text" class="search-bar" placeholder="Search">
                    </div>
                </div>
                <div class="profile-section">
                    <div class="profile-circle"></div>
                    <p class="profile-text">Halo, Anthony</p>
                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="dashboard-container">
            <!-- Stats Cards Row -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="rgba(255,255,255,0.7)" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </div>
                        <div class="stat-content">
                            <h6>Total Users</h6>
                            <h2>4500</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="rgba(255,255,255,0.7)" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </div>
                        <div class="stat-content">
                            <h6>Active Users</h6>
                            <h2>3500</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="rgba(255,255,255,0.7)" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                        </div>
                        <div class="stat-content">
                            <h6>New Users</h6>
                            <h2>500</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="rgba(255,255,255,0.7)" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 5-4 5 3 5 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                <path d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </div>
                        <div class="stat-content">
                            <h6>Inactive Users</h6>
                            <h2>500</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Database Table -->
            <div class="user-table-container">
                <div class="table-header">
                    <div class="table-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        <input type="text" placeholder="Search by name, email, or ID">
                    </div>
                    <div class="table-actions">
                        <button class="action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                            </svg>
                            Sort by
                        </button>
                        <button class="action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                            </svg>
                            Refresh
                        </button>
                    </div>
                </div>

                <table class="user-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Contact</th>
                            <th>Sleep Status</th>
                            <th>Status</th>
                            <th>Last Active</th>
                            <th>History</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                    </div>
                                    <div class="user-details">
                                        <h5>Alfonso de</h5>
                                        <p>ID #418230</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                    </svg>
                                    <div class="contact-details">
                                        <p>Alfonso.de@gmail.com</p>
                                        <p>+62123456789</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="sleep-info">
                                    <p>Avg. Sleep: 7.2h</p>
                                    <p>Quality: 85%</p>
                                </div>
                            </td>
                            <td>
                                <span class="status-badge status-active">Active</span>
                            </td>
                            <td>
                                <p class="last-active">2024-02-01<br>14:30</p>
                            </td>
                            <td>
                                <div class="history-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                    </div>
                                    <div class="user-details">
                                        <h5>Alfonso de</h5>
                                        <p>ID #418230</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                    </svg>
                                    <div class="contact-details">
                                        <p>Alfonso.de@gmail.com</p>
                                        <p>+62123456789</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="sleep-info">
                                    <p>Avg. Sleep: 12h</p>
                                    <p>Quality: 20%</p>
                                </div>
                            </td>
                            <td>
                                <span class="status-badge status-inactive">Not Active</span>
                            </td>
                            <td>
                                <p class="last-active">2024-02-01<br>14:30</p>
                            </td>
                            <td>
                                <div class="history-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Sidebar Toggle
            const hamburger = document.querySelector('.hamburger');
            const sidebar = document.getElementById('sidebar');
            const mainWrapper = document.getElementById('mainWrapper');

            hamburger.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                mainWrapper.classList.toggle('shifted');
                hamburger.classList.toggle('hidden');
            });

            // Close sidebar when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnHamburger = hamburger.contains(event.target);

                if (!isClickInsideSidebar && !isClickOnHamburger && sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                    mainWrapper.classList.remove('shifted');
                    hamburger.classList.remove('hidden');
                }
            });
        </script>
</body>

</html>