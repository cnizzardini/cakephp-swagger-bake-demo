<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity
 *
 * @property int $id
 * @property int $film_id
 * @property int $store_id
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Film $film
 * @property \App\Model\Entity\Store $store
 * @property \App\Model\Entity\Rental[] $rentals
 */
class Inventory extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'film_id' => true,
        'store_id' => true,
        'modified' => true,
        'film' => true,
        'store' => true,
        'rentals' => true,
    ];
}
