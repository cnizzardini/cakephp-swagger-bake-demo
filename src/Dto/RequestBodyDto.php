<?php

namespace App\Dto;

use SwaggerBake\Lib\Annotation as Swag;

class RequestBodyDto
{
    /**
     * @Swag\SwagRequestBody(name="Last Name", type="string", description="Last name required", required=true)
     * @var string
     */
    private $lastName;

    /**
     * @Swag\SwagRequestBody(name="First Name", type="string", description="first name required")
     * @var string
     */
    private $firstName;

    /**
     * @Swag\SwagRequestBody(name="title", type="string", description="testing")
     * @var string
     */
    private $title;

    /**
     * @Swag\SwagRequestBody(name="age", type="integer", format="int32" description="testing")
     * @var integer
     */
    private $age;

    /**
     * @Swag\SwagRequestBody(name="date", type="string", format="date", description="testing")
     * @var string
     */
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
