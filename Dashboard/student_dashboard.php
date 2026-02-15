<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>

    <!--Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <?= $this->Html->css('student_dashboard') ?>

    <style>
        :root {
            --accent-maroon: #811331;
            --bg-light: #fdf2f4;
            --text-main: #1d1d1f;
            --text-muted: #86868b;
        }

        .attendance-container {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 40px;
        }

        .attendance-status {
            font-size: 0.85rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            background-color: var(--bg-light);
            color: var(--accent-maroon);
            border: 1px solid rgba(129, 19, 49, 0.1);
        }

        .attendance-edit-btn {
            padding: 6px 16px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            border: 1.5px solid var(--accent-maroon);
            border-radius: 20px;
            background: transparent;
            color: var(--accent-maroon);
            cursor: pointer;
        }

        .attendance-edit-btn:hover {
            background-color: var(--accent-maroon);
            color: white;
        }

        select.attendance-select {
            padding: 6px 16px;
            border-radius: 20px;
            border: 1px solid #d1d5db;
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            appearance: none;
            cursor: pointer;
        }

        .classes-table {
            width: 100%;
            border-collapse: collapse;
        }

        .classes-table th, .classes-table td {
            border: 1px solid #e5e7eb;
            padding: 10px 14px;
            text-align: left;
        }

        .classes-table th {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body>

<div class="dashboard-container">

    <?= $this->element('student_sidebar') ?>

    <main class="main-wrapper">

        <div class="dashboard-cards">
            <div class="card">
                <h4>Today</h4>
                <p><?= date('l, j F Y') ?></p>
            </div>
            <div class="card">
                <h4>Calendar</h4>
                <p><?= date('F Y') ?></p>
            </div>
            <div class="card">
                <h4>Notifications</h4>
                <p>No notifications</p>
            </div>
        </div>

        <div class="card">
            <h4>Today's Classes</h4>

            <table class="classes-table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Lecturer</th>
                        <th>Mark Attendance</th>
                    </tr>
                </thead>
                <tbody>

                <?php if (!empty($subjects)): ?>
                    <?php foreach ($subjects as $subject): ?>
                        <?php
                        $formId = 'form-' . $subject->subject_id;
                        $selectId = 'select-' . $subject->subject_id;
                        $statusId = 'status-' . $subject->subject_id;
                        $editId = 'edit-' . $subject->subject_id;
                        $currentStatus = '-'; // Default
                        ?>

                        <tr>
                            <td><?= h($subject->subject_name) ?></td>
                            <td><?= h($subject->lecturer->name ?? '-') ?></td>
                            <td>
                                <?php if (!empty($studentProfile)): ?>
                                    <div class="attendance-container">

                                        <span id="<?= $statusId ?>" class="attendance-status">
                                            <?= h($currentStatus) ?>
                                        </span>

                                        <button type="button"
                                            id="<?= $editId ?>"
                                            class="attendance-edit-btn"
                                            onclick="editAttendance('<?= $formId ?>','<?= $selectId ?>','<?= $statusId ?>','<?= $editId ?>')">
                                            Mark
                                        </button>

                                        <?= $this->Form->create(null, [
                                            'url' => ['controller' => 'Attendance', 'action' => 'mark'],
                                            'id' => $formId,
                                            'style' => 'display:none; margin-left:10px;'
                                        ]) ?>
                                            <?= $this->Form->hidden('subject_id', ['value' => $subject->subject_id]) ?>
                                            <?= $this->Form->hidden('lecturer_id', ['value' => $subject->lecturer_id]) ?>
                                            <?= $this->Form->hidden('student_id', ['value' => $studentProfile->id]) ?>

                                            <select name="status" id="<?= $selectId ?>" class="attendance-select"
                                                onchange="confirmAttendance(this,'<?= $formId ?>')">
                                                <option value="" selected disabled>Select</option>
                                                <option value="Present">Present</option>
                                                <option value="Absent">Absent</option>
                                            </select>
                                        <?= $this->Form->end() ?>

                                    </div>
                                <?php else: ?>
                                    <span style="color:#999;">No profile</span>
                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align:center; padding:40px;">
                            No subjects assigned.
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>

    </main>
</div>

<script>
function confirmAttendance(selectElem, formId) {
    const status = selectElem.value;
    if (!status) return;

    if (confirm("Set attendance to " + status + "?")) {
        document.getElementById(formId).submit();
    }
}

function editAttendance(formId, selectId, statusId, editId) {
    document.getElementById(statusId).style.display = 'none';
    document.getElementById(editId).style.display = 'none';
    document.getElementById(formId).style.display = 'inline-block';
    document.getElementById(selectId).focus();
}
</script>

</body>
</html>
