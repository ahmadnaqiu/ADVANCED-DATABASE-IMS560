<?php
$this->Html->css('class_page', ['block' => true]); // reuse your class page CSS
?>

<div class="dashboard-container">

    <!-- Lecturer sidebar -->
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="class-page-container">
            <div class="page-header">
                <div class="header-content">
                    <h3>Subject Management</h3>
                    <p>Manage subjects and class assignments.</p>
                </div>
                <?= $this->Html->link(
                    __('<span>+</span> Add New'), 
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
                                <th>Class Assigned</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subjects as $subject): ?>
                            <tr>
                                <td style="font-weight:700; color: var(--accent-maroon);">
                                    <?= $subject->subject_id ?>
                                </td>
                                <td style="font-weight:600;">
                                    <?= h($subject->subject_name) ?>
                                </td>
                                <td>
                                    <?= $subject->has('class') ? 
                                        $this->Html->link(
                                            $subject->class->class_name,
                                            ['controller' => 'Classes', 'action' => 'view', $subject->class->class_id],
                                            ['style' => 'color: var(--accent-maroon); font-weight: 500; text-decoration: none;']
                                        )
                                        : '<span style="color:#d1d1d6; font-style:italic;">Unassigned</span>'
                                    ?>
                                </td>
                                <td class="actions">
                                    <div class="action-buttons">
                                        <?= $this->Html->link('View', ['action' => 'view', $subject->subject_id], ['class' => 'view-link']) ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (count($subjects) === 0): ?>
                            <tr>
                                <td colspan="4" style="text-align:center; color:#888;">No subjects assigned.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>
