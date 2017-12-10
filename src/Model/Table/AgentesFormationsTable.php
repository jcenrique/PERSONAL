<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AgentesFormations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Formaciones
 * @property \Cake\ORM\Association\BelongsTo $Agentes
 *
 * @method \App\Model\Entity\AgentesFormation get($primaryKey, $options = [])
 * @method \App\Model\Entity\AgentesFormation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AgentesFormation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AgentesFormation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AgentesFormation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AgentesFormation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AgentesFormation findOrCreate($search, callable $callback = null, $options = [])
 */
class AgentesFormationsTable extends Table
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

        $this->table('agentes_formations');
        $this->displayField('nombre_curso');
        $this->primaryKey('id');

        $this->belongsTo('Formaciones', [
            'foreignKey' => 'formacione_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Agentes', [
            'foreignKey' => 'agente_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('is_trabajado')
            ->requirePresence('is_trabajado', 'create')
            ->notEmpty('is_trabajado');

        $validator
            ->allowEmpty('observacion');

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
        $rules->add($rules->existsIn(['formacione_id'], 'Formaciones'));
        $rules->add($rules->existsIn(['agente_id'], 'Agentes'));
        $rules->add($rules->isUnique(['agente_id', 'formacione_id'], ['message' => __('La formación y el agente estan duplicados, por favor intentelo de nuevo')]));

        return $rules;
    }
}
