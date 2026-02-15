<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 */
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="form-wrapper">

            <div class="form-header-card">
                <div>
                    <h4 class="context-label">Attendance Management</h4>
                    <h3 class="page-title">Record Details: <?= h($attendance->name) ?></h3>
                </div>
                <?= $this->Html->link(__('← Back to Records'), ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <div class="main-form-card">
                
                <div class="profile-identity">
                    <div class="status-icon-box <?= strtolower(h($attendance->status)) ?>">
                        <?= strtoupper(substr(h($attendance->status), 0, 1)) ?>
                    </div>
                    <div class="profile-main-text">
                        <h2><?= h($attendance->name) ?></h2>
                        <p>Attendance ID: <span class="id-span">#<?= $this->Number->format($attendance->attendance_id) ?></span></p>
                    </div>
                    <div class="approval-tag-container">
                         <span class="approval-badge <?= strtolower(h($attendance->approval)) ?>">
                            <?= h($attendance->approval ?: 'Pending') ?>
                        </span>
                    </div>
                </div>

                <div class="details-grid">
                    <div class="detail-item">
                        <label>Student</label>
                        <span>
                            <?= $attendance->hasValue('student') ? 
                                $this->Html->link($attendance->student->name, ['controller' => 'Students', 'action' => 'view', $attendance->student->student_id], ['class' => 'linked-text']) : 
                                '<span class="text-muted">N/A</span>' 
                            ?>
                        </span>
                    </div>
                    <div class="detail-item">
                        <label>Subject</label>
                        <span>
                            <?= $attendance->hasValue('subject') ? 
                                $this->Html->link($attendance->subject->subject_name, ['controller' => 'Subjects', 'action' => 'view', $attendance->subject->subject_id], ['class' => 'linked-text']) : 
                                '<span class="text-muted">N/A</span>' 
                            ?>
                        </span>
                    </div>
                    <div class="detail-item">
                        <label>Assigned Lecturer</label>
                        <span>
                            <?= $attendance->hasValue('lecturer') ? 
                                $this->Html->link($attendance->lecturer->name, ['controller' => 'Lecturers', 'action' => 'view', $attendance->lecturer->lecturer_id], ['class' => 'linked-text']) : 
                                '<span class="text-muted">N/A</span>' 
                            ?>
                        </span>
                    </div>
                    <div class="detail-item">
                        <label>Attendance Status</label>
                        <span class="status-text <?= strtolower(h($attendance->status)) ?>"><?= h($attendance->status) ?></span>
                    </div>
                </div>

                <div class="admin-divider">Session & Approval Timestamps</div>

                <div class="details-grid">
                    <div class="detail-item">
                        <label>Date & Time</label>
                        <span><?= h($attendance->date) ?> at <?= h($attendance->time) ?></span>
                    </div>
                    <div class="detail-item">
                        <label>Approved By</label>
                        <span><?= $attendance->approved_by === null ? '<span class="text-muted">Not Yet Approved</span>' : 'Admin ID: #' . $this->Number->format($attendance->approved_by) ?></span>
                    </div>
                    <div class="detail-item">
                        <label>Approval Date</label>
                        <span><?= h($attendance->approved_at) ?: '<span class="text-muted">—</span>' ?></span>
                    </div>
                </div>

                <div class="form-action-footer">
                    <?= $this->Form->postLink(
                        __('Delete Record'),
                        ['action' => 'delete', $attendance->attendance_id],
                        [
                            'confirm' => __('Are you sure you want to delete this record?'),
                            'class' => 'delete-btn'
                        ]
                    ) ?>
                    
                    <div class="primary-actions">
                         <?= $this->Html->link(__('New Entry'), ['action' => 'add'], ['class' => 'outline-btn']) ?>
                        <?= $this->Html->link(__('Edit Record'), ['action' => 'edit', $attendance->attendance_id], ['class' => 'submit-btn']) ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<style>
    :root {
        --lecturer-tan: #C47955;
        --bg-light: #fdf2f4;
        --text-main: #1d1d1f;
        --text-muted: #86868b;
        --glass-bg: rgba(255, 255, 255, 0.85);
        --glass-border: rgba(255, 255, 255, 0.4);
    }

    /* Layout Positioning */
    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background: linear-gradient(135deg, var(--bg-light) 0%, #ffffff 100%);
    }

    .main-wrapper {
        margin-left: 320px;
        padding: 40px;
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .form-wrapper { width: 100%; max-width: 900px; }

    /* Card Design */
    .form-header-card, .main-form-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(196, 121, 85, 0.05);
    }

    .form-header-card { padding: 30px 35px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; }
    .main-form-card { padding: 50px; }

    /* Profile Identity Section */
    .profile-identity {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 40px;
        padding-bottom: 30px;
        border-bottom: 1px solid #f3f4f6;
    }

    .status-icon-box {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 800;
        color: white;
    }
    .status-icon-box.present { background: #166534; }
    .status-icon-box.absent { background: #991b1b; }

    .profile-main-text h2 { margin: 0; font-size: 24px; font-weight: 800; color: var(--text-main); }
    .profile-main-text p { margin: 5px 0 0; color: var(--text-muted); font-size: 13px; }

    /* Badges */
    .approval-badge {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
    }
    .approval-badge.approved { background: #e0f2fe; color: #0369a1; }
    .approval-badge.pending { background: #fef3c7; color: #92400e; }

    /* Details Grid */
    .details-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; margin-bottom: 20px; }
    .detail-item label { display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); letter-spacing: 1px; font-weight: 700; margin-bottom: 8px; }
    .detail-item span { font-size: 15px; color: var(--text-main); font-weight: 600; }
    
    .linked-text { color: var(--lecturer-tan); text-decoration: none; border-bottom: 1px solid transparent; }
    .linked-text:hover { border-bottom-color: var(--lecturer-tan); }
    
    .status-text.present { color: #166534; }
    .status-text.absent { color: #991b1b; }
    .id-span { color: var(--lecturer-tan); font-weight: 800; }

    .admin-divider { 
        margin: 30px 0 20px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #d1d5db;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 1px;
    }

    /* Action Buttons */
    .form-action-footer { margin-top: 40px; padding-top: 30px; border-top: 1px solid #f3f4f6; display: flex; justify-content: space-between; align-items: center; }
    
    .submit-btn { background: var(--lecturer-tan); color: white !important; padding: 14px 30px; border-radius: 14px; font-weight: 700; text-decoration: none; box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2); transition: all 0.3s ease; }
    .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(196, 121, 85, 0.3); }
    
    .outline-btn { color: var(--lecturer-tan); font-weight: 700; text-decoration: none; margin-right: 20px; font-size: 14px; }
    .delete-btn { color: #b91c1c; font-weight: 700; font-size: 13px; text-decoration: none; }
    .delete-btn:hover { text-decoration: underline; }

    .back-link { text-decoration: none; color: var(--lecturer-tan); font-weight: 700; font-size: 13px; }
    .context-label { color: var(--text-muted); font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; }
</style>