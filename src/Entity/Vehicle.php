<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleRepository")
 */
class Vehicle
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $registration;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $color;

    /**
     * @var CustomEquipment[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\CustomEquipment", mappedBy="vehicle", orphanRemoval=true)
     */
    private $customEquipments;

    /**
     * Vehicle constructor.
     */
    public function __construct()
    {
        $this->customEquipments = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    /**
     * @param string $registration
     *
     * @return $this
     */
    public function setRegistration(string $registration): self
    {
        $this->registration = $registration;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     *
     * @return $this
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string $model
     *
     * @return $this
     */
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string $color
     *
     * @return $this
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection|CustomEquipment[]
     */
    public function getCustomEquipments(): Collection
    {
        return $this->customEquipments;
    }

    /**
     * @param CustomEquipment $customEquipment
     *
     * @return $this
     */
    public function addCustomEquipment(CustomEquipment $customEquipment): self
    {
        if (!$this->customEquipments->contains($customEquipment)) {
            $this->customEquipments[] = $customEquipment;
            $customEquipment->setVehicle($this);
        }

        return $this;
    }

    /**
     * @param CustomEquipment $customEquipment
     *
     * @return $this
     */
    public function removeCustomEquipment(CustomEquipment $customEquipment): self
    {
        if ($this->customEquipments->contains($customEquipment)) {
            $this->customEquipments->removeElement($customEquipment);
            // set the owning side to null (unless already changed)
            if ($customEquipment->getVehicle() === $this) {
                $customEquipment->setVehicle(null);
            }
        }

        return $this;
    }

    /**
     * @param Equipment $equipment
     *
     * @return $this
     */
    public function addEquipment(Equipment $equipment): self
    {
        $customEquipment = new CustomEquipment();
        $customEquipment->setEquipment($equipment);
        $this->addCustomEquipment($customEquipment);

        return $this;
    }
}
