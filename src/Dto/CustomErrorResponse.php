<?php

namespace App\Dto;

use JsonSerializable;
use SwaggerBake\Lib\Attribute\OpenApiSchemaProperty;
use SwaggerBake\Lib\OpenApi\CustomSchemaInterface;
use SwaggerBake\Lib\OpenApi\Schema;
use SwaggerBake\Lib\OpenApi\SchemaProperty;

#[OpenApiSchemaProperty(name: 'title', example: 'Error Title')]
#[OpenApiSchemaProperty(name: 'message', example: 'A message about the error')]
class CustomErrorResponse
{

}
