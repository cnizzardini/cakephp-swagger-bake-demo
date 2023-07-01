<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\FilmCategory[] $film_categories
 */
class Category extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'name' => true,
        'modified' => true,
        'film_categories' => true,
    ];
}
