<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This entity holds the custom values of a vehicle equipment
 *
 * @ORM\Entity(repositoryClass="App\Repository\CustomEquipmentRepository")
 */
class CustomEquipment
{
    /**
     * @var int
     *
     */
    private $id;

    /**
     * @var Vehicle
     *
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicle", inversedBy="customEquipments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicle;

    /**
     * @var Equipment
     *
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipment;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longName;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Vehicle|null
     */
    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    /**
     * @param Vehicle|null $vehicle
     *
     * @return $this
     */
    public function setVehicle(?Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * @return Equipment|null
     */
    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    /**
     * @param Equipment|null $equipment
     *
     * @return $this
     */
    public function setEquipment(?Equipment $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Will return default equipment long name if no custom name is set
     *
     * @return string|null
     */
    public function getLongName(): ?string
    {
        return is_null($this->longName) ? $this->equipment->getLongName() : $this->longName;
    }

    /**
     * Sets a custom long name
     *
     * @param string|null $longName
     *
     * @return $this
     */
    public function setLongName(?string $longName): self
    {
        $this->longName = $longName;

        return $this;
    }

    /**
     * Will return default equipment weight if no custom weight is set
     *
     * @return int|null
     */
    public function getWeight(): ?int
    {
        return is_null($this->weight) ? $this->equipment->getWeight() : $this->weight;
    }

    /**
     * Sets a custom weight
     *
     * @param int|null $weight
     *
     * @return $this
     */
    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}
