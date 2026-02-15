<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class $class
 * @var iterable $subjects
 */
$this->Html->css('dashboard', ['block' => true]);
?>

<div class="dashboard-container">

    <!-- Sidebar -->
    <?= $this->element('lecturer_sidebar') ?>

    <main class="main-wrapper">

        <div class="page-header">
            <div class="header-content">
                <h3>Add New Class</h3>
                <p>Create a new class and assign subject.</p>
            </div>
        </div>

        <div class="main-card form-card">

            <?= $this->Form->create($class, ['class' => 'custom-form']) ?>

                <div class="form-group">
                    <?= $this->Form->control('class_name', [
                        'label' => 'Class Name',
                        'class' => 'form-input',
                        'placeholder' => 'e.g. CSF3A'
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('subject_id', [
                        'label' => 'Subject',
                        'options' => $subjects,
                        'empty' => 'Select subject',
                        'class' => 'form-input'
                    ]) ?>
                </div>

                <div class="form-actions">
                    <?= $this->Form->button('Save Class', ['class' => 'start-btn lecturer-btn']) ?>
                    <?= $this->Html->link(
                        'Cancel',
                        ['action' => 'index'],
                        ['class' => 'cancel-btn']
                    ) ?>
                </div>

            <?= $this->Form->end() ?>

        </div>

    </main>
</div>
