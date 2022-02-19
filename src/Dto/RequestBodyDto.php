<?php

namespace App\Dto;

use Cake\Http\ServerRequest;
use SwaggerBake\Lib\Attribute\OpenApiSchemaProperty;
use SwaggerBake\Lib\Attribute\OpenApiSchema;

#[OpenApiSchema]
class RequestBodyDto
{
    public function __construct(
        #[OpenApiSchemaProperty(name: 'last_name', description: "Last name required", isRequired: true)]
        private string $lastName,
        #[OpenApiSchemaProperty(name: 'first_name')]
        private ?string $firstName
    ) {

    }

    /**
     * @param ServerRequest $request
     * @return RequestBodyDto
     */
    public static function createFromRequest(ServerRequest $request): RequestBodyDto
    {
        return (new self(
            $request->getQuery('last_name'),
            $request->getQuery('first_name'),
        ));
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}
