<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gpu
 *
 * @ORM\Table(name="gpu")
 * @ORM\Entity
 */
class Gpu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="string", length=255, nullable=false)
     */
    private $frequency;

    /**
     * @var string
     *
     * @ORM\Column(name="interface", type="string", length=255, nullable=false)
     */
    private $interface;

    /**
     * @var string
     *
     * @ORM\Column(name="memory", type="string", length=255, nullable=false)
     */
    private $memory;

    /**
     * @var string
     *
     * @ORM\Column(name="memory_frequency", type="string", length=255, nullable=false)
     */
    private $memoryFrequency;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="string", length=255, nullable=false)
     */
    private $details;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set model.
     *
     * @param string $model
     *
     * @return Gpu
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set frequency.
     *
     * @param string $frequency
     *
     * @return Gpu
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency.
     *
     * @return string
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set interface.
     *
     * @param string $interface
     *
     * @return Gpu
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;

        return $this;
    }

    /**
     * Get interface.
     *
     * @return string
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * Set memory.
     *
     * @param string $memory
     *
     * @return Gpu
     */
    public function setMemory($memory)
    {
        $this->memory = $memory;

        return $this;
    }

    /**
     * Get memory.
     *
     * @return string
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * Set memoryFrequency.
     *
     * @param string $memoryFrequency
     *
     * @return Gpu
     */
    public function setMemoryFrequency($memoryFrequency)
    {
        $this->memoryFrequency = $memoryFrequency;

        return $this;
    }

    /**
     * Get memoryFrequency.
     *
     * @return string
     */
    public function getMemoryFrequency()
    {
        return $this->memoryFrequency;
    }

    /**
     * Set details.
     *
     * @param string $details
     *
     * @return Gpu
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details.
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }
}
