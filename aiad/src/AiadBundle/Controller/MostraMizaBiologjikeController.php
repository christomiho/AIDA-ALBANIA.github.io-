<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraMizaBiologjike;
use AiadBundle\Form\MostraMizaBiologjikeType;

/**
 * MostraMizaBiologjike controller.
 *
 * @Route("/mostramizabiologjike")
 */
class MostraMizaBiologjikeController extends Controller
{
    /**
     * Lists all MostraMizaBiologjike entities.
     *
     * @Route("/", name="mostramizabiologjike_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraMizaBiologjikes = $em->getRepository('AiadBundle:MostraMizaBiologjike')->findBy(array('parcela'=>$parcela));

        return $this->render('mostramizabiologjike/index.html.twig', array(
            'mostraMizaBiologjikes' => $mostraMizaBiologjikes,
        ));
    }

    /**
     * Creates a new MostraMizaBiologjike entity.
     *
     * @Route("/new", name="mostramizabiologjike_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraMizaBiologjike = new MostraMizaBiologjike();
        $form = $this->createForm('AiadBundle\Form\MostraMizaBiologjikeType', $mostraMizaBiologjike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraMizaBiologjike);
            $em->flush();

//            return $this->redirectToRoute('mostramizabiologjike_show', array('id' => $mostraMizaBiologjike->getId()));
            return $this->redirectToRoute('mostramizabiologjike_index');
        }

        return $this->render('mostramizabiologjike/new.html.twig', array(
            'mostraMizaBiologjike' => $mostraMizaBiologjike,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraMizaBiologjike entity.
     *
     * @Route("/{id}", name="mostramizabiologjike_show")
     * @Method("GET")
     */
    public function showAction(MostraMizaBiologjike $mostraMizaBiologjike)
    {
        $deleteForm = $this->createDeleteForm($mostraMizaBiologjike);

        return $this->render('mostramizabiologjike/show.html.twig', array(
            'mostraMizaBiologjike' => $mostraMizaBiologjike,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraMizaBiologjike entity.
     *
     * @Route("/{id}/edit", name="mostramizabiologjike_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraMizaBiologjike $mostraMizaBiologjike)
    {
        $deleteForm = $this->createDeleteForm($mostraMizaBiologjike);
        $editForm = $this->createForm('AiadBundle\Form\MostraMizaBiologjikeType', $mostraMizaBiologjike);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraMizaBiologjike);
            $em->flush();

//            return $this->redirectToRoute('mostramizabiologjike_edit', array('id' => $mostraMizaBiologjike->getId()));
            return $this->redirectToRoute('mostramizabiologjike_index');
        }

        return $this->render('mostramizabiologjike/edit.html.twig', array(
            'mostraMizaBiologjike' => $mostraMizaBiologjike,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraMizaBiologjike entity.
     *
     * @Route("/{id}", name="mostramizabiologjike_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraMizaBiologjike $mostraMizaBiologjike)
    {
        $form = $this->createDeleteForm($mostraMizaBiologjike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraMizaBiologjike);
            $em->flush();
        }

        return $this->redirectToRoute('mostramizabiologjike_index');
    }

    /**
     * Creates a form to delete a MostraMizaBiologjike entity.
     *
     * @param MostraMizaBiologjike $mostraMizaBiologjike The MostraMizaBiologjike entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraMizaBiologjike $mostraMizaBiologjike)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostramizabiologjike_delete', array('id' => $mostraMizaBiologjike->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
