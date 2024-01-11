<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string $address
 * @property string|null $address2
 * @property string $district
 * @property int $city_id
 * @property string|null $postal_code
 * @property string $phone
 * @property string $location
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\Store[] $stores
 */
class Address extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'address' => true,
        'address2' => true,
        'district' => true,
        'city_id' => true,
        'postal_code' => true,
        'phone' => true,
        'location' => true,
        'modified' => true,
        'city' => true,
        'customers' => true,
        'employees' => true,
        'stores' => true,
    ];
}
