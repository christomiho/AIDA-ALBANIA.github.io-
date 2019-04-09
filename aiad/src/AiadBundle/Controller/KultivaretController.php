<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\Kultivaret;
use AiadBundle\Form\KultivaretType;

/**
 * Kultivaret controller.
 *
 * @Route("/kultivaret")
 */
class KultivaretController extends Controller
{
    /**
     * Lists all Kultivaret entities.
     *
     * @Route("/", name="kultivaret_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $kultivarets = $em->getRepository('AiadBundle:Kultivaret')->findAll();

        return $this->render('kultivaret/index.html.twig', array(
            'kultivarets' => $kultivarets,
        ));
    }

    /**
     * Creates a new Kultivaret entity.
     *
     * @Route("/new", name="kultivaret_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $kultivaret = new Kultivaret();
        $form = $this->createForm('AiadBundle\Form\KultivaretType', $kultivaret);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kultivaret);
            $em->flush();

            return $this->redirectToRoute('kultivaret_index');
        }

        return $this->render('kultivaret/new.html.twig', array(
            'kultivaret' => $kultivaret,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Kultivaret entity.
     *
     * @Route("/{id}", name="kultivaret_show")
     * @Method("GET")
     */
    public function showAction(Kultivaret $kultivaret)
    {
        $deleteForm = $this->createDeleteForm($kultivaret);

        return $this->render('kultivaret/show.html.twig', array(
            'kultivaret' => $kultivaret,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Kultivaret entity.
     *
     * @Route("/{id}/edit", name="kultivaret_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Kultivaret $kultivaret)
    {
        $deleteForm = $this->createDeleteForm($kultivaret);
        $editForm = $this->createForm('AiadBundle\Form\KultivaretType', $kultivaret);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($kultivaret);
            $em->flush();

            return $this->redirectToRoute('kultivaret_index');
        }

        return $this->render('kultivaret/edit.html.twig', array(
            'kultivaret' => $kultivaret,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Kultivaret entity.
     *
     * @Route("/{id}", name="kultivaret_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Kultivaret $kultivaret)
    {
        $form = $this->createDeleteForm($kultivaret);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($kultivaret);
            $em->flush();
        }

        return $this->redirectToRoute('kultivaret_index');
    }

    /**
     * Creates a form to delete a Kultivaret entity.
     *
     * @param Kultivaret $kultivaret The Kultivaret entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Kultivaret $kultivaret)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kultivaret_delete', array('id' => $kultivaret->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
