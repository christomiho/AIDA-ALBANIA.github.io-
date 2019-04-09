<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\NderhyrjetVjelja;
use AiadBundle\Form\NderhyrjetVjeljaType;

/**
 * NderhyrjetVjelja controller.
 *
 * @Route("/nderhyrjetvjelja")
 */
class NderhyrjetVjeljaController extends Controller
{
    /**
     * Lists all NderhyrjetVjelja entities.
     *
     * @Route("/", name="nderhyrjetvjelja_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $nderhyrjetVjeljas = $em->getRepository('AiadBundle:NderhyrjetVjelja')->findBy(array('parcela'=>$parcela));

        return $this->render('nderhyrjetvjelja/index.html.twig', array(
            'nderhyrjetVjeljas' => $nderhyrjetVjeljas,
        ));
    }

    /**
     * Creates a new NderhyrjetVjelja entity.
     *
     * @Route("/new", name="nderhyrjetvjelja_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nderhyrjetVjelja = new NderhyrjetVjelja();
        $form = $this->createForm('AiadBundle\Form\NderhyrjetVjeljaType', $nderhyrjetVjelja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetVjelja);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetvjelja_show', array('id' => $nderhyrjetVjelja->getId()));
            return $this->redirectToRoute('nderhyrjetvjelja_index');

        }

        return $this->render('nderhyrjetvjelja/new.html.twig', array(
            'nderhyrjetVjelja' => $nderhyrjetVjelja,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NderhyrjetVjelja entity.
     *
     * @Route("/{id}", name="nderhyrjetvjelja_show")
     * @Method("GET")
     */
    public function showAction(NderhyrjetVjelja $nderhyrjetVjelja)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetVjelja);

        return $this->render('nderhyrjetvjelja/show.html.twig', array(
            'nderhyrjetVjelja' => $nderhyrjetVjelja,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NderhyrjetVjelja entity.
     *
     * @Route("/{id}/edit", name="nderhyrjetvjelja_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NderhyrjetVjelja $nderhyrjetVjelja)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetVjelja);
        $editForm = $this->createForm('AiadBundle\Form\NderhyrjetVjeljaType', $nderhyrjetVjelja);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetVjelja);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetvjelja_edit', array('id' => $nderhyrjetVjelja->getId()));
            return $this->redirectToRoute('nderhyrjetvjelja_index');
        }

        return $this->render('nderhyrjetvjelja/edit.html.twig', array(
            'nderhyrjetVjelja' => $nderhyrjetVjelja,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NderhyrjetVjelja entity.
     *
     * @Route("/{id}", name="nderhyrjetvjelja_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NderhyrjetVjelja $nderhyrjetVjelja)
    {
        $form = $this->createDeleteForm($nderhyrjetVjelja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nderhyrjetVjelja);
            $em->flush();
        }

        return $this->redirectToRoute('nderhyrjetvjelja_index');
    }

    /**
     * Creates a form to delete a NderhyrjetVjelja entity.
     *
     * @param NderhyrjetVjelja $nderhyrjetVjelja The NderhyrjetVjelja entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NderhyrjetVjelja $nderhyrjetVjelja)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nderhyrjetvjelja_delete', array('id' => $nderhyrjetVjelja->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
