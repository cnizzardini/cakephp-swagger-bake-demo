<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FilmCategory Entity
 *
 * @property string $uuid
 * @property int $film_id
 * @property int $category_id
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Film $film
 * @property \App\Model\Entity\Category $category
 */
class FilmCategory extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'film_id' => true,
        'category_id' => true,
        'modified' => true,
        'film' => true,
        'category' => true,
    ];
}
