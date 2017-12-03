<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Residencia Entity
 *
 * @property int $Id
 * @property int $puesto_id
 * @property string $residencia
 *
 * @property \App\Model\Entity\PuestosGestion $puestos_gestion
 * @property \App\Model\Entity\Agente[] $agentes
 */
class Residencia extends Entity
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
        'Id' => false
    ];
}
