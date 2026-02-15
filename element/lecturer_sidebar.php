<style>
    /* Admin Sidebar */
    .sidebar.lecturer-theme {
        position: fixed;
        top: 20px;
        left: 20px;
        width: 280px;
        height: calc(100vh - 40px);
        background: rgba(255, 255, 255, 0.85); 
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 24px;
        padding: 30px 20px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 8px 32px rgba(196, 121, 85, 0.1); 
        z-index: 1000;
    }

    .brand-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0 10px 40px;
    }

    .brand-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 20px;
    }

    .brand-title {
        font-weight: 800;
        font-size: 15px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .brand-subtitle {
        font-size: 11px;
        font-weight: 500;
    }

    /*nav*/
    .nav-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        flex-grow: 1;
    }

    .nav-label {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        margin: 25px 0 12px 15px;
        letter-spacing: 1.2px;
    }

    .nav-item {
        list-style: none; 
    }

    .nav-item a {
        display: block;
        padding: 14px 18px;
        margin-bottom: 4px;
        border-radius: 16px;
        text-decoration: none;
        color: #1d1d1f;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    /* Hover  */
    .nav-item a:hover {
        background: rgba(196, 121, 85, 0.08);
        color: #C47955;
    }

    .nav-item.active a {
        background: #ffffff;
        color: #C47955;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .lecturer-btn {
        text-decoration: none;
        padding: 14px;
        border-radius: 16px;
        font-weight: 700;
        font-size: 13px;
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 12px rgba(196, 121, 85, 0.2);
        line-height: 5.5px;
    }

    .lecturer-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(196, 121, 85, 0.3);
    }
</style>

<aside class="sidebar lecturer-theme">
    <div class="brand-header">
        <div class="brand-icon" style="background: #C47955;">A</div>
        <div>
            <div class="brand-title" style="color: #C47955;">ATTENDIFY</div>
            <div class="brand-subtitle" style="color: #505770;">Admin Portal</div>
        </div>
    </div>

    <nav class="nav-menu">
        <div class="nav-label" style="color: #B0B3C6;">Menu</div>

        <li class="nav-item <?= $this->getRequest()->getParam('controller') == 'Dashboard' ? 'active' : '' ?>">
            <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'Dashboard']) ?>">Dashboard</a>
        </li>

        <li class="nav-item <?= $this->getRequest()->getParam('controller') == 'Lecturers' ? 'active' : '' ?>">
            <a href="<?= $this->Url->build(['controller' => 'Lecturers', 'action' => 'index']) ?>">Admin
            </a>
        </li>

        <li class="nav-item <?= $this->request->getParam('controller') === 'Class' ? 'active' : '' ?>">
            <a href="<?= $this->Url->build(['controller' => 'Class', 'action' => 'index']) ?>">Class</a>
        </li>
    </ul>


        <li class="nav-item <?= $this->getRequest()->getParam('controller') == 'Subjects' ? 'active' : '' ?>">
    <a href="<?= $this->Url->build(['controller' => 'Subjects', 'action' => 'index']) ?>">Subjects</a>
</li>


        <li class="nav-item <?= $this->getRequest()->getParam('controller') == 'Students' ? 'active' : '' ?>">
            <a href="<?= $this->Url->build(['controller' => 'Students', 'action' => 'index']) ?>">Students</a>
        </li>

        <li class="nav-item <?= $this->getRequest()->getParam('controller') == 'Attendance' ? 'active' : '' ?>">
            <a href="<?= $this->Url->build(['controller' => 'Attendance', 'action' => 'index']) ?>">Attendance</a>
        </li>
    </nav>

    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>" 
       class="start-btn lecturer-btn" 
       style="text-align:center; display:block; background: #C47955; color: #fff; margin-top:auto;">
        Log Out
    </a>
</aside>