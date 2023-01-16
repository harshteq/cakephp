<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Emp Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $pincode
 *@property string $country
 */
class Emp extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'password' => true,
        'address' => true,
        'city' => true,
        'pincode' => true,
        'country' => true,
        'token' => true,
      
    ];
}
