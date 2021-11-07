<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use SwaggerBake\Lib\Attribute\OpenApiSchema;

/**
 * Store Entity
 *
 * @property int $id
 * @property int $manager_employee_id
 * @property int $address_id
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ManagerEmployee $manager_employee
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Inventory[] $inventories
 */
#[OpenApiSchema(
    visibility: OpenApiSchema::VISIBILE_ALWAYS,
    description: 'Set to OpenApiSchema::VISIBILE_ALWAYS'
)]
class Store extends Entity
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
        'manager_employee_id' => true,
        'address_id' => true,
        'modified' => true,
        'manager_employee' => true,
        'address' => true,
        'customers' => true,
        'employees' => true,
        'inventories' => true,
    ];
}
