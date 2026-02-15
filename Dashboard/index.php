<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendify | Lecturer Analytics</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.4);
            --active-maroon: #811331;
            --text-main: #1d1d1f;
            --text-muted: #86868b;
        }

        body {
            display: flex;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
            height: 100vh;
            background: linear-gradient(135deg, #fdf2f4, #ffffff);
            gap: 20px;
            box-sizing: border-box;
        }

        .main-wrapper {
            flex: 1;
            margin-left: 300px; /* Offset for fixed sidebar */
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.05);
            overflow-y: auto;
        }

        /* Analytics Grid Layout */
        .analytics-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .chart-card {
            background: white;
            padding: 24px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h4 { margin: 0; color: var(--text-main); font-size: 16px; }
        
        /* Stats Summary Row */
        .stats-summary {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-box {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 16px;
            border-left: 5px solid var(--active-maroon);
        }

        .stat-box small { color: var(--text-muted); font-size: 12px; text-transform: uppercase; font-weight: 700; }
        .stat-box div { font-size: 24px; font-weight: 700; color: var(--active-maroon); margin-top: 5px; }
    </style>
</head>
<body>

    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="header-section">
            <h2 style="margin: 0; color: var(--text-main);">Analytics Dashboard</h2>
            <p style="color: var(--text-muted); margin: 5px 0 30px;">Real-time student attendance insights.</p>
        </div>

        <div class="stats-summary">
            <div class="stat-box">
                <small>Average Attendance</small>
                <div>86%</div>
            </div>
            <div class="stat-box">
                <small>Total Students</small>
                <div>248</div>
            </div>
            <div class="stat-box">
                <small>Classes Today</small>
                <div>4</div>
            </div>
        </div>

        <div class="analytics-grid">
            <div class="chart-card">
                <div class="chart-header">
                    <h4>Attendance Comparison Chart</h4>
                    <div style="font-size: 12px; color: var(--active-maroon); font-weight: 600;">● Daily</div>
                </div>
                <canvas id="attendanceLineChart"></canvas>
            </div>

            <div class="chart-card">
                <div class="chart-header">
                    <h4>Daily Attendance</h4>
                </div>
                <canvas id="attendanceBarChart"></canvas>
            </div>
        </div>

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

    <script>
        // --- Attendance Trend (Line Chart) ---
        const ctxLine = document.getElementById('attendanceLineChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['01 Aug', '03 Aug', '05 Aug', '07 Aug', '09 Aug', '11 Aug'],
                datasets: [{
                    label: 'Attendance %',
                    data: [65, 78, 91, 72, 85, 80],
                    borderColor: '#811331',
                    backgroundColor: 'rgba(129, 19, 49, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#811331'
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, max: 100, ticks: { callback: value => value + '%' } },
                    x: { grid: { display: false } }
                }
            }
        });

        // --- Daily Attendance (Bar Chart) ---
        const ctxBar = document.getElementById('attendanceBarChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['CS', 'IT', 'CSDA', 'BCOM', 'PA'],
                datasets: [{
                    data: [70, 65, 86, 60, 75],
                    backgroundColor: (context) => {
                        return context.raw === 86 ? '#811331' : '#fbcfe8'; // Highlight highest
                    },
                    borderRadius: 8
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    y: { display: false },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>
</body>
</html>