<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Student> $students
 */
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="page-header">
            <div class="header-content">
                <h3><?= __('Student Directory') ?></h3>
                <p>Manage student enrollments, profiles, and academic status.</p>
            </div>
            <?= $this->Html->link(__('<span>+</span> New Student'), ['action' => 'add'], ['escape' => false, 'class' => 'add-btn']) ?>
        </div>

        <div class="main-card table-card">
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('student_id', 'ID') ?></th>
                            <th><?= $this->Paginator->sort('name', 'NAME') ?></th>
                            <th><?= $this->Paginator->sort('email', 'EMAIL') ?></th>
                            <th><?= $this->Paginator->sort('class', 'CLASS') ?></th>
                            <th><?= $this->Paginator->sort('status', 'STATUS') ?></th>
                            <th class="actions"><?= __('ACTIONS') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                        <tr>
                            <td class="id-col"><?= $this->Number->format($student->student_id) ?></td>
                            <td class="name-col"><?= h($student->name) ?></td>
                            <td class="email-col"><?= h($student->email) ?></td>
                            <td><span class="class-badge"><?= h($student->class) ?></span></td>
                            <td>
                                <?php if ($student->status): ?>
                                    <span class="status-pill <?= strtolower(h($student->status)) ?>">
                                        <?= h($student->status) ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="actions">
                                <div class="action-links">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $student->student_id], ['class' => 'view-link']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->student_id], ['class' => 'edit-link']) ?>
                                    <?= $this->Form->postLink(
                                        __('Delete'),
                                        ['action' => 'delete', $student->student_id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', $student->student_id),
                                            'class' => 'delete-link'
                                        ]
                                    ) ?>
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
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}')) ?></p>
            </div>
            <ul class="pagination">
                <?= $this->Paginator->prev('<') ?>
                <?= $this->Paginator->next('>') ?>
            </ul>
        </div>
    </main>
</div>

<style>
    /* Layout styling based on image_3ab285.png */
    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background: #fdfdfd;
    }

    .main-wrapper {
        flex: 1;
        padding: 40px;
        margin-left: 20px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .page-header h3 {
        font-size: 32px;
        font-weight: 800;
        color: #1a1a1a;
        margin: 0;
    }

    .add-btn {
        background: #C47955;
        color: white !important;
        padding: 12px 24px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
    }

    /* Table Styling matching image_3ab285.png */
    .table-card {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.02);
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 15px;
    }

    .custom-table th {
        font-size: 11px;
        letter-spacing: 1px;
        color: #8e8e93;
        padding: 0 20px;
        text-align: left;
        border: none;
    }

    .custom-table td {
        background: white;
        padding: 20px;
        font-size: 14px;
        border-top: 1px solid rgba(0,0,0,0.02);
        border-bottom: 1px solid rgba(0,0,0,0.02);
    }

    .custom-table tr td:first-child { border-left: 1px solid rgba(0,0,0,0.02); border-radius: 15px 0 0 15px; }
    .custom-table tr td:last-child { border-right: 1px solid rgba(0,0,0,0.02); border-radius: 0 15px 15px 0; }

    .id-col { color: #C47955; font-weight: 700; }
    .name-col { font-weight: 800; color: #1c1c1e; }
    .email-col { color: #3a3a3c; }

    .class-badge {
        background: #f2f2f7;
        padding: 4px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 11px;
        color: #1c1c1e;
    }

    .status-pill {
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 0.5px;
        padding: 4px 10px;
        border-radius: 6px;
    }

    .status-pill.present { color: #d72c2d; background: #fff1f1; }
    .status-pill.absent { color: #d72c2d; background: #fff1f1; }

    .action-links { display: flex; gap: 15px; }
    .action-links a { text-decoration: none; font-weight: 700; font-size: 13px; color: #8e8e93; }
    .action-links a:hover { color: #1c1c1e; }

    /* Page */
    .paginator-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
        color: #1c1c1e;
        font-weight: 600;
    }

    .pagination { list-style: none; display: flex; gap: 20px; padding: 0; }
    .pagination a { text-decoration: none; color: #1c1c1e; font-size: 18px; }
</style>