<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>Dashboard | Claridata</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { display: flex; margin: 0; font-family: 'Inter', sans-serif; background: #F9F9F7; }
        .sidebar { width: 250px; height: 100vh; background: #001F3F; color: white; position: fixed; padding: 20px; }
        .main-content { margin-left: 250px; flex: 1; padding: 40px; }
        .nav-links { list-style: none; padding: 0; margin-top: 20px; }
        .nav-links a { color: white; text-decoration: none; display: block; padding: 10px 0; opacity: 0.8; }
        .nav-links a:hover { opacity: 1; color: #D4AF37; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>CLARIDATA</h2>
        <ul class="nav-links">
            <li><a href="#">Executive Dashboard</a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'Attendance', 'action' => 'index']) ?>">Attendance Records</a></li>
        </ul>
    </div>
    <div class="main-content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?> </div>
</body>
</html>