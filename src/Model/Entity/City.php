<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property string $name Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
 * incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
 * nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
 * dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
 * mollit anim id est laborum.
 *
 * - some
 * - bullets
 *
 * Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
 * magna aliqua.
 *
 * @property int $country_id
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Address[] $addresses
 */
class City extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'name' => true,
        'country_id' => true,
        'modified' => true,
        'country' => true,
        'addresses' => true,
    ];
}
