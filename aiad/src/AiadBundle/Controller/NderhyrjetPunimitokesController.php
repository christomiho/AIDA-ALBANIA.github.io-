<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\NderhyrjetPunimitokes;
use AiadBundle\Form\NderhyrjetPunimitokesType;

/**
 * NderhyrjetPunimitokes controller.
 *
 * @Route("/nderhyrjetpunimitokes")
 */
class NderhyrjetPunimitokesController extends Controller
{
    /**
     * Lists all NderhyrjetPunimitokes entities.
     *
     * @Route("/", name="nderhyrjetpunimitokes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $nderhyrjetPunimitokes = $em->getRepository('AiadBundle:NderhyrjetPunimitokes')->findBy(array('parcela'=>$parcela));

        return $this->render('nderhyrjetpunimitokes/index.html.twig', array(
            'nderhyrjetPunimitokes' => $nderhyrjetPunimitokes,
        ));
    }

    /**
     * Creates a new NderhyrjetPunimitokes entity.
     *
     * @Route("/new", name="nderhyrjetpunimitokes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nderhyrjetPunimitoke = new NderhyrjetPunimitokes();
        $form = $this->createForm('AiadBundle\Form\NderhyrjetPunimitokesType', $nderhyrjetPunimitoke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetPunimitoke);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetpunimitokes_show', array('id' => $nderhyrjetPunimitoke->getId()));
            return $this->redirectToRoute('nderhyrjetpunimitokes_index');
        }

        return $this->render('nderhyrjetpunimitokes/new.html.twig', array(
            'nderhyrjetPunimitoke' => $nderhyrjetPunimitoke,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NderhyrjetPunimitokes entity.
     *
     * @Route("/{id}", name="nderhyrjetpunimitokes_show")
     * @Method("GET")
     */
    public function showAction(NderhyrjetPunimitokes $nderhyrjetPunimitoke)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetPunimitoke);

        return $this->render('nderhyrjetpunimitokes/show.html.twig', array(
            'nderhyrjetPunimitoke' => $nderhyrjetPunimitoke,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NderhyrjetPunimitokes entity.
     *
     * @Route("/{id}/edit", name="nderhyrjetpunimitokes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NderhyrjetPunimitokes $nderhyrjetPunimitoke)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetPunimitoke);
        $editForm = $this->createForm('AiadBundle\Form\NderhyrjetPunimitokesType', $nderhyrjetPunimitoke);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetPunimitoke);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetpunimitokes_edit', array('id' => $nderhyrjetPunimitoke->getId()));
            return $this->redirectToRoute('nderhyrjetpunimitokes_index');
        }

        return $this->render('nderhyrjetpunimitokes/edit.html.twig', array(
            'nderhyrjetPunimitoke' => $nderhyrjetPunimitoke,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NderhyrjetPunimitokes entity.
     *
     * @Route("/{id}", name="nderhyrjetpunimitokes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NderhyrjetPunimitokes $nderhyrjetPunimitoke)
    {
        $form = $this->createDeleteForm($nderhyrjetPunimitoke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nderhyrjetPunimitoke);
            $em->flush();
        }

        return $this->redirectToRoute('nderhyrjetpunimitokes_index');
    }

    /**
     * Creates a form to delete a NderhyrjetPunimitokes entity.
     *
     * @param NderhyrjetPunimitokes $nderhyrjetPunimitoke The NderhyrjetPunimitokes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NderhyrjetPunimitokes $nderhyrjetPunimitoke)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nderhyrjetpunimitokes_delete', array('id' => $nderhyrjetPunimitoke->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
