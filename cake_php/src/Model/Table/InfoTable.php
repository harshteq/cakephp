<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Info Model
 *
 * @method \App\Model\Entity\Info newEmptyEntity()
 * @method \App\Model\Entity\Info newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Info[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Info get($primaryKey, $options = [])
 * @method \App\Model\Entity\Info findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Info patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Info[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Info|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Info saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Info[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Info[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Info[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Info[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InfoTable extends Table
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

        $this->setTable('info');
        $this->setDisplayField('id');
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
            ->scalar('firstname')
            ->maxLength('firstname', 10)
            ->minLength('firstname', 3,'please enter valid name')
            ->requirePresence('firstname', 'create')
            ->notEmptyString('firstname','first name is required')
            ->add('firstname',['firstname'=> [
                'rule' => array('custom','/^[A-Za-z]*$/'),
                'message' => 'only enter alphabet '
            ]
            ]);
            

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 50)
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname','last name is required');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email','email  is required')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table',
            'message'=>'email is already exists'
        ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 50)
            ->minLength('password', 8,'minimum eight character')
            ->requirePresence('password', 'create')
            ->notEmptyString('password','password is required')
            ->add('password',[
               'upper'=>[
                'rule'=>['custom','/[A-Z]/'],
                'message'=>'please enter atleast on uppercase character',
               ],
               'lower'=>[
                'rule'=>['custom','/[a-z]/'],
                'message'=>'please enter atleast on lowercase character',
               ],
               'specialchar'=>[
                'rule'=>['custom','/[#?!@$%^&*-]/'],
                'message'=>'please enter atleast 1 specialchar character',
               ],
               'number'=>[
                'rule'=>['custom','/[0-9]/'],
                'message'=>'please enter atleast 1 number',
               ],
            ]);

        $validator
            ->scalar('phonenumber')
            ->integer('phonenumber','only number is required')
            ->maxLength('phonenumber', 10)
            ->minLength('phonenumber', 10,'please enter minimum  valid length')
            ->requirePresence('phonenumber', 'create')
            ->notEmptyString('phonenumber','phone number is required');

            $validator
            ->scalar('image')
            ->notEmptyFile('image')
            ->add('image',[
                'mimeType'=>[
                    'rule'=>['mimeType',['image/jpg','image/png'] ],
                    'message'=>'please uplaod onlu jpg and png file',
                ],
                'filesize'=>[
                    'rule'=>['filesize','<=','1MB' ],
                    'message'=>'image file upload size must be less then 1 mb',
                ]
            ]);


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
    public function login($email, $password)
    {
        $result = $this->find('all')->where(['email' => $email, 'password' => $password])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
