<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\NderhyrjetKrasitje;
use AiadBundle\Form\NderhyrjetKrasitjeType;

/**
 * NderhyrjetKrasitje controller.
 *
 * @Route("/nderhyrjetkrasitje")
 */
class NderhyrjetKrasitjeController extends Controller
{
    /**
     * Lists all NderhyrjetKrasitje entities.
     *
     * @Route("/", name="nderhyrjetkrasitje_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $nderhyrjetKrasitjes = $em->getRepository('AiadBundle:NderhyrjetKrasitje')->findBy(array('parcela'=>$parcela));

        return $this->render('nderhyrjetkrasitje/index.html.twig', array(
            'nderhyrjetKrasitjes' => $nderhyrjetKrasitjes,
        ));
    }

    /**
     * Creates a new NderhyrjetKrasitje entity.
     *
     * @Route("/new", name="nderhyrjetkrasitje_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nderhyrjetKrasitje = new NderhyrjetKrasitje();
        $form = $this->createForm('AiadBundle\Form\NderhyrjetKrasitjeType', $nderhyrjetKrasitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetKrasitje);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetkrasitje_show', array('id' => $nderhyrjetKrasitje->getId()));
            return $this->redirectToRoute('nderhyrjetkrasitje_index');
        }

        return $this->render('nderhyrjetkrasitje/new.html.twig', array(
            'nderhyrjetKrasitje' => $nderhyrjetKrasitje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NderhyrjetKrasitje entity.
     *
     * @Route("/{id}", name="nderhyrjetkrasitje_show")
     * @Method("GET")
     */
    public function showAction(NderhyrjetKrasitje $nderhyrjetKrasitje)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetKrasitje);

        return $this->render('nderhyrjetkrasitje/show.html.twig', array(
            'nderhyrjetKrasitje' => $nderhyrjetKrasitje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NderhyrjetKrasitje entity.
     *
     * @Route("/{id}/edit", name="nderhyrjetkrasitje_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NderhyrjetKrasitje $nderhyrjetKrasitje)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetKrasitje);
        $editForm = $this->createForm('AiadBundle\Form\NderhyrjetKrasitjeType', $nderhyrjetKrasitje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetKrasitje);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjetkrasitje_edit', array('id' => $nderhyrjetKrasitje->getId()));
            return $this->redirectToRoute('nderhyrjetkrasitje_index');
        }

        return $this->render('nderhyrjetkrasitje/edit.html.twig', array(
            'nderhyrjetKrasitje' => $nderhyrjetKrasitje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NderhyrjetKrasitje entity.
     *
     * @Route("/{id}", name="nderhyrjetkrasitje_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NderhyrjetKrasitje $nderhyrjetKrasitje)
    {
        $form = $this->createDeleteForm($nderhyrjetKrasitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nderhyrjetKrasitje);
            $em->flush();
        }

        return $this->redirectToRoute('nderhyrjetkrasitje_index');
    }

    /**
     * Creates a form to delete a NderhyrjetKrasitje entity.
     *
     * @param NderhyrjetKrasitje $nderhyrjetKrasitje The NderhyrjetKrasitje entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NderhyrjetKrasitje $nderhyrjetKrasitje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nderhyrjetkrasitje_delete', array('id' => $nderhyrjetKrasitje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
