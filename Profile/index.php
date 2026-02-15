<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>Student Profile</title>

    <!-- Shared dashboard styles -->
    <?= $this->Html->css('student_dashboard') ?>

    <!-- Profile-specific styles -->
    <?= $this->Html->css('profile') ?>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
<div class="dashboard-container">

    <?= $this->element('student_sidebar') ?>

    <main class="main-wrapper">
        <h4 class="page-title">Student Details</h4>

        <?php if (!empty($profile)): ?>
            <div class="profile-header-card">
                <div class="profile-avatar">
                    <?= substr(h($profile->fullname), 0, 1) ?>
                </div>

                <div class="profile-main-info">
                    <h2><?= h($profile->fullname) ?></h2>

                    <div class="details-grid">
                        <div class="detail-item">
                            <label>Student ID</label>
                            <span><?= h($profile->student_id) ?></span>
                        </div>

                        <div class="detail-item">
                            <label>Email</label>
                            <span><?= h($profile->email) ?></span>
                        </div>

                        <div class="detail-item">
                            <label>Status</label>
                            <span class="status-active">Active</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon blue">A</div>
                    <div class="stat-info">
                        <h3>85%</h3>
                        <p>Total Attendance</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon green">L</div>
                    <div class="stat-info">
                        <h3>5 Days</h3>
                        <p>Late Attendance</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon orange">U</div>
                    <div class="stat-info">
                        <h3>1 Day</h3>
                        <p>Undertime</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon red">A</div>
                    <div class="stat-info">
                        <h3>2 Days</h3>
                        <p>Total Absent</p>
                    </div>
                </div>
            </div>

            <div class="card performance-card">
                <h4>Academic Performance Summary</h4>
                <p>Visualization of your monthly attendance rate would appear here.</p>
            </div>
        <?php else: ?>
            <p style="padding:20px; color:red;">Student profile not found.</p>
        <?php endif; ?>

    </main>
</div>
</body>
</html>
