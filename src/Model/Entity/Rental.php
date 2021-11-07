<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use SwaggerBake\Lib\Attribute\OpenApiSchema;

/**
 * Rental Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $rental_date
 * @property int $inventory_id
 * @property int $customer_id
 * @property \Cake\I18n\FrozenTime|null $return_date
 * @property int $employee_id
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Inventory $inventory
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Payment[] $payments
 */
#[OpenApiSchema(
    visibility: OpenApiSchema::VISIBILE_HIDDEN,
    description: 'Set to OpenApiSchema::VISIBILE_HIDDEN'
)]
class Rental extends Entity
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
        'rental_date' => true,
        'inventory_id' => true,
        'customer_id' => true,
        'return_date' => true,
        'employee_id' => true,
        'modified' => true,
        'inventory' => true,
        'customer' => true,
        'employee' => true,
        'payments' => true,
    ];
}
