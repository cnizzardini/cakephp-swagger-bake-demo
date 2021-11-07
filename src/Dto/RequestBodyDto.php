<?php

namespace App\Dto;

use SwaggerBake\Lib\Attribute\OpenApiDtoRequestBody;

class RequestBodyDto
{
    #[OpenApiDtoRequestBody(name: 'last_name', description: "Last name required", isRequired: true)]
    private string $lastName;

    #[OpenApiDtoRequestBody(name: 'first_name')]
    private ?string $firstName;

    #[OpenApiDtoRequestBody(name: "title")]
    private $title;

    #[OpenApiDtoRequestBody(name: "age", type: "integer", format: "int32")]
    private ?int $age;

    #[OpenApiDtoRequestBody(name: "date", format: "date")]
    private $date;

    /**
     * @return string
     */
    public function getFirstName(): string
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
     * @return string
     */
    public function getLastName(): string
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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return QueryDto
     */
    public function setTitle($title): QueryDto
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return QueryDto
     */
    public function setAge($age): QueryDto
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return QueryDto
     */
    public function setDate($date): QueryDto
    {
        $this->date = $date;
        return $this;
    }
}
