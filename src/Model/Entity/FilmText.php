<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FilmText Entity
 *
 * @property string $uuid
 * @property int $film_id
 * @property string $title
 * @property string|null $description
 *
 * @property \App\Model\Entity\Film $film
 */
class FilmText extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'film_id' => true,
        'title' => true,
        'description' => true,
        'film' => true,
    ];
}
