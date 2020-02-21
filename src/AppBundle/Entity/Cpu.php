<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cpu
 *
 * @ORM\Table(name="cpu")
 * @ORM\Entity
 */
class Cpu
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
     * @ORM\Column(name="core_number", type="string", length=255, nullable=false)
     */
    private $coreNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="string", length=255, nullable=false)
     */
    private $frequency;

    /**
     * @var string
     *
     * @ORM\Column(name="cache", type="string", length=255, nullable=false)
     */
    private $cache;

    /**
     * @var string
     *
     * @ORM\Column(name="architecture", type="string", length=255, nullable=false)
     */
    private $architecture;

    /**
     * @var string
     *
     * @ORM\Column(name="socket", type="string", length=255, nullable=false)
     */
    private $socket;

    /**
     * @var string
     *
     * @ORM\Column(name="thermal_dissipation", type="string", length=255, nullable=false)
     */
    private $thermalDissipation;



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
     * Set coreNumber.
     *
     * @param string $coreNumber
     *
     * @return Cpu
     */
    public function setCoreNumber($coreNumber)
    {
        $this->coreNumber = $coreNumber;

        return $this;
    }

    /**
     * Get coreNumber.
     *
     * @return string
     */
    public function getCoreNumber()
    {
        return $this->coreNumber;
    }

    /**
     * Set frequency.
     *
     * @param string $frequency
     *
     * @return Cpu
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
     * Set cache.
     *
     * @param string $cache
     *
     * @return Cpu
     */
    public function setCache($cache)
    {
        $this->cache = $cpache;

        return $this;
    }

    /**
     * Get cache.
     *
     * @return string
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * Set architecture.
     *
     * @param string $architecture
     *
     * @return Cpu
     */
    public function setArchitecture($architecture)
    {
        $this->architecture = $architecture;

        return $this;
    }

    /**
     * Get architecture.
     *
     * @return string
     */
    public function getArchitecture()
    {
        return $this->architecture;
    }

    /**
     * Set socket.
     *
     * @param string $socket
     *
     * @return Cpu
     */
    public function setSocket($socket)
    {
        $this->socket = $socket;

        return $this;
    }

    /**
     * Get socket.
     *
     * @return string
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * Set thermalDissipation.
     *
     * @param string $thermalDissipation
     *
     * @return Cpu
     */
    public function setThermalDissipation($thermalDissipation)
    {
        $this->thermalDissipation = $thermalDissipation;

        return $this;
    }

    /**
     * Get thermalDissipation.
     *
     * @return string
     */
    public function getThermalDissipation()
    {
        return $this->thermalDissipation;
    }
}
