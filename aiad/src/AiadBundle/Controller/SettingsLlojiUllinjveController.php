<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsLlojiUllinjve;
use AiadBundle\Form\SettingsLlojiUllinjveType;

/**
 * SettingsLlojiUllinjve controller.
 *
 * @Route("/konfigurime/lloji_ullinjve")
 */
class SettingsLlojiUllinjveController extends Controller
{
    /**
     * Lists all SettingsLlojiUllinjve entities.
     *
     * @Route("/", name="settingsllojiullinjve_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsLlojiUllinjves = $em->getRepository('AiadBundle:SettingsLlojiUllinjve')->findAll();

        return $this->render('settingsllojiullinjve/index.html.twig', array(
            'settingsLlojiUllinjves' => $settingsLlojiUllinjves,
        ));
    }

    /**
     * Creates a new SettingsLlojiUllinjve entity.
     *
     * @Route("/new", name="settingsllojiullinjve_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsLlojiUllinjve = new SettingsLlojiUllinjve();
        $form = $this->createForm('AiadBundle\Form\SettingsLlojiUllinjveType', $settingsLlojiUllinjve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsLlojiUllinjve);
            $em->flush();

            return $this->redirectToRoute('settingsllojiullinjve_index');
        }

        return $this->render('settingsllojiullinjve/new.html.twig', array(
            'settingsLlojiUllinjve' => $settingsLlojiUllinjve,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsLlojiUllinjve entity.
     *
     * @Route("/{id}", name="settingsllojiullinjve_show")
     * @Method("GET")
     */
    public function showAction(SettingsLlojiUllinjve $settingsLlojiUllinjve)
    {
        $deleteForm = $this->createDeleteForm($settingsLlojiUllinjve);

        return $this->render('settingsllojiullinjve/show.html.twig', array(
            'settingsLlojiUllinjve' => $settingsLlojiUllinjve,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsLlojiUllinjve entity.
     *
     * @Route("/{id}/edit", name="settingsllojiullinjve_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsLlojiUllinjve $settingsLlojiUllinjve)
    {
        $deleteForm = $this->createDeleteForm($settingsLlojiUllinjve);
        $editForm = $this->createForm('AiadBundle\Form\SettingsLlojiUllinjveType', $settingsLlojiUllinjve);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsLlojiUllinjve);
            $em->flush();

            return $this->redirectToRoute('settingsllojiullinjve_index');
        }

        return $this->render('settingsllojiullinjve/edit.html.twig', array(
            'settingsLlojiUllinjve' => $settingsLlojiUllinjve,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsLlojiUllinjve entity.
     *
     * @Route("/{id}", name="settingsllojiullinjve_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsLlojiUllinjve $settingsLlojiUllinjve)
    {
        $form = $this->createDeleteForm($settingsLlojiUllinjve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsLlojiUllinjve);
            $em->flush();
        }

        return $this->redirectToRoute('settingsllojiullinjve_index');
    }

    /**
     * Creates a form to delete a SettingsLlojiUllinjve entity.
     *
     * @param SettingsLlojiUllinjve $settingsLlojiUllinjve The SettingsLlojiUllinjve entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsLlojiUllinjve $settingsLlojiUllinjve)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsllojiullinjve_delete', array('id' => $settingsLlojiUllinjve->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
