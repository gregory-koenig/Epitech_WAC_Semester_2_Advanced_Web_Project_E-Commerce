<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseProduct
 *
 * @ORM\Table(name="purchase_product")
 * @ORM\Entity
 */
class PurchaseProduct
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
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $product;

    /**
     * @var int
     *
     * @ORM\Column(name="products_number", type="integer", nullable=false)
     */
    private $productsNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="total_price", type="integer", nullable=false)
     */
    private $totalPrice;



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
     * Set product.
     *
     * @param int $product
     *
     * @return PurchaseProduct
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product.
     *
     * @return int
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set productsNumber.
     *
     * @param int $productsNumber
     *
     * @return PurchaseProduct
     */
    public function setProductsNumber($productsNumber)
    {
        $this->productsNumber = $productsNumber;

        return $this;
    }

    /**
     * Get productsNumber.
     *
     * @return int
     */
    public function getProductsNumber()
    {
        return $this->productsNumber;
    }

    /**
     * Set totalPrice.
     *
     * @param int $totalPrice
     *
     * @return PurchaseProduct
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice.
     *
     * @return int
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
}
