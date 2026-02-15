<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SubjectsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('subjects');
        $this->setDisplayField('subject_name');
        $this->setPrimaryKey('subject_id');


        $this->belongsTo('Lecturers', [
            'foreignKey' => 'lecturer_id',
            'joinType' => 'LEFT', 
        ]);

        $this->belongsTo('Class', [
            'foreignKey' => 'class_id',
            'joinType' => 'LEFT', 
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('subject_name')
            ->maxLength('subject_name', 255)
            ->requirePresence('subject_name', 'create')
            ->notEmptyString('subject_name');

        $validator
            ->integer('lecturer_id')
            ->allowEmptyString('lecturer_id'); 

        $validator
            ->integer('class_id')
            ->allowEmptyString('class_id'); 

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['lecturer_id'], 'Lecturers'), ['errorField' => 'lecturer_id']);
        $rules->add($rules->existsIn(['class_id'], 'Class'), ['errorField' => 'class_id']);

        return $rules;
    }
}
