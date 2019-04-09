<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\VendndodhjaBashkia;
use AiadBundle\Form\VendndodhjaBashkiaType;

/**
 * VendndodhjaBashkia controller.
 *
 * @Route("/konfigurime/vendndodhja_bashkia")
 */
class VendndodhjaBashkiaController extends Controller
{
    /**
     * Lists all VendndodhjaBashkia entities.
     *
     * @Route("/", name="vendndodhjabashkia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vendndodhjaBashkias = $em->getRepository('AiadBundle:VendndodhjaBashkia')->findAll();

        return $this->render('vendndodhjabashkia/index.html.twig', array(
            'vendndodhjaBashkias' => $vendndodhjaBashkias,
        ));
    }

    /**
     * Creates a new VendndodhjaBashkia entity.
     *
     * @Route("/new", name="vendndodhjabashkia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vendndodhjaBashkium = new VendndodhjaBashkia();
        $form = $this->createForm('AiadBundle\Form\VendndodhjaBashkiaType', $vendndodhjaBashkium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendndodhjaBashkium);
            $em->flush();

            return $this->redirectToRoute('vendndodhjabashkia_index');
        }

        return $this->render('vendndodhjabashkia/new.html.twig', array(
            'vendndodhjaBashkium' => $vendndodhjaBashkium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a VendndodhjaBashkia entity.
     *
     * @Route("/{id}", name="vendndodhjabashkia_show")
     * @Method("GET")
     */
    public function showAction(VendndodhjaBashkia $vendndodhjaBashkium)
    {
        $deleteForm = $this->createDeleteForm($vendndodhjaBashkium);

        return $this->render('vendndodhjabashkia/show.html.twig', array(
            'vendndodhjaBashkium' => $vendndodhjaBashkium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing VendndodhjaBashkia entity.
     *
     * @Route("/{id}/edit", name="vendndodhjabashkia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VendndodhjaBashkia $vendndodhjaBashkium)
    {
        $deleteForm = $this->createDeleteForm($vendndodhjaBashkium);
        $editForm = $this->createForm('AiadBundle\Form\VendndodhjaBashkiaType', $vendndodhjaBashkium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendndodhjaBashkium);
            $em->flush();

            return $this->redirectToRoute('vendndodhjabashkia_index');
        }

        return $this->render('vendndodhjabashkia/edit.html.twig', array(
            'vendndodhjaBashkium' => $vendndodhjaBashkium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a VendndodhjaBashkia entity.
     *
     * @Route("/{id}", name="vendndodhjabashkia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VendndodhjaBashkia $vendndodhjaBashkium)
    {
        $form = $this->createDeleteForm($vendndodhjaBashkium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vendndodhjaBashkium);
            $em->flush();
        }

        return $this->redirectToRoute('vendndodhjabashkia_index');
    }

    /**
     * Creates a form to delete a VendndodhjaBashkia entity.
     *
     * @param VendndodhjaBashkia $vendndodhjaBashkium The VendndodhjaBashkia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VendndodhjaBashkia $vendndodhjaBashkium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vendndodhjabashkia_delete', array('id' => $vendndodhjaBashkium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
