<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\NderhyrjetEliminimiMbetjes;
use AiadBundle\Form\NderhyrjetEliminimiMbetjesType;

/**
 * NderhyrjetEliminimiMbetjes controller.
 *
 * @Route("/nderhyrjeteliminimimbetjes")
 */
class NderhyrjetEliminimiMbetjesController extends Controller
{
    /**
     * Lists all NderhyrjetEliminimiMbetjes entities.
     *
     * @Route("/", name="nderhyrjeteliminimimbetjes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $nderhyrjetEliminimiMbetjes = $em->getRepository('AiadBundle:NderhyrjetEliminimiMbetjes')->findBy(array('parcela'=>$parcela));

        return $this->render('nderhyrjeteliminimimbetjes/index.html.twig', array(
            'nderhyrjetEliminimiMbetjes' => $nderhyrjetEliminimiMbetjes,
        ));
    }

    /**
     * Creates a new NderhyrjetEliminimiMbetjes entity.
     *
     * @Route("/new", name="nderhyrjeteliminimimbetjes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nderhyrjetEliminimiMbetje = new NderhyrjetEliminimiMbetjes();
        $form = $this->createForm('AiadBundle\Form\NderhyrjetEliminimiMbetjesType', $nderhyrjetEliminimiMbetje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetEliminimiMbetje);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjeteliminimimbetjes_show', array('id' => $nderhyrjetEliminimiMbetje->getId()));
            return $this->redirectToRoute('nderhyrjeteliminimimbetjes_index');
        }

        return $this->render('nderhyrjeteliminimimbetjes/new.html.twig', array(
            'nderhyrjetEliminimiMbetje' => $nderhyrjetEliminimiMbetje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NderhyrjetEliminimiMbetjes entity.
     *
     * @Route("/{id}", name="nderhyrjeteliminimimbetjes_show")
     * @Method("GET")
     */
    public function showAction(NderhyrjetEliminimiMbetjes $nderhyrjetEliminimiMbetje)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetEliminimiMbetje);

        return $this->render('nderhyrjeteliminimimbetjes/show.html.twig', array(
            'nderhyrjetEliminimiMbetje' => $nderhyrjetEliminimiMbetje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NderhyrjetEliminimiMbetjes entity.
     *
     * @Route("/{id}/edit", name="nderhyrjeteliminimimbetjes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NderhyrjetEliminimiMbetjes $nderhyrjetEliminimiMbetje)
    {
        $deleteForm = $this->createDeleteForm($nderhyrjetEliminimiMbetje);
        $editForm = $this->createForm('AiadBundle\Form\NderhyrjetEliminimiMbetjesType', $nderhyrjetEliminimiMbetje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nderhyrjetEliminimiMbetje);
            $em->flush();

            //return $this->redirectToRoute('nderhyrjeteliminimimbetjes_edit', array('id' => $nderhyrjetEliminimiMbetje->getId()));
            return $this->redirectToRoute('nderhyrjeteliminimimbetjes_index');
        }

        return $this->render('nderhyrjeteliminimimbetjes/edit.html.twig', array(
            'nderhyrjetEliminimiMbetje' => $nderhyrjetEliminimiMbetje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NderhyrjetEliminimiMbetjes entity.
     *
     * @Route("/{id}", name="nderhyrjeteliminimimbetjes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NderhyrjetEliminimiMbetjes $nderhyrjetEliminimiMbetje)
    {
        $form = $this->createDeleteForm($nderhyrjetEliminimiMbetje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nderhyrjetEliminimiMbetje);
            $em->flush();
        }

        return $this->redirectToRoute('nderhyrjeteliminimimbetjes_index');
    }

    /**
     * Creates a form to delete a NderhyrjetEliminimiMbetjes entity.
     *
     * @param NderhyrjetEliminimiMbetjes $nderhyrjetEliminimiMbetje The NderhyrjetEliminimiMbetjes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NderhyrjetEliminimiMbetjes $nderhyrjetEliminimiMbetje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nderhyrjeteliminimimbetjes_delete', array('id' => $nderhyrjetEliminimiMbetje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
