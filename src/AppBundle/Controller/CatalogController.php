<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class CatalogController extends Controller
{
    /**
     * @Route("/", name="catalog")
     */
    public function indexAction(Request $request)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart']                      = array();
            $_SESSION['cart']['productId']         = array();
            $_SESSION['cart']['productName']       = array();
            $_SESSION['cart']['productQty']        = array();
            $_SESSION['cart']['productUnitPrice']  = array();
            $_SESSION['cart']['productTotalPrice'] = array();
            $_SESSION['cart']['lock']              = false;
        }

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        $users = $em
            ->getRepository('AppBundle:User')
            ->findAll()
        ;
        return $this->render('catalog/index.html.twig', [
            'listCategories' => $listCategories
        ]);
    }

    /**
     * @Route("category/{id}", name="category")
     */
    public function showAction($id)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        $listProducts = $em
            ->getRepository('AppBundle:Product')
            ->createQueryBuilder('p')
            ->where('p.category LIKE :category_id')
            ->setParameter('category_id', $id)
            ->getQuery()
            ->getResult()
        ;

        if (null == $listProducts) {
            throw new NotFoundHttpException("La catégorie d'id \"$id\" "
                . "n'existe pas.");
        }

        $nbProducts = count($listProducts);

        return $this->render('catalog/category.html.twig', [
            'listCategories' => $listCategories,
            'listProducts'   => $listProducts,
            'nbProducts'     => $nbProducts
        ]);
    }

    /**
     * @Route("product/{id}", name="product")
     */
    public function showProduct($id)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository("AppBundle:Category")
            ->findAll()
        ;

        $detailsProduct = $em
            ->getRepository('AppBundle:Product')
            ->findBy(array('id' => $id))
        ;

        if (null == $detailsProduct) {
            throw new NotFoundHttpException("Le produit d'id \"$id\" n'existe "
                . "pas.");
        }

        $productCategory = $em
            ->getRepository('AppBundle:Product')
            ->createQueryBuilder('p')
            ->select('p.category')
            ->where('p.id LIKE :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;

        $categoryName = $em
            ->getRepository("AppBundle:Category")
            ->createQueryBuilder('c')
            ->select('c.name')
            ->where('c.id LIKE :id')
            ->setParameter('id', $productCategory)
            ->getQuery()
            ->getResult()
        ;

        $detailsCasing = $em
            ->getRepository('AppBundle:Casing')
            ->findBy(array('id' => $id))
        ;

        $detailsCpu = $em
            ->getRepository('AppBundle:Cpu')
            ->findBy(array('id' => $id))
        ;

        $detailsGpu = $em
            ->getRepository('AppBundle:Gpu')
            ->findBy(array('id' => $id))
        ;

        $detailsMotherboard = $em
            ->getRepository('AppBundle:Motherboard')
            ->findBy(array('id' => $id))
        ;

        $detailsPower = $em
            ->getRepository('AppBundle:PowerSupply')
            ->findBy(array('id' => $id))
        ;

        $detailsRam = $em
            ->getRepository('AppBundle:Ram')
            ->findBy(array('id' => $id))
        ;

        return $this->render('catalog/product.html.twig', [
            'listCategories'     => $listCategories,
            'categoryName'       => $categoryName,
            'detailsProduct'     => $detailsProduct,
            'detailsCasing'      => $detailsCasing,
            'detailsCpu'         => $detailsCpu,
            'detailsGpu'         => $detailsGpu,
            'detailsMotherboard' => $detailsMotherboard,
            'detailsPower'       => $detailsPower,
            'detailsRam'         => $detailsRam
        ]);
    }

    /**
     * @Route("/search/", name="search")
     */
    public function searchAction(Request $request)
    {
        $form = $this
            ->createFormBuilder()
            ->setMethod('GET')
            ->add('categories', EntityType::class, array(
                'class'        => 'AppBundle:Category',
                'choice_label' => 'name',
                'required'     => false,
                'placeholder'  => 'Toutes les catégories'
            ))
            ->add('search', SearchType::class)
            ->getForm()
        ;

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository("AppBundle:Category")
            ->findAll()
        ;

        if ($request->isMethod('GET')
            && $form->handleRequest($request)->isValid()) {
            $categoryForm = $form
                ->get('categories')
                ->getData()
            ;

            $search = $form
                ->get('search')
                ->getData()
            ;

            $listProducts = $em->getRepository('AppBundle:Product');

            if ($categoryForm != null) {
                $qb = $listProducts
                    ->createQueryBuilder('p')
                    ->where('p.name LIKE :name OR p.description LIKE '
                        . ':description')
                    ->setParameters(array(
                        'name'        => "%$search%",
                        'description' => "%$search%"
                    ))
                    ->andWhere('p.category = :category')
                    ->setParameter('category', $categoryForm->getId())
                ;
            } else {
                $qb = $listProducts
                    ->createQueryBuilder('p')
                    ->where('p.name LIKE :name OR p.description LIKE '
                        . ':description')
                    ->setParameters(array(
                        'name'        => "%$search%",
                        'description' => "%$search%"
                    ))
                ;
            }

            $results = $qb
                ->getQuery()
                ->getResult()
            ;

            $nbResults = count($results);

            return $this->render('catalog/search.html.twig', array(
                'listCategories' => $listCategories,
                'results'        => $results,
                'nbResults'      => $nbResults,
                'search'         => $search
            ));
        }

        return $this->render('catalog/searchForm.html.twig', array(
            'listCategories' => $listCategories,
            'form'           => $form->createView()
        ));
    }

    /**
     * @Route("/rgpd/", name="rgpd")
     */
    public function rgpdAction(Request $request)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        return $this->render('catalog/rgpd.html.twig', [
            'listCategories' => $listCategories
        ]);
    }
}
