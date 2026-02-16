<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClassFixture
 */
class ClassFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'class';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'class_id' => 1,
                'class_name' => 'Lorem ipsum dolor sit amet',
                'lecturer_id' => 1,
            ],
        ];
        parent::init();
    }
}
