<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use SwaggerBake\Lib\Annotation\SwagEntityAttribute;

/**
 * Actor Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\FrozenTime $modified
 * @property \App\Model\Entity\FilmActor[] $film_actors
 */
class Actor extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'film_actors' => true,
    ];
}
