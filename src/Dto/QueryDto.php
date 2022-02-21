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
        private ?string $firstName = null,
    ) {
    }

    /**
     * @param ServerRequest $request
     * @return $this
     */
    public static function createFromRequest(ServerRequest $request)
    {
        return (new self(
            $request->getQuery('last_name'),
            $request->getQuery('first_name'),
        ));
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return QueryDto
     */
    public function setFirstName(string $firstName): QueryDto
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return QueryDto
     */
    public function setLastName(string $lastName): QueryDto
    {
        $this->lastName = $lastName;
        return $this;
    }
}
