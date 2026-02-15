<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Class> $classes
 */
$this->Html->css('class_page', ['block' => true]); // optional CSS
?>

<div class="dashboard-container">

    <!-- Sidebar -->
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="page-header">
            <h2>My Classes</h2>
            <?= $this->Html->link(
                __('<span>+</span> Add New Class'),
                ['action' => 'add'],
                ['escape' => false, 'class' => 'add-btn']
            ) ?>
        </div>

        <div class="main-card table-card">
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Subjects</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($classes as $class): ?>
                        <tr>
                            <td><?= h($class->class_name ?? 'N/A') ?></td>
                            <td>
                                <?php if (!empty($class->subjects)): ?>
                                    <ul>
                                        <?php foreach ($class->subjects as $subject): ?>
                                            <li><?= h($subject->subject_name) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <span style="color: #d1d1d6; font-style: italic;">No subjects</span>
                                <?php endif; ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link('View', ['action' => 'view', $class->class_id], ['class' => 'view-link']) ?>
                                <?= $this->Html->link('Edit', ['action' => 'edit', $class->class_id], ['class' => 'edit-link']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
