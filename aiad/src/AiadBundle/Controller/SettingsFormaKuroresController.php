<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsFormaKurores;
use AiadBundle\Form\SettingsFormaKuroresType;

/**
 * SettingsFormaKurores controller.
 *
 * @Route("/konfigurime/forma_kurores")
 */
class SettingsFormaKuroresController extends Controller
{
    /**
     * Lists all SettingsFormaKurores entities.
     *
     * @Route("/", name="settingsformakurores_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsFormaKurores = $em->getRepository('AiadBundle:SettingsFormaKurores')->findAll();

        return $this->render('settingsformakurores/index.html.twig', array(
            'settingsFormaKurores' => $settingsFormaKurores,
        ));
    }

    /**
     * Creates a new SettingsFormaKurores entity.
     *
     * @Route("/new", name="settingsformakurores_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsFormaKurore = new SettingsFormaKurores();
        $form = $this->createForm('AiadBundle\Form\SettingsFormaKuroresType', $settingsFormaKurore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsFormaKurore);
            $em->flush();

            return $this->redirectToRoute('settingsformakurores_index');
        }

        return $this->render('settingsformakurores/new.html.twig', array(
            'settingsFormaKurore' => $settingsFormaKurore,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsFormaKurores entity.
     *
     * @Route("/{id}", name="settingsformakurores_show")
     * @Method("GET")
     */
    public function showAction(SettingsFormaKurores $settingsFormaKurore)
    {
        $deleteForm = $this->createDeleteForm($settingsFormaKurore);

        return $this->render('settingsformakurores/show.html.twig', array(
            'settingsFormaKurore' => $settingsFormaKurore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsFormaKurores entity.
     *
     * @Route("/{id}/edit", name="settingsformakurores_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsFormaKurores $settingsFormaKurore)
    {
        $deleteForm = $this->createDeleteForm($settingsFormaKurore);
        $editForm = $this->createForm('AiadBundle\Form\SettingsFormaKuroresType', $settingsFormaKurore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsFormaKurore);
            $em->flush();

            return $this->redirectToRoute('settingsformakurores_index');
        }

        return $this->render('settingsformakurores/edit.html.twig', array(
            'settingsFormaKurore' => $settingsFormaKurore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsFormaKurores entity.
     *
     * @Route("/{id}", name="settingsformakurores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsFormaKurores $settingsFormaKurore)
    {
        $form = $this->createDeleteForm($settingsFormaKurore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsFormaKurore);
            $em->flush();
        }

        return $this->redirectToRoute('settingsformakurores_index');
    }

    /**
     * Creates a form to delete a SettingsFormaKurores entity.
     *
     * @param SettingsFormaKurores $settingsFormaKurore The SettingsFormaKurores entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsFormaKurores $settingsFormaKurore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsformakurores_delete', array('id' => $settingsFormaKurore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
