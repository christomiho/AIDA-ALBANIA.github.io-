<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraGlifodes;
use AiadBundle\Form\MostraGlifodesType;

/**
 * MostraGlifodes controller.
 *
 * @Route("/mostraglifodes")
 */
class MostraGlifodesController extends Controller
{
    /**
     * Lists all MostraGlifodes entities.
     *
     * @Route("/", name="mostraglifodes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraGlifodes = $em->getRepository('AiadBundle:MostraGlifodes')->findBy(array('parcela'=>$parcela));

        return $this->render('mostraglifodes/index.html.twig', array(
            'mostraGlifodes' => $mostraGlifodes,
        ));
    }

    /**
     * Creates a new MostraGlifodes entity.
     *
     * @Route("/new", name="mostraglifodes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraGlifode = new MostraGlifodes();
        $form = $this->createForm('AiadBundle\Form\MostraGlifodesType', $mostraGlifode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraGlifode);
            $em->flush();

//            return $this->redirectToRoute('mostraglifodes_show', array('id' => $mostraGlifode->getId()));
            return $this->redirectToRoute('mostraglifodes_index');
        }

        return $this->render('mostraglifodes/new.html.twig', array(
            'mostraGlifode' => $mostraGlifode,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraGlifodes entity.
     *
     * @Route("/{id}", name="mostraglifodes_show")
     * @Method("GET")
     */
    public function showAction(MostraGlifodes $mostraGlifode)
    {
        $deleteForm = $this->createDeleteForm($mostraGlifode);

        return $this->render('mostraglifodes/show.html.twig', array(
            'mostraGlifode' => $mostraGlifode,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraGlifodes entity.
     *
     * @Route("/{id}/edit", name="mostraglifodes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraGlifodes $mostraGlifode)
    {
        $deleteForm = $this->createDeleteForm($mostraGlifode);
        $editForm = $this->createForm('AiadBundle\Form\MostraGlifodesType', $mostraGlifode);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraGlifode);
            $em->flush();

//            return $this->redirectToRoute('mostraglifodes_edit', array('id' => $mostraGlifode->getId()));
            return $this->redirectToRoute('mostraglifodes_index');

        }

        return $this->render('mostraglifodes/edit.html.twig', array(
            'mostraGlifode' => $mostraGlifode,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraGlifodes entity.
     *
     * @Route("/{id}", name="mostraglifodes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraGlifodes $mostraGlifode)
    {
        $form = $this->createDeleteForm($mostraGlifode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraGlifode);
            $em->flush();
        }

        return $this->redirectToRoute('mostraglifodes_index');
    }

    /**
     * Creates a form to delete a MostraGlifodes entity.
     *
     * @param MostraGlifodes $mostraGlifode The MostraGlifodes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraGlifodes $mostraGlifode)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostraglifodes_delete', array('id' => $mostraGlifode->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
