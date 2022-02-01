<?php

namespace App\Dto;

use JsonSerializable;
use SwaggerBake\Lib\Attribute\OpenApiSchemaProperty;
use SwaggerBake\Lib\OpenApi\CustomSchemaInterface;
use SwaggerBake\Lib\OpenApi\Schema;
use SwaggerBake\Lib\OpenApi\SchemaProperty;

class CustomResponse implements CustomSchemaInterface, JsonSerializable
{
    /**
     * @param string $name An example name
     * @param int $age An example age
     */
    public function __construct(
        #[OpenApiSchemaProperty(name: 'name', example: 'Jane')]
        private string $name,
        private int $age
    ) {
    }

    /**
     * @inheritDoc
     */
    public static function getOpenApiSchema(): Schema
    {
        return (new Schema())
            ->setTitle('Custom Response')
            ->setProperties([
                new SchemaProperty('age', 'integer', null, null, 32)
            ]);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
