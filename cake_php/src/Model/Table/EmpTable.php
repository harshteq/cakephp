<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emp Model
 *
 * @method \App\Model\Entity\Emp newEmptyEntity()
 * @method \App\Model\Entity\Emp newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Emp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Emp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Emp findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Emp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Emp[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Emp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Emp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Emp[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Emp[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Emp[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Emp[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EmpTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('emp');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
        ->maxLength('name', 50)
        ->requirePresence('name', 'create')
        ->notEmptyString('name')
        ->add('name', [
            'length' => [
                'rule' => ['minLength', 2],
                'message' => 'First Name need to be at least 2 characters long',
            ]
        ]);
        
            
        $validator
            ->scalar('address')
            ->maxLength('address', 50)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('pincode')
            ->maxLength('pincode', 50)
            ->requirePresence('pincode', 'create')
            ->notEmptyString('pincode');

        $validator
            ->scalar('country')
            ->maxLength('country', 50)
            ->requirePresence('country', 'create')
            ->notEmptyString('country');

        return $validator;
    }
}
