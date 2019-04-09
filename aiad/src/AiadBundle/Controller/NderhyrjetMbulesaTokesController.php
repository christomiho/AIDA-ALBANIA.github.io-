<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\NderhyrjetMbulesaTokes;
use AiadBundle\Form\NderhyrjetMbulesaTokesType;

/**
 * NderhyrjetMbulesaTokes controller.
 *
 * @Route("/nderhyrjetmbulesatokes")
 */
class NderhyrjetMbulesaTokesController extends Controller
{
    /**
     * Lists all NderhyrjetMbulesaTokes entities.
     *
     * @Route("/", name="nderhyrjetmbulesatokes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $nderhyrjetMbulesaTokes = $em->getRepository('AiadBundle:NderhyrjetMbulesaTokes')->findBy(array('parcela'=>$parcela));

        return $this->render('nderhyrjetmbulesatokes/index.html.twig', array(
            'nderhyrjetMbulesaTokes' => $nderhyrjetMbulesaTokes,
        ));
    }

    /**
     * Creates a new NderhyrjetMbulesaTokes entity.
     *
     * @Route("/new", name="nderhyrjetmbulesatokes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nderhyrjetMbulesaToke = new NderhyrjetMbulesaTokes();
        $form = $this->createForm('AiadBundle\Form\NderhyrjetMbulesaTokesType', $nderhyrjetMbulesaToke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetMbulesaToke);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetmbulesatokes_show', array('id' => $nderhyrjetMbulesaToke->getId()));
            return $this->redirectToRoute('nderhyrjetmbulesatokes_index');
        }

        return $this->render('nderhyrjetmbulesatokes/new.html.twig', array(
            'nderhyrjetMbulesaToke' => $nderhyrjetMbulesaToke,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NderhyrjetMbulesaTokes entity.
     *
     * @Route("/{id}", name="nderhyrjetmbulesatokes_show")
     * @Method("GET")
     */
    public function showAction(NderhyrjetMbulesaTokes $nderhyrjetMbulesaToke)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetMbulesaToke);

        return $this->render('nderhyrjetmbulesatokes/show.html.twig', array(
            'nderhyrjetMbulesaToke' => $nderhyrjetMbulesaToke,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NderhyrjetMbulesaTokes entity.
     *
     * @Route("/{id}/edit", name="nderhyrjetmbulesatokes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NderhyrjetMbulesaTokes $nderhyrjetMbulesaToke)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetMbulesaToke);
        $editForm = $this->createForm('AiadBundle\Form\NderhyrjetMbulesaTokesType', $nderhyrjetMbulesaToke);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetMbulesaToke);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetmbulesatokes_edit', array('id' => $nderhyrjetMbulesaToke->getId()));
            return $this->redirectToRoute('nderhyrjetmbulesatokes_index');
        }

        return $this->render('nderhyrjetmbulesatokes/edit.html.twig', array(
            'nderhyrjetMbulesaToke' => $nderhyrjetMbulesaToke,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NderhyrjetMbulesaTokes entity.
     *
     * @Route("/{id}", name="nderhyrjetmbulesatokes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NderhyrjetMbulesaTokes $nderhyrjetMbulesaToke)
    {
        $form = $this->createDeleteForm($nderhyrjetMbulesaToke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nderhyrjetMbulesaToke);
            $em->flush();
        }

        return $this->redirectToRoute('nderhyrjetmbulesatokes_index');
    }

    /**
     * Creates a form to delete a NderhyrjetMbulesaTokes entity.
     *
     * @param NderhyrjetMbulesaTokes $nderhyrjetMbulesaToke The NderhyrjetMbulesaTokes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NderhyrjetMbulesaTokes $nderhyrjetMbulesaToke)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nderhyrjetmbulesatokes_delete', array('id' => $nderhyrjetMbulesaToke->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
