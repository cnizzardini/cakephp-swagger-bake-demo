<?php

namespace App\Dto;

use Cake\Http\ServerRequest;
use SwaggerBake\Lib\Attribute\OpenApiQueryParam;

class QueryDto
{
    public function __construct(
        #[OpenApiQueryParam(name: 'last_name', description: "Last name required", isRequired: true)]
        private string $lastName,
        #[OpenApiQueryParam(name: 'first_name')]
        private ?string $firstName
    ) {

    }

    /**
     * @param ServerRequest $request
     * @return QueryDto
     */
    public static function createFromRequest(ServerRequest $request): QueryDto
    {
        return (new self(
            $request->getQuery('last_name') ?? '',
            $request->getQuery('first_name') ?? '',
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
