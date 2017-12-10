<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AgentesFormation Entity
 *
 * @property int $id
 * @property int $formacione_id
 * @property int $agente_id
 * @property bool $is_trabajado
 * @property string $observacion
 *
 * @property \App\Model\Entity\Formacione $formacione
 * @property \App\Model\Entity\Agente $agente
 */
class AgentesFormation extends Entity
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
}
