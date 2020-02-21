<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ram
 *
 * @ORM\Table(name="ram")
 * @ORM\Entity
 */
class Ram
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
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="capacity", type="string", length=255, nullable=false)
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="string", length=255, nullable=false)
     */
    private $frequency;

    /**
     * @var string
     *
     * @ORM\Column(name="timings", type="string", length=255, nullable=false)
     */
    private $timings;

    /**
     * @var string
     *
     * @ORM\Column(name="tension", type="string", length=255, nullable=false)
     */
    private $tension;



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
     * Set type.
     *
     * @param string $type
     *
     * @return Ram
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set capacity.
     *
     * @param string $capacity
     *
     * @return Ram
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity.
     *
     * @return string
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set frequency.
     *
     * @param string $frequency
     *
     * @return Ram
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
     * Set timings.
     *
     * @param string $timings
     *
     * @return Ram
     */
    public function setTimings($timings)
    {
        $this->timings = $timings;

        return $this;
    }

    /**
     * Get timings.
     *
     * @return string
     */
    public function getTimings()
    {
        return $this->timings;
    }

    /**
     * Set tension.
     *
     * @param string $tension
     *
     * @return Ram
     */
    public function setTension($tension)
    {
        $this->tension = $tension;

        return $this;
    }

    /**
     * Get tension.
     *
     * @return string
     */
    public function getTension()
    {
        return $this->tension;
    }
}
