<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsShperndarjaPunimitTokes;
use AiadBundle\Form\SettingsShperndarjaPunimitTokesType;

/**
 * SettingsShperndarjaPunimitTokes controller.
 *
 * @Route("/konfigurime/shperndarja_punimit_tokes")
 */
class SettingsShperndarjaPunimitTokesController extends Controller
{
    /**
     * Lists all SettingsShperndarjaPunimitTokes entities.
     *
     * @Route("/", name="settingsshperndarjapunimittokes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsShperndarjaPunimitTokes = $em->getRepository('AiadBundle:SettingsShperndarjaPunimitTokes')->findAll();

        return $this->render('settingsshperndarjapunimittokes/index.html.twig', array(
            'settingsShperndarjaPunimitTokes' => $settingsShperndarjaPunimitTokes,
        ));
    }

    /**
     * Creates a new SettingsShperndarjaPunimitTokes entity.
     *
     * @Route("/new", name="settingsshperndarjapunimittokes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsShperndarjaPunimitToke = new SettingsShperndarjaPunimitTokes();
        $form = $this->createForm('AiadBundle\Form\SettingsShperndarjaPunimitTokesType', $settingsShperndarjaPunimitToke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsShperndarjaPunimitToke);
            $em->flush();

            return $this->redirectToRoute('settingsshperndarjapunimittokes_index');
        }

        return $this->render('settingsshperndarjapunimittokes/new.html.twig', array(
            'settingsShperndarjaPunimitToke' => $settingsShperndarjaPunimitToke,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsShperndarjaPunimitTokes entity.
     *
     * @Route("/{id}", name="settingsshperndarjapunimittokes_show")
     * @Method("GET")
     */
    public function showAction(SettingsShperndarjaPunimitTokes $settingsShperndarjaPunimitToke)
    {
        $deleteForm = $this->createDeleteForm($settingsShperndarjaPunimitToke);

        return $this->render('settingsshperndarjapunimittokes/show.html.twig', array(
            'settingsShperndarjaPunimitToke' => $settingsShperndarjaPunimitToke,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsShperndarjaPunimitTokes entity.
     *
     * @Route("/{id}/edit", name="settingsshperndarjapunimittokes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsShperndarjaPunimitTokes $settingsShperndarjaPunimitToke)
    {
        $deleteForm = $this->createDeleteForm($settingsShperndarjaPunimitToke);
        $editForm = $this->createForm('AiadBundle\Form\SettingsShperndarjaPunimitTokesType', $settingsShperndarjaPunimitToke);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsShperndarjaPunimitToke);
            $em->flush();

            return $this->redirectToRoute('settingsshperndarjapunimittokes_index');
        }

        return $this->render('settingsshperndarjapunimittokes/edit.html.twig', array(
            'settingsShperndarjaPunimitToke' => $settingsShperndarjaPunimitToke,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsShperndarjaPunimitTokes entity.
     *
     * @Route("/{id}", name="settingsshperndarjapunimittokes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsShperndarjaPunimitTokes $settingsShperndarjaPunimitToke)
    {
        $form = $this->createDeleteForm($settingsShperndarjaPunimitToke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsShperndarjaPunimitToke);
            $em->flush();
        }

        return $this->redirectToRoute('settingsshperndarjapunimittokes_index');
    }

    /**
     * Creates a form to delete a SettingsShperndarjaPunimitTokes entity.
     *
     * @param SettingsShperndarjaPunimitTokes $settingsShperndarjaPunimitToke The SettingsShperndarjaPunimitTokes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsShperndarjaPunimitTokes $settingsShperndarjaPunimitToke)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsshperndarjapunimittokes_delete', array('id' => $settingsShperndarjaPunimitToke->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
