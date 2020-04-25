<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FilmActor Entity
 *
 * @property string $uuid
 * @property int $actor_id
 * @property int $film_id
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Actor $actor
 * @property \App\Model\Entity\Film $film
 */
class FilmActor extends Entity
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
        'actor_id' => true,
        'film_id' => true,
        'modified' => true,
        'actor' => true,
        'film' => true,
    ];
}
