<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motherboard
 *
 * @ORM\Table(name="motherboard")
 * @ORM\Entity
 */
class Motherboard
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
     * @ORM\Column(name="socket", type="string", length=255, nullable=false)
     */
    private $socket;

    /**
     * @var string
     *
     * @ORM\Column(name="chipset", type="string", length=255, nullable=false)
     */
    private $chipset;

    /**
     * @var string
     *
     * @ORM\Column(name="ports", type="string", length=255, nullable=false)
     */
    private $ports;

    /**
     * @var string
     *
     * @ORM\Column(name="max_frequency", type="string", length=255, nullable=false)
     */
    private $maxFrequency;

    /**
     * @var string
     *
     * @ORM\Column(name="sata_controller", type="string", length=255, nullable=false)
     */
    private $sataController;



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
     * Set socket.
     *
     * @param string $socket
     *
     * @return Motherboard
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
     * Set chipset.
     *
     * @param string $chipset
     *
     * @return Motherboard
     */
    public function setChipset($chipset)
    {
        $this->chipset = $chipset;

        return $this;
    }

    /**
     * Get chipset.
     *
     * @return string
     */
    public function getChipset()
    {
        return $this->chipset;
    }

    /**
     * Set ports.
     *
     * @param string $ports
     *
     * @return Motherboard
     */
    public function setPorts($ports)
    {
        $this->ports = $ports;

        return $this;
    }

    /**
     * Get ports.
     *
     * @return string
     */
    public function getPorts()
    {
        return $this->ports;
    }

    /**
     * Set maxFrequency.
     *
     * @param string $maxFrequency
     *
     * @return Motherboard
     */
    public function setMaxFrequency($maxFrequency)
    {
        $this->maxFrequency = $maxFrequency;

        return $this;
    }

    /**
     * Get maxFrequency.
     *
     * @return string
     */
    public function getMaxFrequency()
    {
        return $this->maxFrequency;
    }

    /**
     * Set sataController.
     *
     * @param string $sataController
     *
     * @return Motherboard
     */
    public function setSataController($sataController)
    {
        $this->sataController = $sataController;

        return $this;
    }

    /**
     * Get sataController.
     *
     * @return string
     */
    public function getSataController()
    {
        return $this->sataController;
    }
}
