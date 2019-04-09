<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraSyriPalloit;
use AiadBundle\Form\MostraSyriPalloitType;

/**
 * MostraSyriPalloit controller.
 *
 * @Route("/mostrasyripalloit")
 */
class MostraSyriPalloitController extends Controller
{
    /**
     * Lists all MostraSyriPalloit entities.
     *
     * @Route("/", name="mostrasyripalloit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraSyriPalloits = $em->getRepository('AiadBundle:MostraSyriPalloit')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrasyripalloit/index.html.twig', array(
            'mostraSyriPalloits' => $mostraSyriPalloits,
        ));
    }

    /**
     * Creates a new MostraSyriPalloit entity.
     *
     * @Route("/new", name="mostrasyripalloit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraSyriPalloit = new MostraSyriPalloit();
        $form = $this->createForm('AiadBundle\Form\MostraSyriPalloitType', $mostraSyriPalloit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraSyriPalloit);
            $em->flush();

//            return $this->redirectToRoute('mostrasyripalloit_show', array('id' => $mostraSyriPalloit->getId()));
            return $this->redirectToRoute('mostrasyripalloit_index');
        }

        return $this->render('mostrasyripalloit/new.html.twig', array(
            'mostraSyriPalloit' => $mostraSyriPalloit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraSyriPalloit entity.
     *
     * @Route("/{id}", name="mostrasyripalloit_show")
     * @Method("GET")
     */
    public function showAction(MostraSyriPalloit $mostraSyriPalloit)
    {
        $deleteForm = $this->createDeleteForm($mostraSyriPalloit);

        return $this->render('mostrasyripalloit/show.html.twig', array(
            'mostraSyriPalloit' => $mostraSyriPalloit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraSyriPalloit entity.
     *
     * @Route("/{id}/edit", name="mostrasyripalloit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraSyriPalloit $mostraSyriPalloit)
    {
        $deleteForm = $this->createDeleteForm($mostraSyriPalloit);
        $editForm = $this->createForm('AiadBundle\Form\MostraSyriPalloitType', $mostraSyriPalloit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraSyriPalloit);
            $em->flush();

//            return $this->redirectToRoute('mostrasyripalloit_edit', array('id' => $mostraSyriPalloit->getId()));
            return $this->redirectToRoute('mostrasyripalloit_index');

        }

        return $this->render('mostrasyripalloit/edit.html.twig', array(
            'mostraSyriPalloit' => $mostraSyriPalloit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraSyriPalloit entity.
     *
     * @Route("/{id}", name="mostrasyripalloit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraSyriPalloit $mostraSyriPalloit)
    {
        $form = $this->createDeleteForm($mostraSyriPalloit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraSyriPalloit);
            $em->flush();
        }

        return $this->redirectToRoute('mostrasyripalloit_index');
    }

    /**
     * Creates a form to delete a MostraSyriPalloit entity.
     *
     * @param MostraSyriPalloit $mostraSyriPalloit The MostraSyriPalloit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraSyriPalloit $mostraSyriPalloit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrasyripalloit_delete', array('id' => $mostraSyriPalloit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
