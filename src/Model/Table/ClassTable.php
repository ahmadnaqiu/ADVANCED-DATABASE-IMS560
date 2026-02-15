<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

/**
 * Class Model
 *
 * @property \App\Model\Table\LecturersTable&\Cake\ORM\Association\BelongsTo $Lecturers
 * @property \App\Model\Table\SubjectsTable&\Cake\ORM\Association\HasMany $Subjects
 */
class ClassTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('class');
        $this->setDisplayField('class_name');
        $this->setPrimaryKey('class_id');

        // Associations
        $this->belongsTo('Lecturers', [
            'foreignKey' => 'lecturer_id',
            'joinType' => 'INNER',
        ]);

        // Class hv many subj
        $this->hasMany('Subjects', [
            'foreignKey' => 'class_id', 
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('class_name')
            ->maxLength('class_name', 100)
            ->requirePresence('class_name', 'create')
            ->notEmptyString('class_name');

        $validator
            ->integer('lecturer_id')
            ->notEmptyString('lecturer_id');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['lecturer_id'], 'Lecturers'), ['errorField' => 'lecturer_id']);

        return $rules;
    }
}
