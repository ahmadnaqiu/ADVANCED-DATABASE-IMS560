<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 * @var string[]|\Cake\Collection\CollectionInterface $students
 * @var string[]|\Cake\Collection\CollectionInterface $lecturers
 * @var string[]|\Cake\Collection\CollectionInterface $subjects
 */
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="form-wrapper">

            <div class="form-header-card">
                <div>
                    <h4 class="context-label">Attendance Management</h4>
                    <h3 class="page-title">Edit Record: <?= h($attendance->name) ?></h3>
                </div>
                <?= $this->Html->link(__('← Back to Records'), ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <div class="main-form-card">
                <?= $this->Form->create($attendance) ?>
                
                <fieldset class="clean-fieldset">
                    <div class="form-group">
                        <?= $this->Form->control('name', [
                            'label' => 'Session Reference Name',
                            'placeholder' => 'e.g., Week 5 Lab'
                        ]) ?>
                    </div>

                    <div class="form-group-grid">
                        <div class="form-group">
                            <?= $this->Form->control('student_id', ['options' => $students, 'label' => 'Student']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('subject_id', ['options' => $subjects, 'label' => 'Subject']) ?>
                        </div>
                    </div>

                    <div class="form-group-grid">
                        <div class="form-group">
                            <?= $this->Form->control('lecturer_id', ['options' => $lecturers, 'label' => 'Lecturer In Charge']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('status', [
                                'type' => 'select', 
                                'options' => ['Present' => 'Present', 'Absent' => 'Absent', 'Late' => 'Late'],
                                'label' => 'Attendance Status'
                            ]) ?>
                        </div>
                    </div>

                    <div class="form-group-grid">
                        <div class="form-group">
                            <?= $this->Form->control('date', ['label' => 'Session Date']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('time', ['label' => 'Session Time']) ?>
                        </div>
                    </div>

                    <div class="admin-divider">Approval & Audit Details</div>
                    
                    <div class="form-group">
                        <?= $this->Form->control('approval', [
                            'type' => 'select', 
                            'options' => ['Pending' => 'Pending', 'Approved' => 'Approved'],
                            'label' => 'Approval Status'
                        ]) ?>
                    </div>

                    <div class="form-group-grid">
                        <div class="form-group">
                            <?= $this->Form->control('approved_by', ['label' => 'Approved By (Admin ID)']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('approved_at', ['label' => 'Approved At Timestamp', 'empty' => true]) ?>
                        </div>
                    </div>
                </fieldset>
                
                <div class="form-action-footer">
                    <?= $this->Form->postLink(
                        __('Delete Record'),
                        ['action' => 'delete', $attendance->attendance_id],
                        [
                            'confirm' => __('Are you sure you want to delete record # {0}?', $attendance->attendance_id),
                            'class' => 'delete-btn'
                        ]
                    ) ?>
                    
                    <?= $this->Form->button(__('Update Attendance Entry'), ['class' => 'submit-btn']) ?>
                </div>
                <?= $this->Form->end() ?>
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

    /* Layout & Alignment */
    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background: linear-gradient(135deg, var(--bg-light) 0%, #ffffff 100%);
    }

    .main-wrapper {
        margin-left: 320px; /* Aligned with floating sidebar offset */
        padding: 40px;
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .form-wrapper { width: 100%; max-width: 900px; }

    /* Glassmorphism Cards */
    .form-header-card, .main-form-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(196, 121, 85, 0.05);
    }

    .form-header-card {
        padding: 30px 35px;
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .main-form-card { padding: 40px; }

    /* Grid Form Layout */
    .form-group-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

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

    /* Typography */
    .context-label { color: var(--text-muted); font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; margin: 0 0 5px 0; }
    .page-title { margin: 0; font-size: 24px; font-weight: 800; color: var(--text-main); }

    /* Input Styling */
    .clean-fieldset { border: none; padding: 0; margin: 0; }
    legend { display: none; }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 11px; text-transform: uppercase; color: var(--text-muted); letter-spacing: 1px; font-weight: 700; margin-bottom: 10px; }
    
    .form-group input, .form-group select {
        width: 100%;
        padding: 12px 16px;
        font-size: 14px;
        background: #f9fafb;
        border: 1px solid #f3f4f6;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .form-group input:focus, .form-group select:focus {
        outline: none;
        background: #ffffff;
        border-color: var(--lecturer-tan);
        box-shadow: 0 0 0 4px rgba(196, 121, 85, 0.1);
    }

    /* Footer Actions */
    .form-action-footer {
        margin-top: 40px;
        padding-top: 25px;
        border-top: 1px solid #f3f4f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .submit-btn {
        background: var(--lecturer-tan);
        color: white;
        border: none;
        padding: 14px 35px;
        border-radius: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
    }

    .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(196, 121, 85, 0.3); }

    .delete-btn {
        background-color: #fef2f2;
        color: #b91c1c;
        border: 1px solid #fee2e2;
        padding: 14px 25px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 13px;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .delete-btn:hover { background-color: #b91c1c; color: #ffffff; }

    .back-link { text-decoration: none; color: var(--lecturer-tan); font-weight: 700; font-size: 13px; }
</style>