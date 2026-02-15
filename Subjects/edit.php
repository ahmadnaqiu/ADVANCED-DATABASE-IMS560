<?php
$this->Html->css('class_add', ['block' => true]);
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
                    <h3><?= h($subject->subject_name) ?></h3>
                </div>
                <?= $this->Html->link('← Back to Subjects', ['action' => 'index'], ['class' => 'back-link']) ?>
            </div>

            <!-- Main Form Card -->
            <div class="main-form-card">
                <?= $this->Form->create($subject) ?>
                <fieldset>

                    <div class="form-group">
                        <?= $this->Form->control('subject_name', [
                            'label' => 'Subject Name',
                            'placeholder' => 'Enter subject name',
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

                <div style="margin-top:30px; display:flex; justify-content:flex-end; gap:10px;">
                    <?= $this->Form->postLink(
                        'Delete Subject',
                        ['action' => 'delete', $subject->subject_id],
                        [
                            'confirm' => 'Delete ' . $subject->subject_name . '?',
                            'class' => 'submit-btn btn-danger'
                        ]
                    ) ?>

                    <?= $this->Form->button('Update Subject', ['class' => 'submit-btn']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>

        </div>
    </main>
</div>
