<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsArsyeUjitje;
use AiadBundle\Form\SettingsArsyeUjitjeType;

/**
 * SettingsArsyeUjitje controller.
 *
 * @Route("/konfigurime/arsye_ujitje")
 */
class SettingsArsyeUjitjeController extends Controller
{
    /**
     * Lists all SettingsArsyeUjitje entities.
     *
     * @Route("/", name="settingsarsyeujitje_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsArsyeUjitjes = $em->getRepository('AiadBundle:SettingsArsyeUjitje')->findAll();

        return $this->render('settingsarsyeujitje/index.html.twig', array(
            'settingsArsyeUjitjes' => $settingsArsyeUjitjes,
        ));
    }

    /**
     * Creates a new SettingsArsyeUjitje entity.
     *
     * @Route("/new", name="settingsarsyeujitje_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsArsyeUjitje = new SettingsArsyeUjitje();
        $form = $this->createForm('AiadBundle\Form\SettingsArsyeUjitjeType', $settingsArsyeUjitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsArsyeUjitje);
            $em->flush();

            return $this->redirectToRoute('settingsarsyeujitje_index');
        }

        return $this->render('settingsarsyeujitje/new.html.twig', array(
            'settingsArsyeUjitje' => $settingsArsyeUjitje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsArsyeUjitje entity.
     *
     * @Route("/{id}", name="settingsarsyeujitje_show")
     * @Method("GET")
     */
    public function showAction(SettingsArsyeUjitje $settingsArsyeUjitje)
    {
        $deleteForm = $this->createDeleteForm($settingsArsyeUjitje);

        return $this->render('settingsarsyeujitje/show.html.twig', array(
            'settingsArsyeUjitje' => $settingsArsyeUjitje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsArsyeUjitje entity.
     *
     * @Route("/{id}/edit", name="settingsarsyeujitje_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsArsyeUjitje $settingsArsyeUjitje)
    {
        $deleteForm = $this->createDeleteForm($settingsArsyeUjitje);
        $editForm = $this->createForm('AiadBundle\Form\SettingsArsyeUjitjeType', $settingsArsyeUjitje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsArsyeUjitje);
            $em->flush();

            return $this->redirectToRoute('settingsarsyeujitje_index');
        }

        return $this->render('settingsarsyeujitje/edit.html.twig', array(
            'settingsArsyeUjitje' => $settingsArsyeUjitje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsArsyeUjitje entity.
     *
     * @Route("/{id}", name="settingsarsyeujitje_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsArsyeUjitje $settingsArsyeUjitje)
    {
        $form = $this->createDeleteForm($settingsArsyeUjitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsArsyeUjitje);
            $em->flush();
        }

        return $this->redirectToRoute('settingsarsyeujitje_index');
    }

    /**
     * Creates a form to delete a SettingsArsyeUjitje entity.
     *
     * @param SettingsArsyeUjitje $settingsArsyeUjitje The SettingsArsyeUjitje entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsArsyeUjitje $settingsArsyeUjitje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsarsyeujitje_delete', array('id' => $settingsArsyeUjitje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
