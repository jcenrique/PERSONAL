<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

       $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
       ->add('id' , 'valid' , ['rule' => 'numeric'])
       ->notEmpty('id' , 'create');

       $validator
       ->requirePresence('firts_name' , 'create')
       ->notEmpty('first_name', __('El campo no puede estar vacio'));
       
        $validator
       ->requirePresence('last_name' , 'create')
       ->notEmpty('last_name' , __('El campo no puede estar vacio'));
       
         $validator
       ->requirePresence('username' , 'create')
       ->notEmpty('username' , __('El campo no puede estar vacio'));
       
        $validator
       ->add('email' , 'valid' , ['rule' => 'email', 'message' => __('El formato de correo no es correcto')])
       ->requirePresence('email' , 'create')
       ->notEmpty('email', __('El campo no puede estar vacio'));
       
        $validator
            ->requirePresence('password' , 'create')
            ->notEmpty('password' , __('El campo no puede estar vacio') , 'create');

       

        $validator
           
            ->requirePresence('role_id', 'create')
            ->notEmpty('role_id' , __('El campo no puede estar vacio'));

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        

        return $rules;
    }
   public function findAuth(\Cake\ORM\Query $query, array $options)
   {
       $query
        ->select(['id','firts_name', 'last_name','email','password','role_id']);
    
        return $query;    
   }
    public function recoverPassword($id)
    {
        $user = $this->get($id);
        
        return $user->password;
    }
   
}
