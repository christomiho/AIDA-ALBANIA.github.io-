<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsKrasitjeProduktiDizinfektues;
use AiadBundle\Form\SettingsKrasitjeProduktiDizinfektuesType;

/**
 * SettingsKrasitjeProduktiDizinfektues controller.
 *
 * @Route("/konfigurime/krasitje_produkti_dizinfektues")
 */
class SettingsKrasitjeProduktiDizinfektuesController extends Controller
{
    /**
     * Lists all SettingsKrasitjeProduktiDizinfektues entities.
     *
     * @Route("/", name="settingskrasitjeproduktidizinfektues_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsKrasitjeProduktiDizinfektues = $em->getRepository('AiadBundle:SettingsKrasitjeProduktiDizinfektues')->findAll();

        return $this->render('settingskrasitjeproduktidizinfektues/index.html.twig', array(
            'settingsKrasitjeProduktiDizinfektues' => $settingsKrasitjeProduktiDizinfektues,
        ));
    }

    /**
     * Creates a new SettingsKrasitjeProduktiDizinfektues entity.
     *
     * @Route("/new", name="settingskrasitjeproduktidizinfektues_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsKrasitjeProduktiDizinfektue = new SettingsKrasitjeProduktiDizinfektues();
        $form = $this->createForm('AiadBundle\Form\SettingsKrasitjeProduktiDizinfektuesType', $settingsKrasitjeProduktiDizinfektue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsKrasitjeProduktiDizinfektue);
            $em->flush();

            return $this->redirectToRoute('settingskrasitjeproduktidizinfektues_index');
        }

        return $this->render('settingskrasitjeproduktidizinfektues/new.html.twig', array(
            'settingsKrasitjeProduktiDizinfektue' => $settingsKrasitjeProduktiDizinfektue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsKrasitjeProduktiDizinfektues entity.
     *
     * @Route("/{id}", name="settingskrasitjeproduktidizinfektues_show")
     * @Method("GET")
     */
    public function showAction(SettingsKrasitjeProduktiDizinfektues $settingsKrasitjeProduktiDizinfektue)
    {
        $deleteForm = $this->createDeleteForm($settingsKrasitjeProduktiDizinfektue);

        return $this->render('settingskrasitjeproduktidizinfektues/show.html.twig', array(
            'settingsKrasitjeProduktiDizinfektue' => $settingsKrasitjeProduktiDizinfektue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsKrasitjeProduktiDizinfektues entity.
     *
     * @Route("/{id}/edit", name="settingskrasitjeproduktidizinfektues_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsKrasitjeProduktiDizinfektues $settingsKrasitjeProduktiDizinfektue)
    {
        $deleteForm = $this->createDeleteForm($settingsKrasitjeProduktiDizinfektue);
        $editForm = $this->createForm('AiadBundle\Form\SettingsKrasitjeProduktiDizinfektuesType', $settingsKrasitjeProduktiDizinfektue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsKrasitjeProduktiDizinfektue);
            $em->flush();

            return $this->redirectToRoute('settingskrasitjeproduktidizinfektues_index');
        }

        return $this->render('settingskrasitjeproduktidizinfektues/edit.html.twig', array(
            'settingsKrasitjeProduktiDizinfektue' => $settingsKrasitjeProduktiDizinfektue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsKrasitjeProduktiDizinfektues entity.
     *
     * @Route("/{id}", name="settingskrasitjeproduktidizinfektues_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsKrasitjeProduktiDizinfektues $settingsKrasitjeProduktiDizinfektue)
    {
        $form = $this->createDeleteForm($settingsKrasitjeProduktiDizinfektue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsKrasitjeProduktiDizinfektue);
            $em->flush();
        }

        return $this->redirectToRoute('settingskrasitjeproduktidizinfektues_index');
    }

    /**
     * Creates a form to delete a SettingsKrasitjeProduktiDizinfektues entity.
     *
     * @param SettingsKrasitjeProduktiDizinfektues $settingsKrasitjeProduktiDizinfektue The SettingsKrasitjeProduktiDizinfektues entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsKrasitjeProduktiDizinfektues $settingsKrasitjeProduktiDizinfektue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingskrasitjeproduktidizinfektues_delete', array('id' => $settingsKrasitjeProduktiDizinfektue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
