<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{
    /**
     * @Route("/cart", name="cart")
     */
    public function indexAction()
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart']                      = array();
            $_SESSION['cart']['productId']         = array();
            $_SESSION['cart']['productName']       = array();
            $_SESSION['cart']['productQty']        = array();
            $_SESSION['cart']['productUnitPrice']  = array();
            $_SESSION['cart']['productTotalPrice'] = array();
            $_SESSION['cart']['lock']              = false;
        }

        $articlesId         = $_SESSION['cart']['productId'];
        $articlesName       = $_SESSION['cart']['productName'];
        $articlesQty        = $_SESSION['cart']['productQty'];
        $articlesUnitPrice  = $_SESSION['cart']['productUnitPrice'];
        $articlesTotalPrice = $_SESSION['cart']['productTotalPrice'];
        $cartTotal          = null;

        foreach ($articlesUnitPrice as $key => $articleUnitPrice) {
            $articlesUnitPrice[$key] = number_format($articleUnitPrice, '2',
                ',', ' ') . ' €';
        }

        foreach ($articlesTotalPrice as $key => $articleTotalPrice) {
            $cartTotal += $articleTotalPrice;

            $articlesTotalPrice[$key] = number_format($articleTotalPrice, '2',
                ',', ' ') . ' €';
        }

        $cartTotal = number_format($cartTotal, '2', ',', ' ') . ' €';

        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);

        return $this->render('cart/index.html.twig', [
            'listCategories'     => $listCategories,
            'articlesId'         => $articlesId,
            'articlesName'       => $articlesName,
            'articlesQty'        => $articlesQty,
            'articlesUnitPrice'  => $articlesUnitPrice,
            'articlesTotalPrice' => $articlesTotalPrice,
            'cartTotal'          => $cartTotal,
            'token'              => $token
        ]);
    }

    /**
     * @Route("/product/{id}/cart-add", name="cart_add")
     */
    public function addArticle(Product $product)
    {
        $productId        = $product->getId();
        $productName      = $product->getName();
        $productQty       = 1;
        $productUnitPrice = $product->getPrice();
        $productUnitPrice = floatval($productUnitPrice);

        if (isset($_SESSION['cart'])) {
            $productPosition = array_search($productName,
                $_SESSION['cart']['productName']);

            if ($productPosition !== false) {
                $_SESSION['cart']['productQty'][$productPosition]
                    += $productQty;

                $_SESSION['cart']['productTotalPrice'][$productPosition]
                    *= $_SESSION['cart']['productQty'][$productPosition];
            } else {
                array_push($_SESSION['cart']['productId'], $productId);
                array_push($_SESSION['cart']['productName'],
                    $productName);
                array_push($_SESSION['cart']['productQty'], $productQty);
                array_push($_SESSION['cart']['productUnitPrice'],
                    $productUnitPrice);
                array_push($_SESSION['cart']['productTotalPrice'],
                    $productUnitPrice);
            }
        } else {
            echo "Un problème est survenu. Veuillez contacter l'administrateur"
                . " du site.";
        }

        return $this->redirectToRoute('catalog');
    }

    /**
     * @Route("payment", name="payment")
     */
    public function showPayment()
    {
        if (!isset($_POST['input_token'])) {
            return $this->redirectToRoute('catalog');
        } else {
            $em = $this
                ->getDoctrine()
                ->getManager()
            ;

            $listCategories = $em
                ->getRepository('AppBundle:Category')
                ->findAll()
            ;

            $token = $_POST['input_token'];

            return $this->render('cart/payment.html.twig', [
                'listCategories' => $listCategories,
                'token'          => $token
            ]);
        }
    }

    /**
     * @Route("cart_delete", name="cart_delete")
     */
    public function deleteCart()
    {
        if (!isset($_POST['input_token'])) {
            return $this->redirectToRoute('catalog');
        } else {
            $em = $this
                ->getDoctrine()
                ->getManager()
            ;

            $listCategories = $em
                ->getRepository('AppBundle:Category')
                ->findAll()
            ;

            unset($_SESSION['cart']);

            return $this->render('catalog/index.html.twig', [
                'listCategories' => $listCategories
            ]);
        }
    }

    /**
     * @Route("cart_confirmation", name="cart_confirmation")
     */
    public function confirmCart()
    {
        if (!isset($_POST['input_token'])) {
            return $this->redirectToRoute('catalog');
        } else {
            $em = $this
                ->getDoctrine()
                ->getManager()
            ;

            $listCategories = $em
                ->getRepository('AppBundle:Category')
                ->findAll()
            ;

            unset($_SESSION['cart']);

            return $this->render('cart/confirmation.html.twig', [
                'listCategories' => $listCategories
            ]);
        }
    }
}