<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="page-header">
            <div class="header-content">
                <h3><?= __('Edit Student Profile') ?></h3>
                <p>Update information for <?= h($student->name) ?>.</p>
            </div>
            <?= $this->Html->link(__('Back to Directory'), ['action' => 'index'], ['class' => 'add-btn secondary']) ?>
        </div>

        <div class="main-card form-card">
            <div class="students form content">
                <?= $this->Form->create($student) ?>
                <fieldset>
                    <legend><?= __('Student Information') ?></legend>
                    <div class="form-grid">
                        <?php
                            echo $this->Form->control('name', ['placeholder' => 'Enter full name']);
                            echo $this->Form->control('email', ['placeholder' => 'email@example.com']);
                            echo $this->Form->control('password', ['placeholder' => 'Leave blank to keep current password']);
                            echo $this->Form->control('class', ['placeholder' => 'e.g. Class 10A']);
                            echo $this->Form->control('subject', ['placeholder' => 'Major subject']);
                            echo $this->Form->control('status', ['placeholder' => 'Active / Inactive']);
                        ?>
                    </div>
                </fieldset>
                <div class="form-actions">
                    <?= $this->Form->button(__('Save Changes'), ['class' => 'submit-btn']) ?>
                    <?= $this->Form->postLink(
                        __('Delete Student'),
                        ['action' => 'delete', $student->student_id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $student->student_id), 'class' => 'delete-text-link']
                    ) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </main>
</div>

<style>
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

    /* Page Header Aligned with Form */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 600px; /* Matched to form width */
        margin: 0 auto 30px auto;
    }

    .page-header h3 {
        font-size: 28px;
        font-weight: 800;
        color: #1a1a1a;
    }

    .add-btn {
        background: #C47955;
        color: white !important;
        padding: 10px 20px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
        font-size: 13px;
    }

    .add-btn.secondary { background: #8e8e93; }

    /* Centered Small Form Card */
    .form-card {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.02);
        max-width: 600px; /* Makes it smaller */
        margin: 0 auto;
    }

    /* Form Styling */
    legend {
        font-weight: 800;
        font-size: 18px;
        color: #1c1c1e;
        margin-bottom: 20px;
        border: none;
    }

    fieldset { border: none; padding: 0; }

    /* Input Styling */
    .form-grid .input { margin-bottom: 15px; }
    
    .form-grid label {
        display: block;
        font-size: 11px;
        font-weight: 700;
        color: #8e8e93;
        text-transform: uppercase;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .form-grid input {
        width: 100%;
        padding: 12px 15px;
        border-radius: 10px;
        border: 1px solid rgba(0,0,0,0.05);
        background: white;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .form-grid input:focus {
        outline: none;
        border-color: #C47955;
        box-shadow: 0 0 0 4px rgba(196, 121, 85, 0.1);
    }

    /* Actions */
    .form-actions {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .submit-btn {
        width: 100%;
        background: #C47955;
        color: white;
        border: none;
        padding: 14px;
        border-radius: 12px;
        font-weight: 800;
        font-size: 14px;
        cursor: pointer;
        transition: opacity 0.2s;
        line-height:1.5px;
    }

    .submit-btn:hover { opacity: 0.9; }

    .delete-text-link {
        color: #d72c2d;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        line-height: 1.5px;
    }
</style>