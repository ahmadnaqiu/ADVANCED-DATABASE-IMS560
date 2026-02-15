<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class AttendanceTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('attendance');
        $this->setPrimaryKey('attendance_id');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
        ]);
        $this->belongsTo('Lecturers', [
            'foreignKey' => 'lecturer_id',
        ]);
        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('student_id')
            ->notEmptyString('student_id');

        $validator
            ->integer('lecturer_id')
            ->notEmptyString('lecturer_id');

        $validator
            ->integer('subject_id')
            ->notEmptyString('subject_id');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        // FIXED: correct types
        $validator
            ->date('date')
            ->notEmptyDate('date');

        $validator
            ->time('time')
            ->notEmptyTime('time');

        $validator
            ->scalar('approval')
            ->allowEmptyString('approval');

        $validator
            ->integer('approved_by')
            ->allowEmptyString('approved_by');

        $validator
            ->dateTime('approved_at')
            ->allowEmptyDateTime('approved_at');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['lecturer_id'], 'Lecturers'));
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));
        return $rules;
    }
}
