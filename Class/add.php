<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class $class
 * @var \Cake\Collection\CollectionInterface|string[] $lecturers
 * @var \Cake\Collection\CollectionInterface|string[] $subjects
 */
$this->Html->css('class_add', ['block' => true]);
?>

<div class="dashboard-container">
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">
        <div class="form-wrapper">
            <div class="form-header-card">
                <div>
                    <h4 style="color: var(--text-muted); font-size: 11px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Records Management</h4>
                    <h3><?= __('Create New Class Group') ?></h3>
                </div>
                <?= $this->Html->link(__('← Back to List'), ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <div class="main-form-card">
                <?= $this->Form->create($class) ?>
                <fieldset>
                    <div class="form-group">
                        <?= $this->Form->control('class_name', [
                            'label' => 'Class Name',
                            'placeholder' => 'Enter class code (e.g. CDIM262 A)',
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('lecturer_id', [
                            'options' => $lecturers,
                            'label' => 'Assign Lecturer',
                            'empty' => 'Select a faculty member'
                        ]) ?>
                    </div>

                    <?php if (!empty($subjects)): ?>
                    <div class="form-group">
                        <?= $this->Form->control('subject_id', [
                            'options' => $subjects,
                            'label' => 'Assign Subject',
                            'empty' => 'Select a subject'
                        ]) ?>
                    </div>
                    <?php endif; ?>
                </fieldset>

                <div style="margin-top: 30px; display: flex; justify-content: flex-end;">
                    <?= $this->Form->button(__('Create Class'), ['class' => 'submit-btn']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </main>
</div>

<style>
/* Dashboard Variables for Lecturer Portal */
:root {
    --lecturer-tan: #C47955; /* Match Lecturer Portal branding */
    --text-muted: #86868b;
    --glass-bg: rgba(255, 255, 255, 0.85);
}

/* Layout Sync */
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

/* Form Card with Glassmorphism */
.main-form-card {
    min-height: 500px;
    padding: 40px;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    border: 1px solid rgba(255, 255, 255, 0.4);
    box-shadow: 0 8px 32px rgba(196, 121, 85, 0.05);
}

.form-header-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 25px 35px;
    margin-bottom: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Form Inputs */
.form-group label {
    display: block;
    font-size: 11px;
    text-transform: uppercase;
    color: var(--text-muted);
    font-weight: 700;
    margin-bottom: 8px;
}

.form-group input,
.form-group select {
    width: 100%;
    height: 46px;
    border-radius: 12px;
    border: 1px solid #f3f4f6;
    background: #f9fafb;
    padding: 0 15px;
    margin-bottom: 20px;
}

/* Submit Button using Tan Branding */
.submit-btn {
    background: var(--lecturer-tan);
    color: white;
    border: none;
    height: 48px;
    padding: 0 30px;
    border-radius: 14px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(196, 121, 85, 0.2);
    transition: transform 0.2s;
}

.submit-btn:hover {
    transform: translateY(-2px);
}

.back-link {
    color: var(--lecturer-tan);
    text-decoration: none;
    font-weight: 700;
    font-size: 13px;
}

.form-wrapper {
    width: 100%;
    max-width: 800px;
}
</style>