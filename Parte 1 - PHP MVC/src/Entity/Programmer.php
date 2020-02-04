<?php

namespace Zebra\CadastroProgramadores\Entity;

/**
 * @Entity
 * @Table(name="programmers")
 */
class Programmer
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private ?int $id;

    /**
     * @Column(type="string", nullable=false)
     */
    private string $name;

    /**
     * @Column(type="integer", nullable=false)
     */
    private int $age;

    /**
     * @Column(type="string", nullable=false)
     */
    private string $city;

    /**
     * @Column(type="string", nullable=false)
     */
    private string $email;

    /**
     * @Column(type="float", nullable=false)
     */
    private float $yearsOfExperience;

    /**
     * @ManyToOne(targetEntity="Role", inversedBy="programmers", fetch="EAGER")
     * @JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $role;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Programmer
     */
    public function setId(int $id): Programmer
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Programmer
     */
    public function setName(string $name): Programmer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return Programmer
     */
    public function setAge(int $age): Programmer
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Programmer
     */
    public function setCity(string $city): Programmer
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Programmer
     */
    public function setEmail(string $email): Programmer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @param Role $role
     * @return Programmer
     */
    public function setRole(Role $role): Programmer
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return float
     */
    public function getYearsOfExperience(): float
    {
        return $this->yearsOfExperience;
    }

    /**
     * @param float $experienceYears
     * @return Programmer
     */
    public function setYearsOfExperience(float $experienceYears): Programmer
    {
        $this->yearsOfExperience = $experienceYears;
        return $this;
    }

}