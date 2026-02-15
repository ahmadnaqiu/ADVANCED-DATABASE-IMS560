<?php
$this->Html->css('class_add', ['block' => true]);
?>

<div class="dashboard-container">

    <!-- Lecturer Sidebar -->
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="form-wrapper">
            
            <!-- Header -->
            <div class="form-header-card">
                <div>
                    <h4 style="color: var(--text-muted); font-size:11px; text-transform:uppercase; letter-spacing:1px; margin-bottom:5px;">
                        Subject Management
                    </h4>
                    <h3><?= h($subject->subject_name) ?></h3>
                </div>
                <?= $this->Html->link('← Back to Subjects', ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <!-- Details Card -->
            <div class="main-form-card" style="padding:40px;">
                
                <div class="details-grid" style="grid-template-columns: repeat(2, 1fr); gap:30px; margin-bottom:40px;">
                    
                    <div class="detail-item">
                        <label>Subject Name</label>
                        <span style="font-size:18px; font-weight:700;">
                            <?= h($subject->subject_name) ?>
                        </span>
                    </div>

                    <div class="detail-item">
                        <label>Subject ID</label>
                        <span style="font-weight:600; color: var(--accent-maroon);">
                            #<?= $subject->subject_id ?>
                        </span>
                    </div>

                    <div class="detail-item">
                        <label>Assigned Class</label>
                        <span>
                            <?php if (!empty($subject->class)): ?>
                                <?= $this->Html->link(
                                    h($subject->class->class_name),
                                    ['controller' => 'LecturerClass', 'action' => 'view', $subject->class->class_id],
                                    ['style' => 'color: var(--accent-maroon); font-weight:600; text-decoration:none;']
                                ) ?>
                            <?php else: ?>
                                <span style="color:#d1d1d6; font-style:italic;">Unassigned</span>
                            <?php endif; ?>
                        </span>
                    </div>

                </div>

                <!-- Action buttons -->
                <div style="padding-top:30px; border-top:1px solid #f3f4f6; display:flex; gap:15px; justify-content:flex-end;">
                    
                    <?= $this->Html->link('Edit Subject', ['action' => 'edit', $subject->subject_id], ['class' => 'submit-btn']) ?>
                    
                    <?= $this->Form->postLink(
                        'Delete Subject',
                        ['action' => 'delete', $subject->subject_id],
                        [
                            'confirm' => 'Delete ' . $subject->subject_name . '?',
                            'class' => 'submit-btn btn-danger'
                        ]
                    ) ?>
                </div>

            </div>
        </div>
    </main>
</div>
