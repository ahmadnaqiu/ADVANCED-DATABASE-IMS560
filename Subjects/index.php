<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Subject> $subjects
 */
$this->Html->css('class_page', ['block' => true]);
?>

<div class="dashboard-container">

    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">

        <div class="class-page-container">
            <div class="page-header">
                <div class="header-content">
                    <h3>My Subjects</h3>
                    <p>Manage your own subjects and class associations.</p>
                </div>
                <?= $this->Html->link(
                    __('<span>+</span> Add Subject'),
                    ['action' => 'add'],
                    ['escape' => false, 'class' => 'add-btn']
                ) ?>
            </div>

            <div class="main-card table-card">
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject Name</th>
                                <th>Class</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subjects as $subject): ?>
                            <tr>
                                <td style="font-weight:700; color:#C47955;">
                                    <?= $subject->subject_id ?>
                                </td>
                                <td style="font-weight:600;">
                                    <?= h($subject->subject_name) ?>
                                </td>
                                <td>
                                    <?= $subject->has('class') 
                                        ? '<span class="class-badge">' . h($subject->class->class_name) . '</span>'
                                        : '<span style="color:#d1d1d6;font-style:italic;">Unassigned</span>' ?>
                                </td>
                                <td class="actions">
                                    <div class="action-buttons">
                                        <?= $this->Html->link('View', ['action' => 'view', $subject->subject_id], ['class' => 'view-link']) ?>
                                        <?= $this->Html->link('Edit', ['action' => 'edit', $subject->subject_id], ['class' => 'edit-link']) ?>
                                        <?= $this->Form->postLink(
                                            'Delete',
                                            ['action' => 'delete', $subject->subject_id],
                                            [
                                                'confirm' => 'Delete subject ' . $subject->subject_name . '?',
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
        </div>
    </main>
</div>

<style>
    /* Styling to match Tan Portal Branding */
    .add-btn {
        background: #C47955 !important; /* Your requested color */
        color: white !important;
        padding: 12px 24px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
    }

    .add-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(196, 121, 85, 0.3);
    }

    .class-badge {
        background: #fdf2f4;
        color: #C47955;
        padding: 4px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 12px;
    }

    /* Table UI Improvements */
    .custom-table td {
        padding: 18px 15px;
        background: white;
    }

    .view-link, .edit-link, .delete-link {
        font-weight: 700;
        font-size: 13px;
        text-decoration: none;
        margin-right: 10px;
    }

    .view-link { color: #8e8e93; }
    .edit-link { color: #C47955; }
    .delete-link { color: #ff3b30; }
</style>