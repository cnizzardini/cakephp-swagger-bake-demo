<?php

namespace App\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use SwaggerBake\Lib\Annotation as Swag;

class QueryData extends DataTransferObject
{
    /** @var string */
    private $firstName;

    /**
     * Last name required
     * @var string
     * @required
     */
    private $lastName;

    /**
     * @Swag\SwagDtoQuery(name="title", type="string", description="testing")
     * @var string
     */
    private $title;

    /**
     * @Swag\SwagDtoQuery(name="age", type="integer", format="int32" description="testing")
     * @var integer
     */
    private $age;

    /**
     * @Swag\SwagDtoQuery(name="date", type="string", format="date", description="testing")
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
     * @return QueryData
     */
    public function setFirstName(string $firstName): QueryData
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
     * @return QueryData
     */
    public function setLastName(string $lastName): QueryData
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
     * @return QueryData
     */
    public function setTitle($title): QueryData
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
     * @return QueryData
     */
    public function setAge($age): QueryData
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
     * @return QueryData
     */
    public function setDate($date): QueryData
    {
        $this->date = $date;
        return $this;
    }
}
