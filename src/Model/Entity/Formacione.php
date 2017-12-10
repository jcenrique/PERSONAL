<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Formacione Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $fecha_inicio
 * @property \Cake\I18n\Time $fecha_fin
 * @property \Cake\I18n\Time $hora_inicio
 * @property \Cake\I18n\Time $hora_fin
 * @property int $curso_id
 * @property string $observacion
 *
 * @property \App\Model\Entity\Curso $curso
 * @property \App\Model\Entity\Agente[] $agentes
 */
class Formacione extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
    
     // full_name virtual field
   protected function _getNombre()
    {
        $cursos = TableRegistry::get('Cursos');
        $curso = $cursos
                ->find()
                ->where(['id' => $this->_properties['curso_id']])
                ->first();

        
       
        return $curso->nombre_curso ;
    }
}
