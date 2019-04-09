<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraPraisStadiLarvor;
use AiadBundle\Form\MostraPraisStadiLarvorType;

/**
 * MostraPraisStadiLarvor controller.
 *
 * @Route("/mostrapraisstadilarvor")
 */
class MostraPraisStadiLarvorController extends Controller
{
    /**
     * Lists all MostraPraisStadiLarvor entities.
     *
     * @Route("/", name="mostrapraisstadilarvor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraPraisStadiLarvors = $em->getRepository('AiadBundle:MostraPraisStadiLarvor')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrapraisstadilarvor/index.html.twig', array(
            'mostraPraisStadiLarvors' => $mostraPraisStadiLarvors,
        ));
    }

    /**
     * Creates a new MostraPraisStadiLarvor entity.
     *
     * @Route("/new", name="mostrapraisstadilarvor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraPraisStadiLarvor = new MostraPraisStadiLarvor();
        $form = $this->createForm('AiadBundle\Form\MostraPraisStadiLarvorType', $mostraPraisStadiLarvor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraPraisStadiLarvor);
            $em->flush();

            //return $this->redirectToRoute('mostrapraisstadilarvor_show', array('id' => $mostraPraisStadiLarvor->getId()));
            return $this->redirectToRoute('mostrapraisstadilarvor_index');
        }

        return $this->render('mostrapraisstadilarvor/new.html.twig', array(
            'mostraPraisStadiLarvor' => $mostraPraisStadiLarvor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraPraisStadiLarvor entity.
     *
     * @Route("/{id}", name="mostrapraisstadilarvor_show")
     * @Method("GET")
     */
    public function showAction(MostraPraisStadiLarvor $mostraPraisStadiLarvor)
    {
        $deleteForm = $this->createDeleteForm($mostraPraisStadiLarvor);

        return $this->render('mostrapraisstadilarvor/show.html.twig', array(
            'mostraPraisStadiLarvor' => $mostraPraisStadiLarvor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraPraisStadiLarvor entity.
     *
     * @Route("/{id}/edit", name="mostrapraisstadilarvor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraPraisStadiLarvor $mostraPraisStadiLarvor)
    {
        $deleteForm = $this->createDeleteForm($mostraPraisStadiLarvor);
        $editForm = $this->createForm('AiadBundle\Form\MostraPraisStadiLarvorType', $mostraPraisStadiLarvor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraPraisStadiLarvor);
            $em->flush();

            //return $this->redirectToRoute('mostrapraisstadilarvor_edit', array('id' => $mostraPraisStadiLarvor->getId()));
            return $this->redirectToRoute('mostrapraisstadilarvor_index');
        }

        return $this->render('mostrapraisstadilarvor/edit.html.twig', array(
            'mostraPraisStadiLarvor' => $mostraPraisStadiLarvor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraPraisStadiLarvor entity.
     *
     * @Route("/{id}", name="mostrapraisstadilarvor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraPraisStadiLarvor $mostraPraisStadiLarvor)
    {
        $form = $this->createDeleteForm($mostraPraisStadiLarvor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraPraisStadiLarvor);
            $em->flush();
        }

        return $this->redirectToRoute('mostrapraisstadilarvor_index');
    }

    /**
     * Creates a form to delete a MostraPraisStadiLarvor entity.
     *
     * @param MostraPraisStadiLarvor $mostraPraisStadiLarvor The MostraPraisStadiLarvor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraPraisStadiLarvor $mostraPraisStadiLarvor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrapraisstadilarvor_delete', array('id' => $mostraPraisStadiLarvor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
