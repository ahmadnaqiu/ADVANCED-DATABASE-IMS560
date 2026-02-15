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
                    <h3 class="page-title"><?= __('Add New Student') ?></h3>
                </div>
                <?= $this->Html->link(__('← Back to List'), ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <div class="main-form-card">
                <div class="students form content">
                    <?= $this->Form->create($student) ?>
                    <fieldset class="clean-fieldset">
                        <legend><?= __('Add Student') ?></legend>
                        <?php
                            // Original form controls preserved exactly
                            echo $this->Form->control('name', ['placeholder' => 'Full Name']);
                            echo $this->Form->control('email', ['placeholder' => 'email@example.com']);
                            echo $this->Form->control('password', ['type' => 'password']);
                            echo $this->Form->control('class', ['placeholder' => 'e.g. CDIM262']);
                            echo $this->Form->control('subject', ['placeholder' => 'Assigned Subject']);
                            echo $this->Form->control('status', [
                                'type' => 'select', 
                                'options' => ['PRESENT' => 'Present', 'ABSENT' => 'Absent'],
                                'empty' => 'Select Status'
                            ]);
                        ?>
                    </fieldset>
                    
                    <div class="form-action-footer">
                        <?= $this->Form->button(__('Submit'), ['class' => 'submit-btn']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </main>
</div>

<style>
    /* Design Variables based on images */
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
        margin-left: 320px; /* Aligned with floating sidebar width */
        padding: 40px;
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .form-wrapper {
        width: 100%;
        max-width: 800px;
    }

    /* Card Styling from screenshots */
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

    .main-form-card {
        padding: 40px;
    }

    /* Typography */
    .context-label {
        color: var(--text-muted);
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .page-title {
        margin: 0;
        font-size: 24px;
        font-weight: 800;
        color: var(--text-main);
    }

    /* Form UI Elements */
    .clean-fieldset { border: none; padding: 0; margin: 0; }
    legend { display: none; }

    /* Modern Input Styling */
    .input { margin-bottom: 20px; }
    .input label {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 1px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .input input, .input select {
        width: 100%;
        padding: 14px 18px;
        font-size: 14px;
        background: #f9fafb;
        border: 1px solid #f3f4f6;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .input input:focus {
        outline: none;
        border-color: var(--lecturer-tan);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(196, 121, 85, 0.1);
    }

    /* Action Buttons */
    .form-action-footer {
        margin-top: 30px;
        display: flex;
        justify-content: flex-end;
    }

    .submit-btn {
        background: var(--lecturer-tan);
        color: white;
        border: none;
        padding: 14px 40px;
        border-radius: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(196, 121, 85, 0.3);
    }

    .back-link {
        text-decoration: none;
        color: var(--lecturer-tan);
        font-weight: 700;
        font-size: 13px;
    }
</style>