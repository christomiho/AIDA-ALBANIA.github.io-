<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsDozaNjesia;
use AiadBundle\Form\SettingsDozaNjesiaType;

/**
 * SettingsDozaNjesia controller.
 *
 * @Route("/konfigurime/doza_njesia")
 */
class SettingsDozaNjesiaController extends Controller
{
    /**
     * Lists all SettingsDozaNjesia entities.
     *
     * @Route("/", name="settingsdozanjesia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsDozaNjesias = $em->getRepository('AiadBundle:SettingsDozaNjesia')->findAll();

        return $this->render('settingsdozanjesia/index.html.twig', array(
            'settingsDozaNjesias' => $settingsDozaNjesias,
        ));
    }

    /**
     * Creates a new SettingsDozaNjesia entity.
     *
     * @Route("/new", name="settingsdozanjesia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsDozaNjesium = new SettingsDozaNjesia();
        $form = $this->createForm('AiadBundle\Form\SettingsDozaNjesiaType', $settingsDozaNjesium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsDozaNjesium);
            $em->flush();

            return $this->redirectToRoute('settingsdozanjesia_show', array('id' => $settingsDozaNjesium->getId()));
        }

        return $this->render('settingsdozanjesia/new.html.twig', array(
            'settingsDozaNjesium' => $settingsDozaNjesium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsDozaNjesia entity.
     *
     * @Route("/{id}", name="settingsdozanjesia_show")
     * @Method("GET")
     */
    public function showAction(SettingsDozaNjesia $settingsDozaNjesium)
    {
        $deleteForm = $this->createDeleteForm($settingsDozaNjesium);

        return $this->render('settingsdozanjesia/show.html.twig', array(
            'settingsDozaNjesium' => $settingsDozaNjesium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsDozaNjesia entity.
     *
     * @Route("/{id}/edit", name="settingsdozanjesia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsDozaNjesia $settingsDozaNjesium)
    {
        $deleteForm = $this->createDeleteForm($settingsDozaNjesium);
        $editForm = $this->createForm('AiadBundle\Form\SettingsDozaNjesiaType', $settingsDozaNjesium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsDozaNjesium);
            $em->flush();

            return $this->redirectToRoute('settingsdozanjesia_edit', array('id' => $settingsDozaNjesium->getId()));
        }

        return $this->render('settingsdozanjesia/edit.html.twig', array(
            'settingsDozaNjesium' => $settingsDozaNjesium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsDozaNjesia entity.
     *
     * @Route("/{id}", name="settingsdozanjesia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsDozaNjesia $settingsDozaNjesium)
    {
        $form = $this->createDeleteForm($settingsDozaNjesium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsDozaNjesium);
            $em->flush();
        }

        return $this->redirectToRoute('settingsdozanjesia_index');
    }

    /**
     * Creates a form to delete a SettingsDozaNjesia entity.
     *
     * @param SettingsDozaNjesia $settingsDozaNjesium The SettingsDozaNjesia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsDozaNjesia $settingsDozaNjesium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsdozanjesia_delete', array('id' => $settingsDozaNjesium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
