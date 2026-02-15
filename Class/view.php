<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class $class
 */
$this->Html->css('class_add', ['block' => true]); 
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="form-wrapper">
            
            <div class="form-header-card">
                <div>
                    <h4 class="context-label">Records Management</h4>
                    <h3><?= h($class->class_name ?? 'Class Details') ?></h3>
                </div>
                <?= $this->Html->link(__('← Back to List'), ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <div class="main-form-card" style="padding: 45px;">
                
                <div class="details-grid">
                    <div class="detail-item">
                        <label>Class Designation</label>
                        <span class="detail-value-main"><?= h($class->class_name ?? '-') ?></span>
                    </div>
                    
                    <div class="detail-item">
                        <label>Class ID</label>
                        <span class="detail-value-id">#<?= $class->class_id ?? '-' ?></span>
                    </div>
                    
                    <div class="detail-item">
                        <label>Assigned Lecturer</label>
                        <span>
                            <?php if (!empty($class->lecturer)): ?>
                                <?= $this->Html->link(
                                    h($class->lecturer->name),
                                    ['controller' => 'Lecturers', 'action' => 'view', $class->lecturer->lecturer_id],
                                    ['class' => 'linked-detail']
                                ) ?>
                            <?php else: ?>
                                <span class="unassigned-text">No Lecturer Assigned</span>
                            <?php endif; ?>
                        </span>
                    </div>
                    
                    <div class="detail-item">
                        <label>Enrollment Status</label>
                        <span class="status-active">● Active</span>
                    </div>
                </div>

                <div class="view-action-footer">
                    <?= $this->Html->link(__('Edit Class'), ['action' => 'edit', $class->class_id], ['class' => 'submit-btn']) ?>
                    
                    <?= $this->Form->postLink(
                        __('Delete Class'),
                        ['action' => 'delete', $class->class_id],
                        [
                            'confirm' => __('Are you sure you want to delete {0}?', $class->class_name),
                            'class' => 'submit-btn btn-danger'
                        ]
                    ) ?>
                </div>
            </div>
        </div>
    </main>
</div>

<style>
:root {
    --lecturer-tan: #C47955; /* Match Lecturer Portal */
    --text-main: #1d1d1f;
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
    margin-left: 320px; /* Layout offset for sidebar */
    padding: 40px;
}

.form-wrapper {
    width: 100%;
    max-width: 850px;
}

/* Typography & Layout */
.context-label {
    color: var(--text-muted);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
    margin-bottom: 5px;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-bottom: 40px;
}

.detail-item label {
    display: block;
    font-size: 11px;
    text-transform: uppercase;
    color: var(--text-muted);
    letter-spacing: 1px;
    font-weight: 700;
    margin-bottom: 8px;
}

.detail-value-main { font-size: 18px; font-weight: 700; color: var(--text-main); }
.detail-value-id { font-weight: 600; color: var(--lecturer-tan); }
.linked-detail { color: var(--lecturer-tan); text-decoration: none; font-weight: 600; }
.unassigned-text { color: #d1d1d6; font-style: italic; }
.status-active { color: #15803d; font-weight: 700; }

/* Action Buttons */
.view-action-footer {
    padding-top: 30px;
    border-top: 1px solid #f3f4f6;
    display: flex;
    gap: 15px;
    justify-content: flex-end;
}

.submit-btn {
    height: 48px;
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0 30px;
    border-radius: 14px;
    background-color: var(--lecturer-tan);
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(196, 121, 85, 0.3);
}

.btn-danger {
    background-color: #fef2f2;
    color: #b91c1c;
    border: 1px solid #fee2e2;
    box-shadow: none;
}

.btn-danger:hover {
    background-color: #b91c1c;
    color: #ffffff;
    box-shadow: 0 8px 20px rgba(185, 28, 28, 0.2);
}

.back-link {
    color: var(--lecturer-tan);
    text-decoration: none;
    font-weight: 700;
    font-size: 13px;
}
</style>