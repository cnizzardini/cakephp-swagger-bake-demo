<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $address_id
 * @property string|resource|null $picture
 * @property string|null $email
 * @property int $store_id
 * @property bool $is_active
 * @property string $username
 * @property string|null $password
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Store $store
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Rental[] $rentals
 */
class Employee extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'address_id' => true,
        'picture' => true,
        'email' => true,
        'store_id' => true,
        'is_active' => true,
        'username' => true,
        'password' => true,
        'modified' => true,
        'address' => true,
        'store' => true,
        'payments' => true,
        'rentals' => true,
    ];

    /**
     * @inheritDoc
     */
    protected array $_hidden = [
        'password','picture'
    ];
}
