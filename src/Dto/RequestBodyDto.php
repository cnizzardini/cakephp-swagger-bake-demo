<?php

namespace App\Dto;

use Cake\Http\ServerRequest;
use SwaggerBake\Lib\Attribute\OpenApiDtoRequestBody;
use SwaggerBake\Lib\Attribute\OpenApiSchema;

#[OpenApiSchema]
class RequestBodyDto
{
    public function __construct(
        #[OpenApiDtoRequestBody(name: 'last_name', description: "Last name required", isRequired: true)]
        private string $lastName,
        #[OpenApiDtoRequestBody(name: 'first_name')]
        private ?string $firstName
    ) {

    }

    public static function createFromRequest(ServerRequest $request)
    {
        return (new self(
            $request->getData('last_name'),
            $request->getData('first_name'),
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
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
}
