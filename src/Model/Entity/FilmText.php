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
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'film_id' => true,
        'title' => true,
        'description' => true,
        'film' => true,
    ];
}
