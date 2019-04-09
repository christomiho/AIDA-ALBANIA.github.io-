<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsDistanca;
use AiadBundle\Form\SettingsDistancaType;

/**
 * SettingsDistanca controller.
 *
 * @Route("/konfigurime/distanca")
 */
class SettingsDistancaController extends Controller
{
    /**
     * Lists all SettingsDistanca entities.
     *
     * @Route("/", name="settingsdistanca_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsDistancas = $em->getRepository('AiadBundle:SettingsDistanca')->findAll();

        return $this->render('settingsdistanca/index.html.twig', array(
            'settingsDistancas' => $settingsDistancas,
        ));
    }

    /**
     * Creates a new SettingsDistanca entity.
     *
     * @Route("/new", name="settingsdistanca_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsDistanca = new SettingsDistanca();
        $form = $this->createForm('AiadBundle\Form\SettingsDistancaType', $settingsDistanca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsDistanca);
            $em->flush();

            return $this->redirectToRoute('settingsdistanca_index');
        }

        return $this->render('settingsdistanca/new.html.twig', array(
            'settingsDistanca' => $settingsDistanca,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsDistanca entity.
     *
     * @Route("/{id}", name="settingsdistanca_show")
     * @Method("GET")
     */
    public function showAction(SettingsDistanca $settingsDistanca)
    {
        $deleteForm = $this->createDeleteForm($settingsDistanca);

        return $this->render('settingsdistanca/show.html.twig', array(
            'settingsDistanca' => $settingsDistanca,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsDistanca entity.
     *
     * @Route("/{id}/edit", name="settingsdistanca_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsDistanca $settingsDistanca)
    {
        $deleteForm = $this->createDeleteForm($settingsDistanca);
        $editForm = $this->createForm('AiadBundle\Form\SettingsDistancaType', $settingsDistanca);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsDistanca);
            $em->flush();

            return $this->redirectToRoute('settingsdistanca_index');
        }

        return $this->render('settingsdistanca/edit.html.twig', array(
            'settingsDistanca' => $settingsDistanca,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsDistanca entity.
     *
     * @Route("/{id}", name="settingsdistanca_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsDistanca $settingsDistanca)
    {
        $form = $this->createDeleteForm($settingsDistanca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsDistanca);
            $em->flush();
        }

        return $this->redirectToRoute('settingsdistanca_index');
    }

    /**
     * Creates a form to delete a SettingsDistanca entity.
     *
     * @param SettingsDistanca $settingsDistanca The SettingsDistanca entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsDistanca $settingsDistanca)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsdistanca_delete', array('id' => $settingsDistanca->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
