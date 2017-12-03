<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PuestosGestion Model
 *
 * @method \App\Model\Entity\PuestosGestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\PuestosGestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PuestosGestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PuestosGestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PuestosGestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PuestosGestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PuestosGestion findOrCreate($search, callable $callback = null, $options = [])
 */
class PuestosGestionTable extends Table
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

        $this->table('puestos_gestion');
        $this->displayField('puesto');
        $this->primaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('puesto', 'create')
            ->notEmpty('puesto');

        return $validator;
    }
}
