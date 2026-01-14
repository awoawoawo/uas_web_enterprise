<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sleepy Panda - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
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
            padding: 30px 60px;
            background-color: #272E49;
            border-radius: 30px;
            margin: 0 30px 30px 30px;
            overflow: hidden;
            box-sizing: border-box;
        }

        .page-title {
            color: white;
            font-size: 32px;
            font-weight: 600;
            text-align: center;
            margin: 30px 30px 20px 30px;
        }

        .view-selector {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
        }

        .view-dropdown {
            background-color: rgba(0, 0, 0, 0.3);
            border: none;
            color: white;
            font-size: 32px;
            font-weight: 600;
            cursor: pointer;
            padding: 5px 40px 5px 20px;
            appearance: none;
            border-radius: 10px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='white' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
        }

        .view-dropdown:focus {
            outline: none;
        }

        .content-layout {
            display: flex;
            gap: 30px;
            align-items: stretch;
            max-width: 100%;
            box-sizing: border-box;
        }

        .left-panel {
            flex: 0 0 35%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .right-panel {
            flex: 1;
            background-color: #3E4465;
            border-radius: 20px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            min-width: 0;
            overflow: hidden;
            box-sizing: border-box;
        }

        .report-card {
            background-color: #3E4465;
            border-radius: 20px;
            padding: 25px 30px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #weeklyCard {
            flex: none;
            height: 45%;
            min-height: 200px;
        }

        .monthly-card {
            flex: 1 !important;
        }

        .report-date {
            color: white;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }

        .report-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .report-stats.weekly-stats {
            display: flex;
            gap: 30px;
            align-items: stretch;
        }

        .weekly-stats .stat-item.user-stat {
            flex: 0 0 auto;
            min-width: 120px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
        }

        .weekly-stats .stats-grid {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
        }

        .weekly-stats .stat-item {
            flex: none;
        }

        .stat-icon-small {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-info h6 {
            color: rgba(255, 255, 255, 0.7);
            font-size: 11px;
            margin: 0 0 3px 0;
            font-weight: 400;
        }

        .stat-info p {
            color: white;
            font-size: 14px;
            margin: 0;
            font-weight: 600;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .chart-title {
            color: white;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }

        .date-selector {
            background-color: rgba(0, 0, 0, 0.3);
            border: none;
            color: white;
            font-size: 14px;
            cursor: pointer;
            padding: 8px 35px 8px 15px;
            appearance: none;
            border-radius: 8px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
        }

        .date-selector:focus {
            outline: none;
        }

        .chart-container {
            height: 420px;
            position: relative;
            max-width: 100%;
            box-sizing: border-box;
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
            margin-bottom: 15px;
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
            transition: all 0.3s ease;
        }

        .main-wrapper.shifted {
            margin-left: 20%;
            width: calc(100% - 20%);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">Admin Site</div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('jurnal') }}" class="active">Jurnal</a></li>
            <li><a href="#">Report</a></li>
            <li><a href="{{ route('user') }}">Database User</a></li>
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

        <!-- Page Title -->
        <h1 class="page-title">Jurnal Tidur Report</h1>

        <!-- Dashboard Content -->
        <div class="dashboard-container">
            <!-- View Selector -->
            <div class="view-selector">
                <select class="view-dropdown" id="viewDropdown" onchange="toggleView()">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>

            <!-- Content Layout -->
            <div class="content-layout">
                <!-- Left Panel - Report Cards -->
                <div class="left-panel" id="leftPanel">
                    <!-- Report Card 1 -->
                    <div class="report-card">
                        <div class="report-date">12 Agustus 2023</div>
                        <div class="report-stats">
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFD93D" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>User</h6>
                                    <p>1000</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FF6B9D" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>Average Durasi tidur</h6>
                                    <p>7 jam 2 menit</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>Average Waktu tidur</h6>
                                    <p>21:30 - 06:10</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Card 2 -->
                    <div class="report-card">
                        <div class="report-date">12 Agustus 2023</div>
                        <div class="report-stats">
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFD93D" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>User</h6>
                                    <p>1000</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FF6B9D" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>Average Durasi tidur</h6>
                                    <p>7 jam 2 menit</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>Average Waktu tidur</h6>
                                    <p>21:30 - 06:10</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Card 3 -->
                    <div class="report-card">
                        <div class="report-date">12 Agustus 2023</div>
                        <div class="report-stats">
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFD93D" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>User</h6>
                                    <p>1000</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FF6B9D" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>Average Durasi tidur</h6>
                                    <p>7 jam 2 menit</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>Average Waktu tidur</h6>
                                    <p>21:30 - 06:10</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Weekly Report Card (hidden by default) -->
                    <div class="report-card" id="weeklyCard" style="display: none;">
                        <div class="report-date">1 Juni - 7 Juni 2023</div>
                        <div class="report-stats weekly-stats">
                            <!-- User Section on Left -->
                            <div class="stat-item user-stat">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="#FFD93D" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>User</h6>
                                    <p>4000</p>
                                </div>
                            </div>

                            <!-- Stats Grid on Right -->
                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FF6B9D" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Durasi tidur</h6>
                                        <p>8 jam 2 menit</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Total<br>Durasi tidur</h6>
                                        <p>60 jam 51 menit</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Mulai tidur</h6>
                                        <p>21:08</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Bangun tidur</h6>
                                        <p>06:30</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Report Card 1 (hidden by default) -->
                    <div class="report-card monthly-card" id="monthlyCard1" style="display: none;">
                        <div class="report-date">Juni 2023</div>
                        <div class="report-stats weekly-stats">
                            <div class="stat-item user-stat">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFD93D" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>User</h6>
                                    <p>5000</p>
                                </div>
                            </div>
                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FF6B9D" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Durasi tidur</h6>
                                        <p>8 jam 2 menit</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Total<br>Durasi tidur</h6>
                                        <p>60 jam 51 menit</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Mulai tidur</h6>
                                        <p>21:08</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M8 3.5a .5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Bangun tidur</h6>
                                        <p>06:30</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Report Card 2 (hidden by default) -->
                    <div class="report-card monthly-card" id="monthlyCard2" style="display: none;">
                        <div class="report-date">Mei 2023</div>
                        <div class="report-stats weekly-stats">
                            <div class="stat-item user-stat">
                                <div class="stat-icon-small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFD93D" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </div>
                                <div class="stat-info">
                                    <h6>User</h6>
                                    <p>8000</p>
                                </div>
                            </div>
                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FF6B9D" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Durasi tidur</h6>
                                        <p>7 jam 15 menit</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Total<br>Durasi tidur</h6>
                                        <p>53 jam 15 menit</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Mulai tidur</h6>
                                        <p>22:18</p>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon-small">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#FFA500" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                    </div>
                                    <div class="stat-info">
                                        <h6>Average<br>Bangun tidur</h6>
                                        <p>06:40</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Panel - Chart -->
                <div class="right-panel">
                    <div class="chart-header">
                        <h3 class="chart-title">Users</h3>
                        <select class="date-selector" id="dateSelector">
                            <option>12 Agustus 2023</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="dailyLineChart"></canvas>
                        <canvas id="weeklyBarChart" style="display: none;"></canvas>
                        <canvas id="monthlyBarChart" style="display: none;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Chart.js default configuration
            Chart.defaults.color = 'rgba(255, 255, 255, 0.6)';
            Chart.defaults.borderColor = 'rgba(255, 255, 255, 0.1)';
            Chart.defaults.font.family = 'Urbanist';

            // Custom Y-axis scale mapping function
            function mapValueToScale(value) {
                // Map data values to evenly spaced positions
                // 0->0, 10->1, 100->2, 1000->3, 2000->4, 2500->5
                if (value <= 0) return 0;
                if (value <= 10) return (value / 10) * 1;
                if (value <= 100) return 1 + ((value - 10) / 90) * 1;
                if (value <= 1000) return 2 + ((value - 100) / 900) * 1;
                if (value <= 2000) return 3 + ((value - 1000) / 1000) * 1;
                if (value <= 2500) return 4 + ((value - 2000) / 500) * 1;
                return 5;
            }

            let dailyChart = null;
            let weeklyChart = null;
            let monthlyChart = null;

            // Toggle between Daily, Weekly, and Monthly views
            function toggleView() {
                const view = document.getElementById('viewDropdown').value;
                const dailyCards = document.querySelectorAll('.report-card:not(#weeklyCard):not(#monthlyCard1):not(#monthlyCard2)');
                const weeklyCard = document.getElementById('weeklyCard');
                const monthlyCard1 = document.getElementById('monthlyCard1');
                const monthlyCard2 = document.getElementById('monthlyCard2');
                const dailyCanvas = document.getElementById('dailyLineChart');
                const weeklyCanvas = document.getElementById('weeklyBarChart');
                const monthlyCanvas = document.getElementById('monthlyBarChart');
                const dateSelector = document.getElementById('dateSelector');

                if (view === 'daily') {
                    dailyCards.forEach(card => card.style.display = 'flex');
                    weeklyCard.style.display = 'none';
                    monthlyCard1.style.display = 'none';
                    monthlyCard2.style.display = 'none';
                    dailyCanvas.style.display = 'block';
                    weeklyCanvas.style.display = 'none';
                    monthlyCanvas.style.display = 'none';
                    dateSelector.innerHTML = '<option>12 Agustus 2023</option>';
                } else if (view === 'weekly') {
                    dailyCards.forEach(card => card.style.display = 'none');
                    weeklyCard.style.display = 'flex';
                    monthlyCard1.style.display = 'none';
                    monthlyCard2.style.display = 'none';
                    dailyCanvas.style.display = 'none';
                    weeklyCanvas.style.display = 'block';
                    monthlyCanvas.style.display = 'none';
                    dateSelector.innerHTML = '<option>1 Juni -7 Juni 2023</option>';

                    // Create weekly chart if not exists
                    if (!weeklyChart) {
                        weeklyChart = new Chart(weeklyCanvas, {
                            type: 'bar',
                            data: {
                                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                                datasets: [{
                                    data: [5, 7, 4.5, 9, 7, 7.5, 3.5],
                                    backgroundColor: '#E94B7E',
                                    borderRadius: 5,
                                    barThickness: 40
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 10,
                                        ticks: {
                                            stepSize: 2,
                                            color: 'rgba(255, 255, 255, 0.6)',
                                            font: {
                                                size: 12
                                            },
                                            callback: function(value) {
                                                return value + 'j';
                                            }
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    x: {
                                        ticks: {
                                            color: 'rgba(255, 255, 255, 0.6)',
                                            font: {
                                                size: 12
                                            }
                                        },
                                        grid: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        });
                    }
                } else if (view === 'monthly') {
                    dailyCards.forEach(card => card.style.display = 'none');
                    weeklyCard.style.display = 'none';
                    monthlyCard1.style.display = 'flex';
                    monthlyCard2.style.display = 'flex';
                    dailyCanvas.style.display = 'none';
                    weeklyCanvas.style.display = 'none';
                    monthlyCanvas.style.display = 'block';
                    dateSelector.innerHTML = '<option>Juni 2023</option>';

                    if (!monthlyChart) {
                        monthlyChart = new Chart(monthlyCanvas, {
                            type: 'bar',
                            data: {
                                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                datasets: [{
                                    data: [5, 4, 7, 7],
                                    backgroundColor: '#E94B7E',
                                    borderRadius: 5,
                                    barThickness: 50
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 10,
                                        ticks: {
                                            stepSize: 2,
                                            color: 'rgba(255, 255, 255, 0.6)',
                                            font: {
                                                size: 12
                                            },
                                            callback: function(value) {
                                                return value + 'j';
                                            }
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    x: {
                                        ticks: {
                                            color: 'rgba(255, 255, 255, 0.6)',
                                            font: {
                                                size: 12
                                            }
                                        },
                                        grid: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
            }

            // Daily Line Chart
            dailyChart = new Chart(document.getElementById('dailyLineChart'), {
                type: 'line',
                data: {
                    labels: ['0j', '2j', '4j', '6j', '8j'],
                    datasets: [{
                        data: [500, 1000, 100, 10, 850, 900, 2500],
                        borderColor: '#FFA500',
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        tension: 0,
                        pointRadius: 5,
                        pointBackgroundColor: '#FFFFFF',
                        pointBorderColor: '#FFFFFF',
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 2500,
                            ticks: {
                                stepSize: 500,
                                color: 'rgba(255, 255, 255, 0.6)',
                                font: {
                                    size: 12
                                }
                            },
                            grid: {
                                display: false
                            }
                        },
                        x: {
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.6)',
                                font: {
                                    size: 12
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

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