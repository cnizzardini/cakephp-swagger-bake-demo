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
     * @inheritDoc
     */
    protected array $_accessible = [
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
