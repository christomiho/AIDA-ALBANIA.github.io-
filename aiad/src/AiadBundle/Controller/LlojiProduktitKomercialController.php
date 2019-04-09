<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\LlojiProduktitKomercial;
use AiadBundle\Form\LlojiProduktitKomercialType;

/**
 * LlojiProduktitKomercial controller.
 *
 * @Route("/llojiproduktitkomercial")
 */
class LlojiProduktitKomercialController extends Controller
{
    /**
     * Lists all LlojiProduktitKomercial entities.
     *
     * @Route("/", name="llojiproduktitkomercial_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $llojiProduktitKomercials = $em->getRepository('AiadBundle:LlojiProduktitKomercial')->findAll();

        return $this->render('llojiproduktitkomercial/index.html.twig', array(
            'llojiProduktitKomercials' => $llojiProduktitKomercials,
        ));
    }

    /**
     * Creates a new LlojiProduktitKomercial entity.
     *
     * @Route("/new", name="llojiproduktitkomercial_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $llojiProduktitKomercial = new LlojiProduktitKomercial();
        $form = $this->createForm('AiadBundle\Form\LlojiProduktitKomercialType', $llojiProduktitKomercial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($llojiProduktitKomercial);
            $em->flush();

            return $this->redirectToRoute('llojiproduktitkomercial_show', array('id' => $llojiProduktitKomercial->getId()));
        }

        return $this->render('llojiproduktitkomercial/new.html.twig', array(
            'llojiProduktitKomercial' => $llojiProduktitKomercial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LlojiProduktitKomercial entity.
     *
     * @Route("/{id}", name="llojiproduktitkomercial_show")
     * @Method("GET")
     */
    public function showAction(LlojiProduktitKomercial $llojiProduktitKomercial)
    {
        $deleteForm = $this->createDeleteForm($llojiProduktitKomercial);

        return $this->render('llojiproduktitkomercial/show.html.twig', array(
            'llojiProduktitKomercial' => $llojiProduktitKomercial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LlojiProduktitKomercial entity.
     *
     * @Route("/{id}/edit", name="llojiproduktitkomercial_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LlojiProduktitKomercial $llojiProduktitKomercial)
    {
        $deleteForm = $this->createDeleteForm($llojiProduktitKomercial);
        $editForm = $this->createForm('AiadBundle\Form\LlojiProduktitKomercialType', $llojiProduktitKomercial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($llojiProduktitKomercial);
            $em->flush();

            return $this->redirectToRoute('llojiproduktitkomercial_edit', array('id' => $llojiProduktitKomercial->getId()));
        }

        return $this->render('llojiproduktitkomercial/edit.html.twig', array(
            'llojiProduktitKomercial' => $llojiProduktitKomercial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a LlojiProduktitKomercial entity.
     *
     * @Route("/{id}", name="llojiproduktitkomercial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LlojiProduktitKomercial $llojiProduktitKomercial)
    {
        $form = $this->createDeleteForm($llojiProduktitKomercial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($llojiProduktitKomercial);
            $em->flush();
        }

        return $this->redirectToRoute('llojiproduktitkomercial_index');
    }

    /**
     * Creates a form to delete a LlojiProduktitKomercial entity.
     *
     * @param LlojiProduktitKomercial $llojiProduktitKomercial The LlojiProduktitKomercial entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LlojiProduktitKomercial $llojiProduktitKomercial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('llojiproduktitkomercial_delete', array('id' => $llojiProduktitKomercial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
