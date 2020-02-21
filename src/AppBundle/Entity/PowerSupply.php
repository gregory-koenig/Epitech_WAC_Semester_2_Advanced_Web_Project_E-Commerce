<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PowerSupply
 *
 * @ORM\Table(name="power_supply")
 * @ORM\Entity
 */
class PowerSupply
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
     * @ORM\Column(name="power", type="string", length=255, nullable=false)
     */
    private $power;

    /**
     * @var string
     *
     * @ORM\Column(name="modularity", type="string", length=255, nullable=false)
     */
    private $modularity;

    /**
     * @var string
     *
     * @ORM\Column(name="certification", type="string", length=255, nullable=false)
     */
    private $certification;



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
     * Set power.
     *
     * @param string $power
     *
     * @return PowerSupply
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power.
     *
     * @return string
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set modularity.
     *
     * @param string $modularity
     *
     * @return PowerSupply
     */
    public function setModularity($modularity)
    {
        $this->modularity = $modularity;

        return $this;
    }

    /**
     * Get modularity.
     *
     * @return string
     */
    public function getModularity()
    {
        return $this->modularity;
    }

    /**
     * Set certification.
     *
     * @param string $certification
     *
     * @return PowerSupply
     */
    public function setCertification($certification)
    {
        $this->certification = $certification;

        return $this;
    }

    /**
     * Get certification.
     *
     * @return string
     */
    public function getCertification()
    {
        return $this->certification;
    }
}
