<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formaciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cursos
 * @property \Cake\ORM\Association\BelongsToMany $Agentes
 *
 * @method \App\Model\Entity\Formacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Formacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Formacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Formacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Formacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Formacione findOrCreate($search, callable $callback = null, $options = [])
 */
class FormacionesTable extends Table
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

        $this->table('formaciones');
        $this->displayField('Nombre');
        $this->primaryKey('id');

        $this->belongsTo('Cursos', [
            'foreignKey' => 'curso_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Agentes', [
            'foreignKey' => 'formacione_id',
            'targetForeignKey' => 'agente_id',
            'joinTable' => 'agentes_formations'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('fecha_inicio')
            ->requirePresence('fecha_inicio', 'create')
            ->notEmpty('fecha_inicio');

        $validator
            ->date('fecha_fin')
            ->requirePresence('fecha_fin', 'create')
            ->notEmpty('fecha_fin');

        $validator
            ->time('hora_inicio')
            ->requirePresence('hora_inicio', 'create')
            ->notEmpty('hora_inicio');

        $validator
            ->time('hora_fin')
            ->requirePresence('hora_fin', 'create')
            ->notEmpty('hora_fin');

        

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
        $rules->add($rules->existsIn(['curso_id'], 'Cursos'));

        return $rules;
    }
}
