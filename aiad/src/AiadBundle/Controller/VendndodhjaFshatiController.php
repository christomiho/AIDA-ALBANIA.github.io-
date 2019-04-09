<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\VendndodhjaFshati;
use AiadBundle\Form\VendndodhjaFshatiType;

/**
 * VendndodhjaFshati controller.
 *
 * @Route("/konfigurime/vendndodhja_fshati")
 */
class VendndodhjaFshatiController extends Controller
{
    /**
     * Lists all VendndodhjaFshati entities.
     *
     * @Route("/", name="vendndodhjafshati_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vendndodhjaFshatis = $em->getRepository('AiadBundle:VendndodhjaFshati')->findAll();

        return $this->render('vendndodhjafshati/index.html.twig', array(
            'vendndodhjaFshatis' => $vendndodhjaFshatis,
        ));
    }

    /**
     * Creates a new VendndodhjaFshati entity.
     *
     * @Route("/new", name="vendndodhjafshati_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vendndodhjaFshati = new VendndodhjaFshati();
        $form = $this->createForm('AiadBundle\Form\VendndodhjaFshatiType', $vendndodhjaFshati);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendndodhjaFshati);
            $em->flush();

            return $this->redirectToRoute('vendndodhjafshati_index');
        }

        return $this->render('vendndodhjafshati/new.html.twig', array(
            'vendndodhjaFshati' => $vendndodhjaFshati,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a VendndodhjaFshati entity.
     *
     * @Route("/{id}", name="vendndodhjafshati_show")
     * @Method("GET")
     */
    public function showAction(VendndodhjaFshati $vendndodhjaFshati)
    {
        $deleteForm = $this->createDeleteForm($vendndodhjaFshati);

        return $this->render('vendndodhjafshati/show.html.twig', array(
            'vendndodhjaFshati' => $vendndodhjaFshati,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing VendndodhjaFshati entity.
     *
     * @Route("/{id}/edit", name="vendndodhjafshati_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VendndodhjaFshati $vendndodhjaFshati)
    {
        $deleteForm = $this->createDeleteForm($vendndodhjaFshati);
        $editForm = $this->createForm('AiadBundle\Form\VendndodhjaFshatiType', $vendndodhjaFshati);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendndodhjaFshati);
            $em->flush();

            return $this->redirectToRoute('vendndodhjafshati_index');
        }

        return $this->render('vendndodhjafshati/edit.html.twig', array(
            'vendndodhjaFshati' => $vendndodhjaFshati,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a VendndodhjaFshati entity.
     *
     * @Route("/{id}", name="vendndodhjafshati_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VendndodhjaFshati $vendndodhjaFshati)
    {
        $form = $this->createDeleteForm($vendndodhjaFshati);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vendndodhjaFshati);
            $em->flush();
        }

        return $this->redirectToRoute('vendndodhjafshati_index');
    }

    /**
     * Creates a form to delete a VendndodhjaFshati entity.
     *
     * @param VendndodhjaFshati $vendndodhjaFshati The VendndodhjaFshati entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VendndodhjaFshati $vendndodhjaFshati)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vendndodhjafshati_delete', array('id' => $vendndodhjaFshati->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
