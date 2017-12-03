<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agentes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cargos
 * @property \Cake\ORM\Association\BelongsTo $Residencias
 * @property \Cake\ORM\Association\HasMany $DevolucionesComputo
 * @property \Cake\ORM\Association\HasMany $DevolucionesSabados
 * @property \Cake\ORM\Association\HasMany $DiaAdicionalVacaciones
 * @property \Cake\ORM\Association\HasMany $Disponibilidad
 * @property \Cake\ORM\Association\HasMany $HorasComputo
 * @property \Cake\ORM\Association\HasMany $Observaciones
 * @property \Cake\ORM\Association\HasMany $ReconocimientosMedico
 * @property \Cake\ORM\Association\HasMany $SabadosTrabajados
 * @property \Cake\ORM\Association\HasMany $Telefonos
 * @property \Cake\ORM\Association\BelongsToMany $Cursos
 *
 * @method \App\Model\Entity\Agente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Agente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agente findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgentesTable extends Table
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

        $this->table('agentes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cargos', [
            'foreignKey' => 'cargo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Residencias', [
            'foreignKey' => 'residencia_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('DevolucionesComputo', [
            'foreignKey' => 'agente_id'
        ]);
        $this->hasMany('DevolucionesSabados', [
            'foreignKey' => 'agente_id'
        ]);
        $this->hasMany('DiaAdicionalVacaciones', [
            'foreignKey' => 'agente_id'
        ]);
        $this->hasMany('Disponibilidad', [
            'foreignKey' => 'agente_id'
        ]);
        $this->hasMany('HorasComputo', [
            'foreignKey' => 'agente_id'
        ]);
        $this->hasMany('Observaciones', [
            'foreignKey' => 'agente_id'
        ]);
        $this->hasMany('ReconocimientosMedico', [
            'foreignKey' => 'agente_id'
        ]);
        $this->hasMany('SabadosTrabajados', [
            'foreignKey' => 'agente_id'
        ]);
        $this->hasMany('Telefonos', [
            'foreignKey' => 'agente_id'
        ]);
        $this->belongsToMany('Cursos', [
            'foreignKey' => 'agente_id',
            'targetForeignKey' => 'curso_id',
            'joinTable' => 'agentes_cursos'
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
            ->requirePresence('apellido1', 'create')
            ->notEmpty('apellido1');

        $validator
            ->requirePresence('apellido2', 'create')
            ->notEmpty('apellido2');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->integer('codigo_agente')
            ->requirePresence('codigo_agente', 'create')
            ->notEmpty('codigo_agente')
            ->add('codigo_agente', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('residencia_id', 'create')
            ->notEmpty('residencia_id');
            
        $validator
            ->requirePresence('cargo_id', 'create')
            ->notEmpty('cargo_id');
            
        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->isUnique(['codigo_agente']));
        $rules->add($rules->existsIn(['cargo_id'], 'Cargos'));
        $rules->add($rules->existsIn(['residencia_id'], 'Residencias'));

        return $rules;
    }
}
