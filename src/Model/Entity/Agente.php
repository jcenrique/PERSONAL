<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agente Entity
 *
 * @property int $id
 * @property string $apellido1
 * @property string $apellido2
 * @property string $nombre
 * @property int $cargo_id
 * @property int $residencia_id
 * @property int $codigo_agente
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Cargo $cargo
 * @property \App\Model\Entity\Residencia $residencia
 * @property \App\Model\Entity\DevolucionesComputo[] $devoluciones_computo
 * @property \App\Model\Entity\DevolucionesSabado[] $devoluciones_sabados
 * @property \App\Model\Entity\DiaAdicionalVacacione[] $dia_adicional_vacaciones
 * @property \App\Model\Entity\Disponibilidad[] $disponibilidad
 * @property \App\Model\Entity\HorasComputo[] $horas_computo
 * @property \App\Model\Entity\Observacione[] $observaciones
 * @property \App\Model\Entity\ReconocimientosMedico[] $reconocimientos_medico
 * @property \App\Model\Entity\SabadosTrabajado[] $sabados_trabajados
 * @property \App\Model\Entity\Telefono[] $telefonos
 * @property \App\Model\Entity\Curso[] $cursos
 */
class Agente extends Entity
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
    
     protected $_hidden = [
        'password'
    ];
	
	 protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
    
    // full_name virtual field
    protected function _getNombreCompleto()
    {
        return $this->_properties['nombre'] . ' ' . $this->_properties['apellido1'] . ' ' . $this->_properties['apellido2'];
    }
}
