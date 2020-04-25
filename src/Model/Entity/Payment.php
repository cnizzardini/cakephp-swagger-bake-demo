<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $employee_id
 * @property int|null $rental_id
 * @property string $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Rental $rental
 */
class Payment extends Entity
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
        'customer_id' => true,
        'employee_id' => true,
        'rental_id' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'employee' => true,
        'rental' => true,
    ];
}
