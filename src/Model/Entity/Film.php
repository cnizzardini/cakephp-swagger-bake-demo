<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Film Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $release_year
 * @property int $language_id
 * @property int $rental_duration
 * @property string $rental_rate
 * @property int|null $length
 * @property string $replacement_cost
 * @property string|null $rating
 * @property string|null $special_features
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\OriginalLanguage $original_language
 * @property \App\Model\Entity\FilmActor[] $film_actors
 * @property \App\Model\Entity\FilmCategory[] $film_categories
 * @property \App\Model\Entity\FilmText[] $film_texts
 * @property \App\Model\Entity\Inventory[] $inventories
 */
class Film extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'title' => true,
        'description' => true,
        'release_year' => true,
        'language_id' => true,
        'rental_duration' => true,
        'rental_rate' => true,
        'length' => true,
        'replacement_cost' => true,
        'rating' => true,
        'special_features' => true,
        'modified' => true,
        'language' => true,
        'original_language' => true,
        'film_actors' => true,
        'film_categories' => true,
        'film_texts' => true,
        'inventories' => true,
    ];
}
