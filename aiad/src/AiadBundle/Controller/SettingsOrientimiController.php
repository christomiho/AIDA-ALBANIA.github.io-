<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsOrientimi;
use AiadBundle\Form\SettingsOrientimiType;

/**
 * SettingsOrientimi controller.
 *
 * @Route("/konfigurime/orientimi")
 */
class SettingsOrientimiController extends Controller
{
    /**
     * Lists all SettingsOrientimi entities.
     *
     * @Route("/", name="settingsorientimi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsOrientimis = $em->getRepository('AiadBundle:SettingsOrientimi')->findAll();

        return $this->render('settingsorientimi/index.html.twig', array(
            'settingsOrientimis' => $settingsOrientimis,
        ));
    }

    /**
     * Creates a new SettingsOrientimi entity.
     *
     * @Route("/new", name="settingsorientimi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsOrientimi = new SettingsOrientimi();
        $form = $this->createForm('AiadBundle\Form\SettingsOrientimiType', $settingsOrientimi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsOrientimi);
            $em->flush();

            return $this->redirectToRoute('settingsorientimi_index');
        }

        return $this->render('settingsorientimi/new.html.twig', array(
            'settingsOrientimi' => $settingsOrientimi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsOrientimi entity.
     *
     * @Route("/{id}", name="settingsorientimi_show")
     * @Method("GET")
     */
    public function showAction(SettingsOrientimi $settingsOrientimi)
    {
        $deleteForm = $this->createDeleteForm($settingsOrientimi);

        return $this->render('settingsorientimi/show.html.twig', array(
            'settingsOrientimi' => $settingsOrientimi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsOrientimi entity.
     *
     * @Route("/{id}/edit", name="settingsorientimi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsOrientimi $settingsOrientimi)
    {
        $deleteForm = $this->createDeleteForm($settingsOrientimi);
        $editForm = $this->createForm('AiadBundle\Form\SettingsOrientimiType', $settingsOrientimi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsOrientimi);
            $em->flush();

            return $this->redirectToRoute('settingsorientimi_index');
        }

        return $this->render('settingsorientimi/edit.html.twig', array(
            'settingsOrientimi' => $settingsOrientimi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsOrientimi entity.
     *
     * @Route("/{id}", name="settingsorientimi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsOrientimi $settingsOrientimi)
    {
        $form = $this->createDeleteForm($settingsOrientimi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsOrientimi);
            $em->flush();
        }

        return $this->redirectToRoute('settingsorientimi_index');
    }

    /**
     * Creates a form to delete a SettingsOrientimi entity.
     *
     * @param SettingsOrientimi $settingsOrientimi The SettingsOrientimi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsOrientimi $settingsOrientimi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsorientimi_delete', array('id' => $settingsOrientimi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
