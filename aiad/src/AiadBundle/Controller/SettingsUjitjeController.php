<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsUjitje;
use AiadBundle\Form\SettingsUjitjeType;

/**
 * SettingsUjitje controller.
 *
 * @Route("/konfigurime/ujitje")
 */
class SettingsUjitjeController extends Controller
{
    /**
     * Lists all SettingsUjitje entities.
     *
     * @Route("/", name="settingsujitje_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsUjitjes = $em->getRepository('AiadBundle:SettingsUjitje')->findAll();

        return $this->render('settingsujitje/index.html.twig', array(
            'settingsUjitjes' => $settingsUjitjes,
        ));
    }

    /**
     * Creates a new SettingsUjitje entity.
     *
     * @Route("/new", name="settingsujitje_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsUjitje = new SettingsUjitje();
        $form = $this->createForm('AiadBundle\Form\SettingsUjitjeType', $settingsUjitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsUjitje);
            $em->flush();

            return $this->redirectToRoute('settingsujitje_index');
        }

        return $this->render('settingsujitje/new.html.twig', array(
            'settingsUjitje' => $settingsUjitje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsUjitje entity.
     *
     * @Route("/{id}", name="settingsujitje_show")
     * @Method("GET")
     */
    public function showAction(SettingsUjitje $settingsUjitje)
    {
        $deleteForm = $this->createDeleteForm($settingsUjitje);

        return $this->render('settingsujitje/show.html.twig', array(
            'settingsUjitje' => $settingsUjitje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsUjitje entity.
     *
     * @Route("/{id}/edit", name="settingsujitje_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsUjitje $settingsUjitje)
    {
        $deleteForm = $this->createDeleteForm($settingsUjitje);
        $editForm = $this->createForm('AiadBundle\Form\SettingsUjitjeType', $settingsUjitje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsUjitje);
            $em->flush();

            return $this->redirectToRoute('settingsujitje_index');
        }

        return $this->render('settingsujitje/edit.html.twig', array(
            'settingsUjitje' => $settingsUjitje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsUjitje entity.
     *
     * @Route("/{id}", name="settingsujitje_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsUjitje $settingsUjitje)
    {
        $form = $this->createDeleteForm($settingsUjitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsUjitje);
            $em->flush();
        }

        return $this->redirectToRoute('settingsujitje_index');
    }

    /**
     * Creates a form to delete a SettingsUjitje entity.
     *
     * @param SettingsUjitje $settingsUjitje The SettingsUjitje entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsUjitje $settingsUjitje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsujitje_delete', array('id' => $settingsUjitje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
