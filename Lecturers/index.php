<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lecturer> $lecturers
 */
?>

<style>
    :root {
        --accent-maroon: #C47955;
        --text-main: #1d1d1f;
        --text-muted: #86868b;
        --glass-bg: rgba(255, 255, 255, 0.85);
        --glass-border: rgba(255, 255, 255, 0.4);
        --card-shadow: 0 8px 32px rgba(129, 19, 49, 0.1);
    }

    body {
        margin: 0;
        background: linear-gradient(135deg, #fdf2f4 0%, #ffffff 100%);
        font-family: 'Inter', sans-serif;
    }

    .dashboard-container {
        display: flex;
        min-height: 100vh;
    }

    /* MAIN CONTENT WRAPPER - Centered and Offset from Sidebar */
    .main-wrapper {
        margin-left: 320px; /* Aligned with sidebar width + gap */
        padding: 40px;
        flex: 1;
        max-width: 1200px;
        min-height: calc(100vh - 40px);
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        box-shadow: var(--card-shadow);
        margin-top: 20px;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    /* Header Section Neatness */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
    }

    .header-content h3 {
        font-size: 28px;
        font-weight: 800;
        color: var(--text-main);
        margin: 0;
    }

    .header-content p {
        color: var(--text-muted);
        font-size: 14px;
        margin-top: 5px;
    }

    .add-btn {
        background: var(--accent-maroon);
        color: white !important;
        padding: 12px 24px;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(129, 19, 49, 0.2);
        transition: all 0.3s ease;
    }

    .add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(129, 19, 49, 0.3);
    }

    /* Table Neatness */
    .main-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 20px;
        border: 1px solid rgba(0,0,0,0.02);
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .custom-table th {
        text-align: left;
        padding: 12px 20px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
    }

    .custom-table td {
        padding: 16px 20px;
        background: #f9f9fb;
        font-size: 14px;
        color: var(--text-main);
    }

    .custom-table tr td:first-child { border-radius: 14px 0 0 14px; font-weight: 700; color: var(--accent-maroon); }
    .custom-table tr td:last-child { border-radius: 0 14px 14px 0; }

    .custom-table tr:hover td {
        background: #fdf2f4;
    }

    /* Action Links */
    .view-link { color: #007aff; font-weight: 700; margin-right: 10px; text-decoration: none; }
    .edit-link { color: #5856d6; font-weight: 700; margin-right: 10px; text-decoration: none; }
    .delete-link { color: #ff3b30; font-weight: 700; text-decoration: none; }

    /* Paginator Neatness */
    .paginator-container {
        margin-top: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagination {
        display: flex;
        list-style: none;
        gap: 8px;
        padding: 0;
    }

    .pagination li a {
        padding: 8px 14px;
        background: white;
        border-radius: 10px;
        text-decoration: none;
        color: var(--text-main);
        font-weight: 600;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .pagination .active a {
        background: var(--accent-maroon);
        color: white;
    }
</style>

<div class="dashboard-container">

    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">

        <div class="page-header">
            <div class="header-content">
                <h3>Lecturers</h3>
                <p>Manage lecturers, their details, and faculty assignments.</p>
            </div>
            <?= $this->Html->link(
                __('<span>+</span> Add New'),
                ['action' => 'add'],
                ['escape' => false, 'class' => 'add-btn']
            ) ?>
        </div>

        <div class="main-card">
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('lecturer_id', 'ID') ?></th>
                            <th><?= $this->Paginator->sort('name', 'Name') ?></th>
                            <th><?= $this->Paginator->sort('email', 'Email') ?></th>
                            <th><?= $this->Paginator->sort('faculty', 'Faculty') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lecturers as $lecturer): ?>
                        <tr>
                            <td><?= $this->Number->format($lecturer->lecturer_id) ?></td>
                            <td style="font-weight: 600;"><?= h($lecturer->name) ?></td>
                            <td><?= h($lecturer->email) ?></td>
                            <td><?= h($lecturer->faculty) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('View', ['action' => 'view', $lecturer->lecturer_id], ['class' => 'view-link']) ?>
                                <?= $this->Html->link('Edit', ['action' => 'edit', $lecturer->lecturer_id], ['class' => 'edit-link']) ?>
                                <?= $this->Form->postLink(
                                    'Delete',
                                    ['action' => 'delete', $lecturer->lecturer_id],
                                    [
                                        'confirm' => __('Delete lecturer {0}?', $lecturer->name),
                                        'class' => 'delete-link'
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="paginator-container">
            <div class="pagination-info">
                <p style="font-size: 13px; color: var(--text-muted);">
                    <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}')) ?>
                </p>
            </div>
            <ul class="pagination">
                <?= $this->Paginator->prev('<') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('>') ?>
            </ul>
        </div>

    </main>
</div>