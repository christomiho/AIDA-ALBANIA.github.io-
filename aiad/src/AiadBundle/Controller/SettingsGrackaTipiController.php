<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsGrackaTipi;
use AiadBundle\Form\SettingsGrackaTipiType;

/**
 * SettingsGrackaTipi controller.
 *
 * @Route("/konfigurime/gracka_tipi")
 */
class SettingsGrackaTipiController extends Controller
{
    /**
     * Lists all SettingsGrackaTipi entities.
     *
     * @Route("/", name="settingsgrackatipi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsGrackaTipis = $em->getRepository('AiadBundle:SettingsGrackaTipi')->findAll();

        return $this->render('settingsgrackatipi/index.html.twig', array(
            'settingsGrackaTipis' => $settingsGrackaTipis,
        ));
    }

    /**
     * Creates a new SettingsGrackaTipi entity.
     *
     * @Route("/new", name="settingsgrackatipi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsGrackaTipi = new SettingsGrackaTipi();
        $form = $this->createForm('AiadBundle\Form\SettingsGrackaTipiType', $settingsGrackaTipi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaTipi);
            $em->flush();

            return $this->redirectToRoute('settingsgrackatipi_index');
        }

        return $this->render('settingsgrackatipi/new.html.twig', array(
            'settingsGrackaTipi' => $settingsGrackaTipi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsGrackaTipi entity.
     *
     * @Route("/{id}", name="settingsgrackatipi_show")
     * @Method("GET")
     */
    public function showAction(SettingsGrackaTipi $settingsGrackaTipi)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaTipi);

        return $this->render('settingsgrackatipi/show.html.twig', array(
            'settingsGrackaTipi' => $settingsGrackaTipi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsGrackaTipi entity.
     *
     * @Route("/{id}/edit", name="settingsgrackatipi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsGrackaTipi $settingsGrackaTipi)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaTipi);
        $editForm = $this->createForm('AiadBundle\Form\SettingsGrackaTipiType', $settingsGrackaTipi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaTipi);
            $em->flush();

            return $this->redirectToRoute('settingsgrackatipi_index');
        }

        return $this->render('settingsgrackatipi/edit.html.twig', array(
            'settingsGrackaTipi' => $settingsGrackaTipi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsGrackaTipi entity.
     *
     * @Route("/{id}", name="settingsgrackatipi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsGrackaTipi $settingsGrackaTipi)
    {
        $form = $this->createDeleteForm($settingsGrackaTipi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsGrackaTipi);
            $em->flush();
        }

        return $this->redirectToRoute('settingsgrackatipi_index');
    }

    /**
     * Creates a form to delete a SettingsGrackaTipi entity.
     *
     * @param SettingsGrackaTipi $settingsGrackaTipi The SettingsGrackaTipi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsGrackaTipi $settingsGrackaTipi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsgrackatipi_delete', array('id' => $settingsGrackaTipi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
