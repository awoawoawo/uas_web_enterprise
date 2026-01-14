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
            padding: 20px 80px;
        }

        .chart-card {
            background-color: #20223F;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 40px;
        }

        .chart-title {
            color: white;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .chart-legend {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            color: white;
        }

        .legend-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .legend-female {
            background-color: #E94B7E;
        }

        .legend-male {
            background-color: #5B7FD9;
        }

        /* Bar Chart dengan CSS */
        .bar-chart {
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            height: 180px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .bar-group {
            display: flex;
            gap: 4px;
            align-items: flex-end;
        }

        .bar {
            width: 14px;
            border-radius: 3px 3px 0 0;
        }

        .bar-female {
            background-color: #E94B7E;
        }

        .bar-male {
            background-color: #5B7FD9;
        }

        .chart-labels {
            display: flex;
            justify-content: space-around;
            padding-top: 8px;
        }

        .chart-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 10px;
        }

        .y-axis {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 180px;
            padding-right: 10px;
        }

        .y-label {
            color: rgba(255, 255, 255, 0.5);
            font-size: 9px;
        }

        .stat-card {
            background-color: #272E49;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            max-width: 420px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-content h6 {
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            margin: 0 0 5px 0;
        }

        .stat-content h2 {
            color: white;
            font-size: 32px;
            font-weight: 700;
            margin: 0;
        }

        /* Line Chart CSS */
        .line-chart-container {
            position: relative;
            height: 200px;
            padding: 20px 0;
        }

        .line-chart-grid {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .grid-line {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
        }

        .line-chart-labels {
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
        }

        .line-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 11px;
        }

        .y-axis-line {
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-right: 10px;
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
            <li><a href="{{ route('dashboard') }}" class="active">Dashboard</a></li>
            <li><a href="{{ route('jurnal') }}">Jurnal</a></li>
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

        <!-- Dashboard Content -->
        <div class="dashboard-container">
            <!-- Top Charts Row -->
            <div class="row mb-3">
                <!-- Daily Report -->
                <div class="col-md-4">
                    <div class="chart-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <h3 class="chart-title">Daily Report</h3>
                            <div class="chart-legend">
                                <div class="legend-item">
                                    <span class="legend-dot legend-female"></span>
                                    <span>Female</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot legend-male"></span>
                                    <span>Male</span>
                                </div>
                            </div>
                        </div>
                        <div style="height: 220px; padding: 10px;">
                            <canvas id="dailyChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Weekly Report -->
                <div class="col-md-4">
                    <div class="chart-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <h3 class="chart-title">Weekly Report</h3>
                            <div class="chart-legend">
                                <div class="legend-item">
                                    <span class="legend-dot legend-female"></span>
                                    <span>Female</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot legend-male"></span>
                                    <span>Male</span>
                                </div>
                            </div>
                        </div>
                        <div style="height: 220px; padding: 10px;">
                            <canvas id="weeklyChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Monthly Report -->
                <div class="col-md-4">
                    <div class="chart-card">
                        <div class="d-flex justify-content-between align-items-start">
                            <h3 class="chart-title">Monthly Report</h3>
                            <div class="chart-legend">
                                <div class="legend-item">
                                    <span class="legend-dot legend-female"></span>
                                    <span>Female</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot legend-male"></span>
                                    <span>Male</span>
                                </div>
                            </div>
                        </div>
                        <div style="height: 220px; padding: 10px;">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards Row -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgba(255,255,255,0.6)" viewBox="0 0 16 16">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgba(255,255,255,0.6)" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </div>
                        <div class="stat-content">
                            <h6>Female Users</h6>
                            <h2>2000</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgba(255,255,255,0.6)" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </div>
                        <div class="stat-content">
                            <h6>Male Users</h6>
                            <h2>2500</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgba(255,255,255,0.6)" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                            </svg>
                        </div>
                        <div class="stat-content">
                            <h6>Avarage Time</h6>
                            <h2>154.25</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Chart - Average Users Sleep Time -->
            <div class="row">
                <div class="col-12">
                    <div class="chart-card">
                        <h3 class="chart-title">Average Users Sleep Time</h3>
                        <div class="d-flex gap-3 mb-3">
                            <div class="legend-item">
                                <span class="legend-dot legend-female"></span>
                                <span>Female</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot legend-male"></span>
                                <span>Male</span>
                            </div>
                        </div>
                        <div style="height: 280px; padding: 10px;">
                            <canvas id="sleepTimeChart"></canvas>
                        </div>
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

            // Daily Report Chart
            const dailyDataFemale = [2000, 2000, 1400, 2200, 1800, 400, 600];
            const dailyDataMale = [1200, 2100, 1600, 2200, 200, 1000, 400];

            new Chart(document.getElementById('dailyChart'), {
                type: 'bar',
                data: {
                    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    datasets: [{
                        label: 'Female',
                        data: dailyDataFemale.map(mapValueToScale),
                        backgroundColor: '#E94B7E',
                        borderRadius: 3,
                        barThickness: 5,
                        borderSkipped: false
                    }, {
                        label: 'Male',
                        data: dailyDataMale.map(mapValueToScale),
                        backgroundColor: '#5B7FD9',
                        borderRadius: 3,
                        barThickness: 5,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                label: function(context) {
                                    const originalData = context.datasetIndex === 0 ? dailyDataFemale : dailyDataMale;
                                    return context.dataset.label + ': ' + originalData[context.dataIndex];
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 5,
                            ticks: {
                                callback: function(value) {
                                    const labels = {
                                        0: '0',
                                        1: '10',
                                        2: '100',
                                        3: '1000',
                                        4: '2000',
                                        5: '2500'
                                    };
                                    return labels[value] || '';
                                },
                                stepSize: 1,
                                color: 'rgba(255, 255, 255, 0.5)',
                                font: {
                                    size: 9
                                }
                            },
                            grid: {
                                display: false,
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.6)',
                                font: {
                                    size: 10
                                }
                            }
                        }
                    },
                    categoryPercentage: 0.95,
                    barPercentage: 0.85
                }
            });

            // Weekly Report Chart
            const weeklyDataFemale = [2100, 1800, 1900, 2400];
            const weeklyDataMale = [2000, 2000, 1800, 2200];

            new Chart(document.getElementById('weeklyChart'), {
                type: 'bar',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Female',
                        data: weeklyDataFemale.map(mapValueToScale),
                        backgroundColor: '#E94B7E',
                        borderRadius: 3,
                        barThickness: 5,
                        borderSkipped: false
                    }, {
                        label: 'Male',
                        data: weeklyDataMale.map(mapValueToScale),
                        backgroundColor: '#5B7FD9',
                        borderRadius: 3,
                        barThickness: 5,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                label: function(context) {
                                    const originalData = context.datasetIndex === 0 ? weeklyDataFemale : weeklyDataMale;
                                    return context.dataset.label + ': ' + originalData[context.dataIndex];
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 5,
                            ticks: {
                                callback: function(value) {
                                    const labels = {
                                        0: '0',
                                        1: '10',
                                        2: '100',
                                        3: '1000',
                                        4: '2000',
                                        5: '2500'
                                    };
                                    return labels[value] || '';
                                },
                                stepSize: 1,
                                color: 'rgba(255, 255, 255, 0.5)',
                                font: {
                                    size: 9
                                }
                            },
                            grid: {
                                display: false,
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.6)',
                                font: {
                                    size: 10
                                }
                            }
                        }
                    },
                    categoryPercentage: 0.95,
                    barPercentage: 0.85
                }
            });

            // Monthly Report Chart
            const monthlyDataFemale = [2000, 1800, 1800, 2200, 1600, 1400, 1900, 1700, 1800, 2000];
            const monthlyDataMale = [1900, 1600, 1700, 2000, 1400, 1200, 1700, 1600, 1700, 1800];

            new Chart(document.getElementById('monthlyChart'), {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt'],
                    datasets: [{
                        label: 'Female',
                        data: monthlyDataFemale.map(mapValueToScale),
                        backgroundColor: '#E94B7E',
                        borderRadius: 3,
                        barThickness: 5,
                        borderSkipped: false
                    }, {
                        label: 'Male',
                        data: monthlyDataMale.map(mapValueToScale),
                        backgroundColor: '#5B7FD9',
                        borderRadius: 3,
                        barThickness: 5,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                label: function(context) {
                                    const originalData = context.datasetIndex === 0 ? monthlyDataFemale : monthlyDataMale;
                                    return context.dataset.label + ': ' + originalData[context.dataIndex];
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 5,
                            ticks: {
                                callback: function(value) {
                                    const labels = {
                                        0: '0',
                                        1: '10',
                                        2: '100',
                                        3: '1000',
                                        4: '2000',
                                        5: '2500'
                                    };
                                    return labels[value] || '';
                                },
                                stepSize: 1,
                                color: 'rgba(255, 255, 255, 0.5)',
                                font: {
                                    size: 9
                                }
                            },
                            grid: {
                                display: false,
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.6)',
                                font: {
                                    size: 9
                                }
                            }
                        }
                    },
                    categoryPercentage: 0.95,
                    barPercentage: 0.85
                }
            });

            // Average Users Sleep Time Chart
            new Chart(document.getElementById('sleepTimeChart'), {
                type: 'line',
                data: {
                    labels: ['Jan 01', 'Jan 02', 'Jan 03', 'Jan 04', 'Jan 05', 'Jan 06'],
                    datasets: [{
                        label: 'Female',
                        data: [0, 2, 6, 4, 6, 2, 8],
                        borderColor: '#E94B7E',
                        backgroundColor: 'transparent',
                        tension: 0,
                        borderWidth: 2,
                        pointRadius: 0,
                        pointHoverRadius: 4
                    }, {
                        label: 'Male',
                        data: [4, 1, 2, 1, 6, 5, 2],
                        borderColor: '#5B7FD9',
                        backgroundColor: 'transparent',
                        tension: 0,
                        borderWidth: 2,
                        pointRadius: 0,
                        pointHoverRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 10,
                            ticks: {
                                stepSize: 2,
                                color: 'rgba(255, 255, 255, 0.5)',
                                font: {
                                    size: 10
                                },
                                callback: function(value) {
                                    return value + 'j';
                                }
                            },
                            grid: {
                                display: false,
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.6)',
                                font: {
                                    size: 10
                                },
                                maxRotation: 0,
                                autoSkip: true,
                                maxTicksLimit: 6
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