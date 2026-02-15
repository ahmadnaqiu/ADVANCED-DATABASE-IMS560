<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lecturer $lecturer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lecturer'), ['action' => 'edit', $lecturer->lecturer_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lecturer'), ['action' => 'delete', $lecturer->lecturer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $lecturer->lecturer_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lecturers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lecturer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="lecturers view content">
            <h3><?= h($lecturer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($lecturer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($lecturer->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Faculty') ?></th>
                    <td><?= h($lecturer->faculty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lecturer Id') ?></th>
                    <td><?= $this->Number->format($lecturer->lecturer_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>