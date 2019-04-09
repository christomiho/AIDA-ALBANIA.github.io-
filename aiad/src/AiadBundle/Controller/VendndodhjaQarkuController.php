<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\VendndodhjaQarku;
use AiadBundle\Form\VendndodhjaQarkuType;

/**
 * VendndodhjaQarku controller.
 *
 * @Route("/konfigurime/vendndodhja_qarku")
 */
class VendndodhjaQarkuController extends Controller
{
    /**
     * Lists all VendndodhjaQarku entities.
     *
     * @Route("/", name="vendndodhjaqarku_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vendndodhjaQarkus = $em->getRepository('AiadBundle:VendndodhjaQarku')->findAll();

        return $this->render('vendndodhjaqarku/index.html.twig', array(
            'vendndodhjaQarkus' => $vendndodhjaQarkus,
        ));
    }

    /**
     * Creates a new VendndodhjaQarku entity.
     *
     * @Route("/new", name="vendndodhjaqarku_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vendndodhjaQarku = new VendndodhjaQarku();
        $form = $this->createForm('AiadBundle\Form\VendndodhjaQarkuType', $vendndodhjaQarku);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendndodhjaQarku);
            $em->flush();

            return $this->redirectToRoute('vendndodhjaqarku_index');
        }

        return $this->render('vendndodhjaqarku/new.html.twig', array(
            'vendndodhjaQarku' => $vendndodhjaQarku,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a VendndodhjaQarku entity.
     *
     * @Route("/{id}", name="vendndodhjaqarku_show")
     * @Method("GET")
     */
    public function showAction(VendndodhjaQarku $vendndodhjaQarku)
    {
        $deleteForm = $this->createDeleteForm($vendndodhjaQarku);

        return $this->render('vendndodhjaqarku/show.html.twig', array(
            'vendndodhjaQarku' => $vendndodhjaQarku,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing VendndodhjaQarku entity.
     *
     * @Route("/{id}/edit", name="vendndodhjaqarku_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VendndodhjaQarku $vendndodhjaQarku)
    {
        $deleteForm = $this->createDeleteForm($vendndodhjaQarku);
        $editForm = $this->createForm('AiadBundle\Form\VendndodhjaQarkuType', $vendndodhjaQarku);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendndodhjaQarku);
            $em->flush();

            return $this->redirectToRoute('vendndodhjaqarku_index');
        }

        return $this->render('vendndodhjaqarku/edit.html.twig', array(
            'vendndodhjaQarku' => $vendndodhjaQarku,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a VendndodhjaQarku entity.
     *
     * @Route("/{id}", name="vendndodhjaqarku_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VendndodhjaQarku $vendndodhjaQarku)
    {
        $form = $this->createDeleteForm($vendndodhjaQarku);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vendndodhjaQarku);
            $em->flush();
        }

        return $this->redirectToRoute('vendndodhjaqarku_index');
    }

    /**
     * Creates a form to delete a VendndodhjaQarku entity.
     *
     * @param VendndodhjaQarku $vendndodhjaQarku The VendndodhjaQarku entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VendndodhjaQarku $vendndodhjaQarku)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vendndodhjaqarku_delete', array('id' => $vendndodhjaQarku->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
