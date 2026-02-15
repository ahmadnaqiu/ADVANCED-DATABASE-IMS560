<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Attendance> $attendance
 */
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">

        <div class="page-header">
            <div class="header-content">
                <h3>Attendance Records</h3>
                <p>Monitor and manage student presence and approval status across all subjects.</p>
            </div>
            <?= $this->Html->link(
                __('<span>+</span> New Attendance'),
                ['action' => 'add'],
                ['escape' => false, 'class' => 'add-btn']
            ) ?>
        </div>

        <div class="main-card">
            <div class="table-responsive">
                <table class="custom-table condensed">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('attendance_id', 'ID') ?></th>
                            <th><?= $this->Paginator->sort('student_id', 'Student') ?></th>
                            <th><?= $this->Paginator->sort('subject_id', 'Subject') ?></th>
                            <th><?= $this->Paginator->sort('status', 'Status') ?></th>
                            <th><?= $this->Paginator->sort('date', 'Date & Time') ?></th>
                            <th><?= $this->Paginator->sort('approval', 'Approval') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($attendance as $record): ?>
                        <tr>
                            <td class="bold-id">#<?= $this->Number->format($record->attendance_id) ?></td>
                            <td>
                                <div class="cell-primary"><?= $record->hasValue('student') ? h($record->student->name) : h($record->name) ?></div>
                                <div class="cell-secondary">Student ID: <?= h($record->student_id) ?></div>
                            </td>
                            <td>
                                <div class="cell-primary"><?= $record->hasValue('subject') ? h($record->subject->subject_name) : 'N/A' ?></div>
                                <div class="cell-secondary"><?= $record->hasValue('lecturer') ? 'Lec: ' . h($record->lecturer->name) : '' ?></div>
                            </td>
                            <td>
                                <span class="status-pill <?= strtolower(h($record->status)) ?>">
                                    <?= h($record->status) ?>
                                </span>
                            </td>
                            <td>
                                <div class="cell-primary"><?= h($record->date) ?></div>
                                <div class="cell-secondary"><?= h($record->time) ?></div>
                            </td>
                            <td>
                                <span class="approval-badge <?= strtolower(h($record->approval)) ?>">
                                    <?= h($record->approval ?: 'Pending') ?>
                                </span>
                            </td>
                            <td class="actions">
                                <div class="action-group">
                                    <?= $this->Html->link('View', ['action' => 'view', $record->attendance_id], ['class' => 'view-link']) ?>
                                    <?= $this->Html->link('Edit', ['action' => 'edit', $record->attendance_id], ['class' => 'edit-link']) ?>
                                    <?= $this->Form->postLink('Delete', ['action' => 'delete', $record->attendance_id], ['confirm' => __('Delete record # {0}?', $record->attendance_id), 'class' => 'delete-link']) ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="paginator-container">
            <div class="pagination-info">
                <p><?= $this->Paginator->counter(__('Showing {{current}} of {{count}} records')) ?></p>
            </div>
            <ul class="pagination">
                <?= $this->Paginator->prev('<') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('>') ?>
            </ul>
        </div>

    </main>
</div>

<style>
    :root {
        --lecturer-tan: #C47955;
        --text-main: #1d1d1f;
        --text-muted: #86868b;
        --glass-bg: rgba(255, 255, 255, 0.85);
        --bg-light: #fdf2f4;
    }

    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background: linear-gradient(135deg, var(--bg-light) 0%, #ffffff 100%);
    }

    .main-wrapper {
        margin-left: 320px;
        padding: 40px;
        flex: 1;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
    }

    .page-header h3 { font-size: 28px; font-weight: 800; color: var(--text-main); margin: 0; }

    .add-btn {
        background: var(--lecturer-tan);
        color: white !important;
        padding: 12px 24px;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 700;
        box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
    }

    .main-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 25px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
    }

    /* Condensed Table Strategy */
    .custom-table { width: 100%; border-collapse: separate; border-spacing: 0 8px; }
    .custom-table th { text-align: left; padding: 12px 20px; font-size: 11px; text-transform: uppercase; color: var(--text-muted); letter-spacing: 1px; }
    .custom-table td { padding: 14px 20px; background: #f9f9fb; vertical-align: middle; }
    
    .custom-table tr td:first-child { border-radius: 14px 0 0 14px; }
    .custom-table tr td:last-child { border-radius: 0 14px 14px 0; }

    .bold-id { font-weight: 800; color: var(--lecturer-tan); font-size: 13px; }
    .cell-primary { font-weight: 600; color: var(--text-main); font-size: 14px; }
    .cell-secondary { font-size: 12px; color: var(--text-muted); margin-top: 2px; }

    /* Status & Approval Pills */
    .status-pill, .approval-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        display: inline-block;
    }

    .status-pill.present { background: #dcfce7; color: #166534; }
    .status-pill.absent { background: #fee2e2; color: #991b1b; }
    
    .approval-badge.approved { background: #e0f2fe; color: #0369a1; }
    .approval-badge.pending { background: #fef3c7; color: #92400e; }

    .action-group { display: flex; gap: 12px; }
    .view-link { color: #007aff; text-decoration: none; font-weight: 700; }
    .edit-link { color: #5856d6; text-decoration: none; font-weight: 700; }
    .delete-link { color: #ff3b30; text-decoration: none; font-weight: 700; }

    .paginator-container { margin-top: 30px; display: flex; justify-content: space-between; align-items: center; }
    .pagination { display: flex; list-style: none; gap: 8px; padding: 0; }
    .pagination li a { padding: 8px 14px; background: white; border-radius: 10px; text-decoration: none; color: var(--text-main); font-weight: 600; }
    .pagination .active a { background: var(--lecturer-tan); color: white; }
</style>