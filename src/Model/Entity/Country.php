<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use SwaggerBake\Lib\Attribute\OpenApiSchema;

/**
 * Country Entity
 *
 * @property int $id
 * @property string $name
 * @property \App\Model\Entity\City[] $cities
 */
#[OpenApiSchema(visibility: OpenApiSchema::VISIBLE_HIDDEN)]
class Country extends Entity
{
    /**
     * @inheritDoc
     */
    protected array $_accessible = [
        'name' => true,
        'cities' => true,
    ];
}
