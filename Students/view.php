<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="form-wrapper">

            <div class="form-header-card">
                <div>
                    <h4 class="context-label">Student Management</h4>
                    <h3 class="page-title">Student Profile: <?= h($student->name) ?></h3>
                </div>
                <?= $this->Html->link(__('← Back to Directory'), ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <div class="main-form-card" style="padding: 45px;">
                
                <div class="profile-identity">
                    <div class="profile-avatar-large"><?= strtoupper(substr(h($student->name), 0, 1)) ?></div>
                    <div class="profile-main-text">
                        <h2><?= h($student->name) ?></h2>
                        <p><?= h($student->email) ?></p>
                    </div>
                </div>

                <div class="details-grid">
                    <div class="detail-item">
                        <label>Student ID</label>
                        <span class="id-text">#<?= $this->Number->format($student->student_id) ?></span>
                    </div>
                    <div class="detail-item">
                        <label>Assigned Class</label>
                        <span class="detail-value"><?= h($student->class ?? 'Unassigned') ?></span>
                    </div>
                    <div class="detail-item">
                        <label>Primary Subject</label>
                        <span class="detail-value"><?= h($student->subject ?? 'Unassigned') ?></span>
                    </div>
                    <div class="detail-item">
                        <label>Enrollment Status</label>
                        <span class="status-pill <?= strtolower(h($student->status)) ?>">
                            <?= h($student->status) ?>
                        </span>
                    </div>
                </div>

                <div class="view-action-footer">
                    <?= $this->Form->postLink(
                        __('Delete Student'),
                        ['action' => 'delete', $student->student_id],
                        [
                            'confirm' => __('Are you sure you want to delete {0}?', $student->name),
                            'class' => 'submit-btn btn-danger'
                        ]
                    ) ?>
                    
                    <div class="primary-actions">
                        <?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $student->student_id], ['class' => 'submit-btn']) ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<style>
/* Synchronized with Lecturer Portal Design System */
:root {
    --lecturer-tan: #C47955;
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
    margin-left: 320px; /* Offset for floating sidebar */
    padding: 40px;
}

.form-wrapper {
    width: 100%;
    max-width: 850px;
}

/* Header Context Styling */
.context-label {
    color: var(--text-muted);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
    margin-bottom: 5px;
}

/* Profile Identity */
.profile-identity {
    display: flex;
    align-items: center;
    gap: 25px;
    margin-bottom: 40px;
    padding-bottom: 30px;
    border-bottom: 1px solid #f3f4f6;
}

.profile-avatar-large {
    width: 80px;
    height: 80px;
    background: #fdf2f4;
    border: 3px solid var(--lecturer-tan);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    font-weight: 800;
    color: var(--lecturer-tan);
}

.profile-main-text h2 { margin: 0; font-size: 26px; font-weight: 800; color: var(--text-main); }
.profile-main-text p { margin: 5px 0 0; color: var(--text-muted); font-size: 15px; }

/* Details Grid */
.details-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-bottom: 20px;
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

.detail-value { font-size: 16px; color: var(--text-main); font-weight: 600; }
.id-text { color: var(--lecturer-tan); font-weight: 800; font-size: 16px; }

/* Status Badges */
.status-pill {
    padding: 4px 12px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 700;
}
.status-pill.present { background: #fff1f1; color: #d72c2d; }
.status-pill.absent { background: #fff1f1; color: #d72c2d; }

/* Action Buttons */
.view-action-footer {
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid #f3f4f6;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.submit-btn {
    height: 48px;
    padding: 0 35px;
    border-radius: 14px;
    background: var(--lecturer-tan);
    color: white;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
}

.btn-danger {
    background: #fef2f2;
    color: #b91c1c;
    border: 1px solid #fee2e2;
    box-shadow: none;
}

.back-link {
    text-decoration: none;
    color: var(--lecturer-tan);
    font-weight: 700;
    font-size: 13px;
}
</style>