<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Clas> $class
 */
// Load the specific CSS file
$this->Html->css('class_page', ['block' => true]);
?>
<div class="dashboard-container">

    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">

        <div class="class-page-container">
            <div class="page-header">
                <div class="header-content">
                    <h3>Class Management</h3>
                    <p>Manage academic class groups and faculty assignments.</p>
                </div>
                <?= $this->Html->link(__('<span>+</span> Add New'), ['action' => 'add'], ['escape' => false, 'class' => 'add-btn']) ?>
            </div>

            <div class="main-card table-card">
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('class_id', 'ID') ?></th>
                                <th><?= $this->Paginator->sort('class_name', 'Class Name') ?></th>
                                <th><?= $this->Paginator->sort('lecturer_id', 'Lecturer Assigned') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($class as $clas): ?>
                            <tr>
                                <td style="font-weight: 700; color: #C47955;">
                                    <?= $this->Number->format($clas->class_id) ?>
                                </td>
                                <td style="font-weight: 600;"><?= h($clas->class_name) ?></td>
                                <td>
                                    <?= $clas->hasValue('lecturer') ? 
                                        $this->Html->link(
                                            $clas->lecturer->name, 
                                            ['controller' => 'Lecturers', 'action' => 'view', $clas->lecturer->lecturer_id], 
                                            ['style' => 'color: #C47955; font-weight: 500; text-decoration: none;']
                                        ) : 
                                        '<span style="color: #d1d1d6; font-style: italic;">Unassigned</span>' ?>
                                </td>
                                <td class="actions">
                                    <div class="action-buttons">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $clas->class_id], ['class' => 'view-link']) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clas->class_id], ['class' => 'edit-link']) ?>
                                        <?= $this->Form->postLink(
                                            __('Delete'),
                                            ['action' => 'delete', $clas->class_id],
                                            [
                                                'method' => 'delete',
                                                'confirm' => __('Delete class {0}?', $clas->class_name),
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
                    <?= $this->Paginator->counter(__('Showing {{current}} records')) ?>
                </div>
                <ul class="pagination">
                    <?= $this->Paginator->prev('<') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('>') ?>
                </ul>
            </div>
        </div>

    </main>
</div>

<style>
/* Synchronize with Lecturer Portal Design */
:root {
    --lecturer-tan: #C47955;
    --text-muted: #86868b;
    --glass-bg: rgba(255, 255, 255, 0.85);
}

.dashboard-container {
    display: flex;
    min-height: 100vh;
    background: #fdfdfd;
}

.main-wrapper {
    flex: 1;
    margin-left: 320px; /* Offset for fixed floating sidebar */
    padding: 40px;
}

/* Tan primary button styling */
.add-btn {
    background: var(--lecturer-tan);
    color: white !important;
    padding: 12px 24px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
}

/* Table card with glassmorphism */
.table-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 30px;
    padding: 30px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.02);
}

.active-page {
    background: var(--lecturer-tan) !important;
    color: white !important;
}
</style>