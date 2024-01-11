<?php

namespace App\Dto;

use Cake\Utility\Inflector;
use JsonSerializable;
use SwaggerBake\Lib\Attribute\OpenApiSchema;
use SwaggerBake\Lib\Attribute\OpenApiSchemaProperty;

#[OpenApiSchema]
class Response implements JsonSerializable
{
    public function __construct(
        #[OpenApiSchemaProperty(name: 'last_name')]
        private string $lastName,
        #[OpenApiSchemaProperty(name: 'first_name')]
        private ?string $firstName
    ) {

    }

    /**
     * @inheritDoc
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $vars = [];
        foreach (get_object_vars($this) as $k => $v) {
            $vars[Inflector::underscore($k)] = $v;
        }

        return $vars;
    }
}
