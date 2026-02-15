<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.4);
            --active-blue: #007AFF;
            --text-main: #1d1d1f;
            --text-muted: #86868b;
        }

        body {
            display: flex;
            /* Vibrant soft gradient background like the reference */
            background: radial-gradient(circle at top left, #e0eaff, #ffffff 50%),
                        radial-gradient(circle at bottom right, #f0e6ff, #ffffff 50%);
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 20px;
            height: 100vh;
            box-sizing: border-box;
            gap: 20px;
        }

        /* Luna UI Frosted Glass Sidebar */
        .sidebar {
            width: 280px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
        }

        .brand-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 40px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: #000;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            flex-grow: 1;
        }

        .nav-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            margin: 20px 0 10px 10px;
            letter-spacing: 0.5px;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: var(--text-main);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 14px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 4px;
        }

        .nav-item a:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Active styling based on Luna UI button style */
        .nav-item.active a {
            background: #FFFFFF;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            color: var(--text-main);
        }

        /* Floating Main Content Area */
        .main-wrapper {
            flex: 1;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            overflow-y: auto;
        }

        /* Luna UI Start Button Style */
        .start-btn {
            background: var(--active-blue);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 16px;
            font-weight: 600;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 122, 255, 0.3);
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand-header">
            <div class="brand-icon">L</div>
            <div>
                <div style="font-weight: 700; font-size: 14px;">CLARIDATA</div>
                <div style="font-size: 12px; color: var(--text-muted);">Lecturer Portal</div>
            </div>
        </div>
        
        <nav class="nav-menu">
            <div class="nav-label">Menu</div>
            <li class="nav-item active">
                <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']) ?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="<?= $this->Url->build(['controller' => 'Lecturers', 'action' => 'index']) ?>">Lecturers</a>
            </li>
            <li class="nav-item">
                <a href="<?= $this->Url->build(['controller' => 'Class', 'action' => 'index']) ?>">Class</a>
            </li>
            <div class="nav-label">Records</div>
            <li class="nav-item">
                <a href="<?= $this->Url->build(['controller' => 'Subjects', 'action' => 'index']) ?>">Subjects</a>
            </li>
            <li class="nav-item">
                <a href="<?= $this->Url->build(['controller' => 'Students', 'action' => 'index']) ?>">Students</a>
            </li>
            <li class="nav-item">
                <a href="<?= $this->Url->build(['controller' => 'Attendance', 'action' => 'index']) ?>">Attendance</a>
            </li>
        </nav>

        <button class="start-btn">+ New Attendance</button>
    </aside>

    <main class="main-wrapper">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

</body>
</html>