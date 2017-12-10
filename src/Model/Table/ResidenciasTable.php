<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Residencias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PuestosGestion
 * @property \Cake\ORM\Association\HasMany $Agentes
 *
 * @method \App\Model\Entity\Residencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Residencia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Residencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Residencia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Residencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Residencia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Residencia findOrCreate($search, callable $callback = null, $options = [])
 */
class ResidenciasTable extends Table
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

        $this->table('residencias');
        $this->displayField('residencia');
        $this->primaryKey('Id');

        $this->belongsTo('PuestosGestion', [
            'foreignKey' => 'puesto_id'
        ]);
        $this->hasMany('Agentes', [
            'foreignKey' => 'residencia_id'
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
       ->requirePresence('first_name' , 'create')
       ->notEmpty('first_name', __('El campo no puede estar vacio'));
       
        $validator
            ->requirePresence('residencia', 'create')
            ->notEmpty('residencia', __('El campo no puede estar vacio'));

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
        $rules->add($rules->existsIn(['puesto_id'], 'PuestosGestion'));
        $rules->add($rules->isUnique(['puesto_id','residencia']) , ['message' => __('El valor tiene que ser único')]);

        return $rules;
    }
}
