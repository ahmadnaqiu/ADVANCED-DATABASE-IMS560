<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lecturers Model
 *
 * @method \App\Model\Entity\Lecturer newEmptyEntity()
 * @method \App\Model\Entity\Lecturer newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Lecturer> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lecturer get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Lecturer findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Lecturer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Lecturer> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lecturer|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Lecturer saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Lecturer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lecturer>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lecturer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lecturer> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lecturer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lecturer>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lecturer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lecturer> deleteManyOrFail(iterable $entities, array $options = [])
 */
class LecturersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('lecturers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('lecturer_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('faculty')
            ->maxLength('faculty', 255)
            ->requirePresence('faculty', 'create')
            ->notEmptyString('faculty');

        return $validator;
    }
}
