<aside class="sidebar">
    <!-- brand header -->
    <div class="brand-header">
        <div class="brand-icon">A</div>
        <div>
            <div class="brand-title">ATTENDIFY</div>
            <div class="brand-subtitle">Student Portal</div>
        </div>
    </div>

    <!--nav -->
    <ul class="nav-menu">
        <li class="nav-label">Menu</li>

        <li class="nav-item <?= $this->request->getParam('controller') === 'Dashboard' ? 'active' : '' ?>">
            <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'studentDashboard']) ?>">Dashboard</a>
        </li>

        <li class="nav-item <?= $this->request->getParam('controller') === 'Profile' ? 'active' : '' ?>">
            <a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'index']) ?>">Profile</a>
        </li>

        
    </ul>

    <!-- logout -->
    <?= $this->Form->postLink(
        'Log Out',
        ['controller' => 'Users', 'action' => 'logout'],
        ['class' => 'start-btn'],
        'Are you sure you want to log out?'
    ) ?>
</aside>
