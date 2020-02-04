<?php


namespace Zebra\CadastroProgramadores\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 * @Table(name="roles")
 */
class Role
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
    private string $role;

    /**
     * @OneToMany(targetEntity="programmer", mappedBy="role")
     */
    private $programmers;

    public function __construct()
    {
        $this->programmers = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Role
     */
    public function setId(int $id): Role
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Role
     */
    public function setRole(string $role): Role
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getProgrammers(): Collection
    {
        return $this->programmers;
    }
}