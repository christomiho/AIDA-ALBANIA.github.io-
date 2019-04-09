<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\NderhyrjetGrackaMasive;
use AiadBundle\Form\NderhyrjetGrackaMasiveType;

/**
 * NderhyrjetGrackaMasive controller.
 *
 * @Route("/nderhyrjetgrackamasive")
 */
class NderhyrjetGrackaMasiveController extends Controller
{
    /**
     * Lists all NderhyrjetGrackaMasive entities.
     *
     * @Route("/", name="nderhyrjetgrackamasive_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $nderhyrjetGrackaMasives = $em->getRepository('AiadBundle:NderhyrjetGrackaMasive')->findBy(array('parcela'=>$parcela));

        return $this->render('nderhyrjetgrackamasive/index.html.twig', array(
            'nderhyrjetGrackaMasives' => $nderhyrjetGrackaMasives,
        ));
    }

    /**
     * Creates a new NderhyrjetGrackaMasive entity.
     *
     * @Route("/new", name="nderhyrjetgrackamasive_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nderhyrjetGrackaMasive = new NderhyrjetGrackaMasive();
        $form = $this->createForm('AiadBundle\Form\NderhyrjetGrackaMasiveType', $nderhyrjetGrackaMasive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetGrackaMasive);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetgrackamasive_show', array('id' => $nderhyrjetGrackaMasive->getId()));
            return $this->redirectToRoute('nderhyrjetgrackamasive_index');
        }

        return $this->render('nderhyrjetgrackamasive/new.html.twig', array(
            'nderhyrjetGrackaMasive' => $nderhyrjetGrackaMasive,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NderhyrjetGrackaMasive entity.
     *
     * @Route("/{id}", name="nderhyrjetgrackamasive_show")
     * @Method("GET")
     */
    public function showAction(NderhyrjetGrackaMasive $nderhyrjetGrackaMasive)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetGrackaMasive);

        return $this->render('nderhyrjetgrackamasive/show.html.twig', array(
            'nderhyrjetGrackaMasive' => $nderhyrjetGrackaMasive,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NderhyrjetGrackaMasive entity.
     *
     * @Route("/{id}/edit", name="nderhyrjetgrackamasive_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NderhyrjetGrackaMasive $nderhyrjetGrackaMasive)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetGrackaMasive);
        $editForm = $this->createForm('AiadBundle\Form\NderhyrjetGrackaMasiveType', $nderhyrjetGrackaMasive);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetGrackaMasive);
            $em->flush();

           // return $this->redirectToRoute('nderhyrjetgrackamasive_edit', array('id' => $nderhyrjetGrackaMasive->getId()));
            return $this->redirectToRoute('nderhyrjetgrackamasive_index');
        }

        return $this->render('nderhyrjetgrackamasive/edit.html.twig', array(
            'nderhyrjetGrackaMasive' => $nderhyrjetGrackaMasive,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NderhyrjetGrackaMasive entity.
     *
     * @Route("/{id}", name="nderhyrjetgrackamasive_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NderhyrjetGrackaMasive $nderhyrjetGrackaMasive)
    {
        $form = $this->createDeleteForm($nderhyrjetGrackaMasive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nderhyrjetGrackaMasive);
            $em->flush();
        }

        return $this->redirectToRoute('nderhyrjetgrackamasive_index');
    }

    /**
     * Creates a form to delete a NderhyrjetGrackaMasive entity.
     *
     * @param NderhyrjetGrackaMasive $nderhyrjetGrackaMasive The NderhyrjetGrackaMasive entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NderhyrjetGrackaMasive $nderhyrjetGrackaMasive)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nderhyrjetgrackamasive_delete', array('id' => $nderhyrjetGrackaMasive->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
