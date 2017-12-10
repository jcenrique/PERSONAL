<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $firts_name
 * @property string $last_name
 * @property string $password
 * @property string $email
 * @property string $role
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Role[] $roles
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($value)
    {
        if (!empty ($value)) {
           
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
        else
        {
            $id_user =$this->_properties['id'];
            $user = TableRegistry::get('Users')->recoverPassword($id_user);
            return $user;   
        }
        
    }

     // full_name virtual field
    protected function _getNombreCompleto()
    {
        return $this->_properties['firts_name'] . ' ' . $this->_properties['last_name'] ;
    }

}
