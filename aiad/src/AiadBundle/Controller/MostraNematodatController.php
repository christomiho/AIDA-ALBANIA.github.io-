<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraNematodat;
use AiadBundle\Form\MostraNematodatType;

/**
 * MostraNematodat controller.
 *
 * @Route("/mostranematodat")
 */
class MostraNematodatController extends Controller
{
    /**
     * Lists all MostraNematodat entities.
     *
     * @Route("/", name="mostranematodat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraNematodats = $em->getRepository('AiadBundle:MostraNematodat')->findBy(array('parcela'=>$parcela));

        return $this->render('mostranematodat/index.html.twig', array(
            'mostraNematodats' => $mostraNematodats,
        ));
    }

    /**
     * Creates a new MostraNematodat entity.
     *
     * @Route("/new", name="mostranematodat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraNematodat = new MostraNematodat();
        $form = $this->createForm('AiadBundle\Form\MostraNematodatType', $mostraNematodat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraNematodat);
            $em->flush();

//            return $this->redirectToRoute('mostranematodat_show', array('id' => $mostraNematodat->getId()));
            return $this->redirectToRoute('mostranematodat_index');
        
        }

        return $this->render('mostranematodat/new.html.twig', array(
            'mostraNematodat' => $mostraNematodat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraNematodat entity.
     *
     * @Route("/{id}", name="mostranematodat_show")
     * @Method("GET")
     */
    public function showAction(MostraNematodat $mostraNematodat)
    {
        $deleteForm = $this->createDeleteForm($mostraNematodat);

        return $this->render('mostranematodat/show.html.twig', array(
            'mostraNematodat' => $mostraNematodat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraNematodat entity.
     *
     * @Route("/{id}/edit", name="mostranematodat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraNematodat $mostraNematodat)
    {
        $deleteForm = $this->createDeleteForm($mostraNematodat);
        $editForm = $this->createForm('AiadBundle\Form\MostraNematodatType', $mostraNematodat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraNematodat);
            $em->flush();

            //return $this->redirectToRoute('mostranematodat_edit', array('id' => $mostraNematodat->getId()));
            return $this->redirectToRoute('mostranematodat_index');
        }

        return $this->render('mostranematodat/edit.html.twig', array(
            'mostraNematodat' => $mostraNematodat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraNematodat entity.
     *
     * @Route("/{id}", name="mostranematodat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraNematodat $mostraNematodat)
    {
        $form = $this->createDeleteForm($mostraNematodat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraNematodat);
            $em->flush();
        }

        return $this->redirectToRoute('mostranematodat_index');
    }

    /**
     * Creates a form to delete a MostraNematodat entity.
     *
     * @param MostraNematodat $mostraNematodat The MostraNematodat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraNematodat $mostraNematodat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostranematodat_delete', array('id' => $mostraNematodat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
