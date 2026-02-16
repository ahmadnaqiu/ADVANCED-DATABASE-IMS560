<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AttendanceFixture
 */
class AttendanceFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'attendance';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'attendance_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'student_id' => 1,
                'lecturer_id' => 1,
                'subject_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'date' => '',
                'time' => 1770289664,
                'approval' => 'Lorem ipsum dolor sit amet',
                'approved_by' => 1,
                'approved_at' => '2026-02-05 11:07:44',
            ],
        ];
        parent::init();
    }
}
