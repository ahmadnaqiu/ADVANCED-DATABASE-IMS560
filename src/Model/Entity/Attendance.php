<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attendance Entity
 *
 * @property int $attendance_id
 * @property string $name
 * @property int $student_id
 * @property int $lecturer_id
 * @property int $subject_id
 * @property string $status
 * @property \Cake\I18n\DateTime $date
 * @property \Cake\I18n\DateTime $time
 * @property string|null $approval
 * @property int|null $approved_by
 * @property \Cake\I18n\DateTime|null $approved_at
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Lecturer $lecturer
 * @property \App\Model\Entity\Subject $subject
 */
class Attendance extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'student_id' => true,
        'lecturer_id' => true,
        'subject_id' => true,
        'status' => true,
        'date' => true,
        'time' => true,
        'approval' => true,
        'approved_by' => true,
        'approved_at' => true,
        'student' => true,
        'lecturer' => true,
        'subject' => true,
    ];
}
