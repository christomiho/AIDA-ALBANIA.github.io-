<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsGrackaFerromoni;
use AiadBundle\Form\SettingsGrackaFerromoniType;

/**
 * SettingsGrackaFerromoni controller.
 *
 * @Route("/konfigurime/gracka_ferromoni")
 */
class SettingsGrackaFerromoniController extends Controller
{
    /**
     * Lists all SettingsGrackaFerromoni entities.
     *
     * @Route("/", name="settingsgrackaferromoni_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsGrackaFerromonis = $em->getRepository('AiadBundle:SettingsGrackaFerromoni')->findAll();

        return $this->render('settingsgrackaferromoni/index.html.twig', array(
            'settingsGrackaFerromonis' => $settingsGrackaFerromonis,
        ));
    }

    /**
     * Creates a new SettingsGrackaFerromoni entity.
     *
     * @Route("/new", name="settingsgrackaferromoni_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsGrackaFerromoni = new SettingsGrackaFerromoni();
        $form = $this->createForm('AiadBundle\Form\SettingsGrackaFerromoniType', $settingsGrackaFerromoni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaFerromoni);
            $em->flush();

            return $this->redirectToRoute('settingsgrackaferromoni_index');
        }

        return $this->render('settingsgrackaferromoni/new.html.twig', array(
            'settingsGrackaFerromoni' => $settingsGrackaFerromoni,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsGrackaFerromoni entity.
     *
     * @Route("/{id}", name="settingsgrackaferromoni_show")
     * @Method("GET")
     */
    public function showAction(SettingsGrackaFerromoni $settingsGrackaFerromoni)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaFerromoni);

        return $this->render('settingsgrackaferromoni/show.html.twig', array(
            'settingsGrackaFerromoni' => $settingsGrackaFerromoni,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsGrackaFerromoni entity.
     *
     * @Route("/{id}/edit", name="settingsgrackaferromoni_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsGrackaFerromoni $settingsGrackaFerromoni)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaFerromoni);
        $editForm = $this->createForm('AiadBundle\Form\SettingsGrackaFerromoniType', $settingsGrackaFerromoni);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaFerromoni);
            $em->flush();

            return $this->redirectToRoute('settingsgrackaferromoni_index');
        }

        return $this->render('settingsgrackaferromoni/edit.html.twig', array(
            'settingsGrackaFerromoni' => $settingsGrackaFerromoni,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsGrackaFerromoni entity.
     *
     * @Route("/{id}", name="settingsgrackaferromoni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsGrackaFerromoni $settingsGrackaFerromoni)
    {
        $form = $this->createDeleteForm($settingsGrackaFerromoni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsGrackaFerromoni);
            $em->flush();
        }

        return $this->redirectToRoute('settingsgrackaferromoni_index');
    }

    /**
     * Creates a form to delete a SettingsGrackaFerromoni entity.
     *
     * @param SettingsGrackaFerromoni $settingsGrackaFerromoni The SettingsGrackaFerromoni entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsGrackaFerromoni $settingsGrackaFerromoni)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsgrackaferromoni_delete', array('id' => $settingsGrackaFerromoni->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
