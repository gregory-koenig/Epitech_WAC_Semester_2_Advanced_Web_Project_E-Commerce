<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Billing;
use AppBundle\Entity\Client;
use AppBundle\Entity\Delivery;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class CustomUserController extends Controller
{
    /**
     * @Route("/user/", name="user")
     */
    public function indexAction(Request $request)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        $detailsClient = $em
            ->getRepository('AppBundle:Client')
            ->findAll()
        ;

        $listDeliveries = $em
            ->getRepository('AppBundle:Delivery')
            ->findAll()
        ;

        $listBillings = $em
            ->getRepository('AppBundle:Billing')
            ->findAll()
        ;

        $user = $this->getUser();
        
        return $this->render('user/index.html.twig', [
            'listCategories' => $listCategories,
            'user'           => $user,
            'detailsClient'  => $detailsClient,
            'listDeliveries' => $listDeliveries,
            'listBillings'   => $listBillings
        ]);
    }

    /**
     * Creates a new delivery entity.
     *
     * @Route("delivery/new", name="delivery_new")
     * @Method({"GET", "POST"})
     */
    public function newDeliveryAction(Request $request)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        $delivery = new Delivery();
        $form     = $this->createForm('AppBundle\Form\DeliveryType',
            $delivery);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user   = $this->getUser();
            $tempId = $user->getId();

            $delivery->setUser($tempId);
            $em->persist($delivery);
            $em->flush();

            return $this->redirectToRoute('user');
        }

        return $this->render('delivery/new.html.twig', array(
            'listCategories' => $listCategories,
            'delivery'       => $delivery,
            'form'           => $form->createView()
        ));
    }

    /**
     * Creates a new billing entity.
     *
     * @Route("billing/new", name="billing_new")
     * @Method({"GET", "POST"})
     */
    public function newBillingAction(Request $request)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        $billing = new Billing();
        $form    = $this->createForm('AppBundle\Form\BillingType', $billing);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user   = $this->getUser();
            $tempId = $user->getId();

            $billing->setUser($tempId);
            $em->persist($billing);
            $em->flush();

            return $this->redirectToRoute('user');
        }

        return $this->render('billing/new.html.twig', array(
            'listCategories' => $listCategories,
            'billing'        => $billing,
            'form'           => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing client entity.
     *
     * @Route("user/{id}/edit", name="client_edit")
     * @Method({"GET", "POST"})
     * @ParamConverter("client", class="AppBundle:Client")
     */
    public function editClientAction(Request $request, client $client)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        $editForm = $this->createForm('AppBundle\Form\ClientType', $client);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this
                ->getDoctrine()
                ->getManager()
                ->flush()
            ;

            return $this->redirectToRoute('client_edit', array(
                'id' => $client->getId()
            ));
        }

        return $this->render('client/edit.html.twig', array(
            'listCategories' => $listCategories,
            'client'         => $client,
            'edit_form'      => $editForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing delivery entity.
     *
     * @Route("delivery/{id}/edit", name="delivery_edit")
     * @Method({"GET", "POST"})
     * @ParamConverter("delivery", class="AppBundle:Delivery")
     */
    public function editDeliveryAction(Request $request, Delivery $delivery)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        $editForm = $this->createForm('AppBundle\Form\DeliveryType', $delivery);
        
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this
                ->getDoctrine()
                ->getManager()
                ->flush()
            ;

            return $this->redirectToRoute('user');
        }

        return $this->render('delivery/edit.html.twig', array(
            'listCategories' => $listCategories,
            'delivery'       => $delivery,
            'edit_form'      => $editForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing billing entity.
     *
     * @Route("billing/{id}/edit", name="billing_edit")
     * @Method({"GET", "POST"})
     * @ParamConverter("billing", class="AppBundle:Billing")
     */
    public function editBillingAction(Request $request, Billing $billing)
    {
        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $listCategories = $em
            ->getRepository('AppBundle:Category')
            ->findAll()
        ;

        $editForm = $this->createForm('AppBundle\Form\BillingType', $billing);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this
                ->getDoctrine()
                ->getManager()
                ->flush()
            ;

            return $this->redirectToRoute('user');
        }

        return $this->render('billing/edit.html.twig', array(
            'listCategories' => $listCategories,
            'billing'        => $billing,
            'edit_form'      => $editForm->createView()
        ));
    }

    /**
     * Deletes a client entity.
     *
     * @Route("user/{id}/nuke", name="nuke_user")
     * @Method({"DELETE", "GET"})
     */
    public function NukeUserAction(Request $request)
    {
        $user = $this->getUser();
        $id   = $user->getId();

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $client = $em
            ->getRepository('AppBundle:Client')
            ->find($id)
        ;

        if (!$client) {
            throw $this->createNotFoundException("Impossible de trouver "
                . "l'utilisateur.");
        }

        $delivery = $em
            ->getRepository('AppBundle:Delivery')
            ->createQueryBuilder('d')
            ->where('d.user LIKE :user')
            ->setParameter('user', $id)
            ->getQuery()
            ->getResult()
        ;

        $billing = $em
            ->getRepository('AppBundle:Billing')
            ->createQueryBuilder('b')
            ->where('b.user LIKE :user')
            ->setParameter('user', $id)
            ->getQuery()
            ->getResult()
        ;

        $em->remove($client);

        if (isset($delivery['0'])) {
            $em->remove($delivery['0']);
        }

        if (isset($billing['0'])) {
            $em->remove($billing['0']);
        }

        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('catalog');
    }
}
