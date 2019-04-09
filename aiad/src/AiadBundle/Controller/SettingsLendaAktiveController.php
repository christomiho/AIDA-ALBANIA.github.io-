<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsLendaAktive;
use AiadBundle\Form\SettingsLendaAktiveType;

/**
 * SettingsLendaAktive controller.
 *
 * @Route("/konfigurime/lenda_aktive")
 */
class SettingsLendaAktiveController extends Controller
{
    /**
     * Lists all SettingsLendaAktive entities.
     *
     * @Route("/", name="settingslendaaktive_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsLendaAktives = $em->getRepository('AiadBundle:SettingsLendaAktive')->findAll();

        return $this->render('settingslendaaktive/index.html.twig', array(
            'settingsLendaAktives' => $settingsLendaAktives,
        ));
    }

    /**
     * Creates a new SettingsLendaAktive entity.
     *
     * @Route("/new", name="settingslendaaktive_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsLendaAktive = new SettingsLendaAktive();
        $form = $this->createForm('AiadBundle\Form\SettingsLendaAktiveType', $settingsLendaAktive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsLendaAktive);
            $em->flush();

            return $this->redirectToRoute('settingslendaaktive_show', array('id' => $settingsLendaAktive->getId()));
        }

        return $this->render('settingslendaaktive/new.html.twig', array(
            'settingsLendaAktive' => $settingsLendaAktive,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsLendaAktive entity.
     *
     * @Route("/{id}", name="settingslendaaktive_show")
     * @Method("GET")
     */
    public function showAction(SettingsLendaAktive $settingsLendaAktive)
    {
        $deleteForm = $this->createDeleteForm($settingsLendaAktive);

        return $this->render('settingslendaaktive/show.html.twig', array(
            'settingsLendaAktive' => $settingsLendaAktive,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsLendaAktive entity.
     *
     * @Route("/{id}/edit", name="settingslendaaktive_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsLendaAktive $settingsLendaAktive)
    {
        $deleteForm = $this->createDeleteForm($settingsLendaAktive);
        $editForm = $this->createForm('AiadBundle\Form\SettingsLendaAktiveType', $settingsLendaAktive);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsLendaAktive);
            $em->flush();

            return $this->redirectToRoute('settingslendaaktive_edit', array('id' => $settingsLendaAktive->getId()));
        }

        return $this->render('settingslendaaktive/edit.html.twig', array(
            'settingsLendaAktive' => $settingsLendaAktive,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsLendaAktive entity.
     *
     * @Route("/{id}", name="settingslendaaktive_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsLendaAktive $settingsLendaAktive)
    {
        $form = $this->createDeleteForm($settingsLendaAktive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsLendaAktive);
            $em->flush();
        }

        return $this->redirectToRoute('settingslendaaktive_index');
    }

    /**
     * Creates a form to delete a SettingsLendaAktive entity.
     *
     * @param SettingsLendaAktive $settingsLendaAktive The SettingsLendaAktive entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsLendaAktive $settingsLendaAktive)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingslendaaktive_delete', array('id' => $settingsLendaAktive->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
