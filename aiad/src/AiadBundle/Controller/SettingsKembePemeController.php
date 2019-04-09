<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsKembePeme;
use AiadBundle\Form\SettingsKembePemeType;

/**
 * SettingsKembePeme controller.
 *
 * @Route("/konfigurime/kembe_peme")
 */
class SettingsKembePemeController extends Controller
{
    /**
     * Lists all SettingsKembePeme entities.
     *
     * @Route("/", name="settingskembepeme_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsKembePemes = $em->getRepository('AiadBundle:SettingsKembePeme')->findAll();

        return $this->render('settingskembepeme/index.html.twig', array(
            'settingsKembePemes' => $settingsKembePemes,
        ));
    }

    /**
     * Creates a new SettingsKembePeme entity.
     *
     * @Route("/new", name="settingskembepeme_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsKembePeme = new SettingsKembePeme();
        $form = $this->createForm('AiadBundle\Form\SettingsKembePemeType', $settingsKembePeme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsKembePeme);
            $em->flush();

            return $this->redirectToRoute('settingskembepeme_index');
        }

        return $this->render('settingskembepeme/new.html.twig', array(
            'settingsKembePeme' => $settingsKembePeme,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsKembePeme entity.
     *
     * @Route("/{id}", name="settingskembepeme_show")
     * @Method("GET")
     */
    public function showAction(SettingsKembePeme $settingsKembePeme)
    {
        $deleteForm = $this->createDeleteForm($settingsKembePeme);

        return $this->render('settingskembepeme/show.html.twig', array(
            'settingsKembePeme' => $settingsKembePeme,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsKembePeme entity.
     *
     * @Route("/{id}/edit", name="settingskembepeme_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsKembePeme $settingsKembePeme)
    {
        $deleteForm = $this->createDeleteForm($settingsKembePeme);
        $editForm = $this->createForm('AiadBundle\Form\SettingsKembePemeType', $settingsKembePeme);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsKembePeme);
            $em->flush();

            return $this->redirectToRoute('settingskembepeme_index');
        }

        return $this->render('settingskembepeme/edit.html.twig', array(
            'settingsKembePeme' => $settingsKembePeme,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsKembePeme entity.
     *
     * @Route("/{id}", name="settingskembepeme_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsKembePeme $settingsKembePeme)
    {
        $form = $this->createDeleteForm($settingsKembePeme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsKembePeme);
            $em->flush();
        }

        return $this->redirectToRoute('settingskembepeme_index');
    }

    /**
     * Creates a form to delete a SettingsKembePeme entity.
     *
     * @param SettingsKembePeme $settingsKembePeme The SettingsKembePeme entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsKembePeme $settingsKembePeme)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingskembepeme_delete', array('id' => $settingsKembePeme->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
