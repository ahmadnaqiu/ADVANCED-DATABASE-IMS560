<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 * @var \Cake\Collection\CollectionInterface|string[] $lecturers
 * @var \Cake\Collection\CollectionInterface|string[] $classes
 */
$this->Html->css('class_add', ['block' => true]); // reuse existing styling
?>

<div class="dashboard-container">

    <!-- Lecturer Sidebar -->
    <?= $this->element('lecturer_sidebar') ?>

    <!-- Main content -->
    <main class="main-wrapper">
        <div class="form-wrapper">

            <!-- Header Card -->
            <div class="form-header-card">
                <div>
                    <h4 style="color: var(--text-muted); font-size: 11px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">
                        Subject Management
                    </h4>
                    <h3><?= __('Add New Subject') ?></h3>
                </div>
                <?= $this->Html->link(__('← Back to Subjects'), ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <!-- Main Form Card -->
            <div class="main-form-card">
                <?= $this->Form->create($subject) ?>
                <fieldset>
                    <div class="form-group">
                        <?= $this->Form->control('subject_name', [
                            'label' => 'Subject Name',
                            'placeholder' => 'Enter subject title (e.g., Database Systems)',
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('lecturer_id', [
                            'options' => $lecturers,
                            'label' => 'Assign Lecturer',
                            'empty' => 'Select a lecturer'
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('class_id', [
                            'options' => $classes,
                            'label' => 'Assign Class',
                            'empty' => 'Select a class'
                        ]) ?>
                    </div>
                </fieldset>

                <div style="margin-top: 30px; display: flex; justify-content: flex-end;">
                    <?= $this->Form->button(__('Create Subject'), ['class' => 'submit-btn']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>

        </div>
    </main>
</div>

<style>
/* Form Card */
.main-form-card {
    min-height: 500px;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

/* Form Inputs */
.form-group input,
.form-group select {
    height: 42px;              
    font-size: 0.95rem;
    padding: 0 12px;
}

/* Submit Button */
.submit-btn {
    height: 46px;
    font-size: 1rem;
    padding: 0 22px;
    border-radius: 8px;
    font-weight: 600;
    background-color: var(--accent-maroon);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(129,19,49,0.2);
}

/* Optional: form wrapper spacing */
.form-wrapper {
    width: 100%;
    max-width: 720px;
    margin: 0 auto;
}

/* Header back-link */
.back-link {
    text-decoration: none;
    font-size: 0.85rem;
    color: #505770;
    transition: color 0.2s ease;
}

.back-link:hover {
    color: var(--accent-maroon);
}
</style>
