<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsLlojiMbetjeve;
use AiadBundle\Form\SettingsLlojiMbetjeveType;

/**
 * SettingsLlojiMbetjeve controller.
 *
 * @Route("/konfigurime/lloji_mbetjeve")
 */
class SettingsLlojiMbetjeveController extends Controller
{
    /**
     * Lists all SettingsLlojiMbetjeve entities.
     *
     * @Route("/", name="settingsllojimbetjeve_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsLlojiMbetjeves = $em->getRepository('AiadBundle:SettingsLlojiMbetjeve')->findAll();

        return $this->render('settingsllojimbetjeve/index.html.twig', array(
            'settingsLlojiMbetjeves' => $settingsLlojiMbetjeves,
        ));
    }

    /**
     * Creates a new SettingsLlojiMbetjeve entity.
     *
     * @Route("/new", name="settingsllojimbetjeve_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsLlojiMbetjeve = new SettingsLlojiMbetjeve();
        $form = $this->createForm('AiadBundle\Form\SettingsLlojiMbetjeveType', $settingsLlojiMbetjeve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsLlojiMbetjeve);
            $em->flush();

            return $this->redirectToRoute('settingsllojimbetjeve_index');
        }

        return $this->render('settingsllojimbetjeve/new.html.twig', array(
            'settingsLlojiMbetjeve' => $settingsLlojiMbetjeve,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsLlojiMbetjeve entity.
     *
     * @Route("/{id}", name="settingsllojimbetjeve_show")
     * @Method("GET")
     */
    public function showAction(SettingsLlojiMbetjeve $settingsLlojiMbetjeve)
    {
        $deleteForm = $this->createDeleteForm($settingsLlojiMbetjeve);

        return $this->render('settingsllojimbetjeve/show.html.twig', array(
            'settingsLlojiMbetjeve' => $settingsLlojiMbetjeve,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsLlojiMbetjeve entity.
     *
     * @Route("/{id}/edit", name="settingsllojimbetjeve_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsLlojiMbetjeve $settingsLlojiMbetjeve)
    {
        $deleteForm = $this->createDeleteForm($settingsLlojiMbetjeve);
        $editForm = $this->createForm('AiadBundle\Form\SettingsLlojiMbetjeveType', $settingsLlojiMbetjeve);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsLlojiMbetjeve);
            $em->flush();

            return $this->redirectToRoute('settingsllojimbetjeve_index');
        }

        return $this->render('settingsllojimbetjeve/edit.html.twig', array(
            'settingsLlojiMbetjeve' => $settingsLlojiMbetjeve,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsLlojiMbetjeve entity.
     *
     * @Route("/{id}", name="settingsllojimbetjeve_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsLlojiMbetjeve $settingsLlojiMbetjeve)
    {
        $form = $this->createDeleteForm($settingsLlojiMbetjeve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsLlojiMbetjeve);
            $em->flush();
        }

        return $this->redirectToRoute('settingsllojimbetjeve_index');
    }

    /**
     * Creates a form to delete a SettingsLlojiMbetjeve entity.
     *
     * @param SettingsLlojiMbetjeve $settingsLlojiMbetjeve The SettingsLlojiMbetjeve entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsLlojiMbetjeve $settingsLlojiMbetjeve)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsllojimbetjeve_delete', array('id' => $settingsLlojiMbetjeve->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
