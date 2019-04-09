<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\NderhyrjetUjitje;
use AiadBundle\Form\NderhyrjetUjitjeType;

/**
 * NderhyrjetUjitje controller.
 *
 * @Route("/nderhyrjetujitje")
 */
class NderhyrjetUjitjeController extends Controller
{
    /**
     * Lists all NderhyrjetUjitje entities.
     *
     * @Route("/", name="nderhyrjetujitje_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $nderhyrjetUjitjes = $em->getRepository('AiadBundle:NderhyrjetUjitje')->findBy(array('parcela'=>$parcela));

        return $this->render('nderhyrjetujitje/index.html.twig', array(
            'nderhyrjetUjitjes' => $nderhyrjetUjitjes,
        ));
    }

    /**
     * Creates a new NderhyrjetUjitje entity.
     *
     * @Route("/new", name="nderhyrjetujitje_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nderhyrjetUjitje = new NderhyrjetUjitje();
        $form = $this->createForm('AiadBundle\Form\NderhyrjetUjitjeType', $nderhyrjetUjitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetUjitje);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetujitje_show', array('id' => $nderhyrjetUjitje->getId()));
            return $this->redirectToRoute('nderhyrjetujitje_index');
        }

        return $this->render('nderhyrjetujitje/new.html.twig', array(
            'nderhyrjetUjitje' => $nderhyrjetUjitje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NderhyrjetUjitje entity.
     *
     * @Route("/{id}", name="nderhyrjetujitje_show")
     * @Method("GET")
     */
    public function showAction(NderhyrjetUjitje $nderhyrjetUjitje)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetUjitje);

        return $this->render('nderhyrjetujitje/show.html.twig', array(
            'nderhyrjetUjitje' => $nderhyrjetUjitje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NderhyrjetUjitje entity.
     *
     * @Route("/{id}/edit", name="nderhyrjetujitje_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NderhyrjetUjitje $nderhyrjetUjitje)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetUjitje);
        $editForm = $this->createForm('AiadBundle\Form\NderhyrjetUjitjeType', $nderhyrjetUjitje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetUjitje);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetujitje_edit', array('id' => $nderhyrjetUjitje->getId()));
            return $this->redirectToRoute('nderhyrjetujitje_index');
        }

        return $this->render('nderhyrjetujitje/edit.html.twig', array(
            'nderhyrjetUjitje' => $nderhyrjetUjitje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NderhyrjetUjitje entity.
     *
     * @Route("/{id}", name="nderhyrjetujitje_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NderhyrjetUjitje $nderhyrjetUjitje)
    {
        $form = $this->createDeleteForm($nderhyrjetUjitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nderhyrjetUjitje);
            $em->flush();
        }

        return $this->redirectToRoute('nderhyrjetujitje_index');
    }

    /**
     * Creates a form to delete a NderhyrjetUjitje entity.
     *
     * @param NderhyrjetUjitje $nderhyrjetUjitje The NderhyrjetUjitje entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NderhyrjetUjitje $nderhyrjetUjitje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nderhyrjetujitje_delete', array('id' => $nderhyrjetUjitje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
