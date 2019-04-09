<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsPleherimiTipi;
use AiadBundle\Form\SettingsPleherimiTipiType;

/**
 * SettingsPleherimiTipi controller.
 *
 * @Route("/konfigurime/pleherimi_tipi")
 */
class SettingsPleherimiTipiController extends Controller
{
    /**
     * Lists all SettingsPleherimiTipi entities.
     *
     * @Route("/", name="settingspleherimitipi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsPleherimiTipis = $em->getRepository('AiadBundle:SettingsPleherimiTipi')->findAll();

        return $this->render('settingspleherimitipi/index.html.twig', array(
            'settingsPleherimiTipis' => $settingsPleherimiTipis,
        ));
    }

    /**
     * Creates a new SettingsPleherimiTipi entity.
     *
     * @Route("/new", name="settingspleherimitipi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsPleherimiTipi = new SettingsPleherimiTipi();
        $form = $this->createForm('AiadBundle\Form\SettingsPleherimiTipiType', $settingsPleherimiTipi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsPleherimiTipi);
            $em->flush();

            return $this->redirectToRoute('settingspleherimitipi_index');
        }

        return $this->render('settingspleherimitipi/new.html.twig', array(
            'settingsPleherimiTipi' => $settingsPleherimiTipi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsPleherimiTipi entity.
     *
     * @Route("/{id}", name="settingspleherimitipi_show")
     * @Method("GET")
     */
    public function showAction(SettingsPleherimiTipi $settingsPleherimiTipi)
    {
        $deleteForm = $this->createDeleteForm($settingsPleherimiTipi);

        return $this->render('settingspleherimitipi/show.html.twig', array(
            'settingsPleherimiTipi' => $settingsPleherimiTipi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsPleherimiTipi entity.
     *
     * @Route("/{id}/edit", name="settingspleherimitipi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsPleherimiTipi $settingsPleherimiTipi)
    {
        $deleteForm = $this->createDeleteForm($settingsPleherimiTipi);
        $editForm = $this->createForm('AiadBundle\Form\SettingsPleherimiTipiType', $settingsPleherimiTipi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsPleherimiTipi);
            $em->flush();

            return $this->redirectToRoute('settingspleherimitipi_index');
        }

        return $this->render('settingspleherimitipi/edit.html.twig', array(
            'settingsPleherimiTipi' => $settingsPleherimiTipi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsPleherimiTipi entity.
     *
     * @Route("/{id}", name="settingspleherimitipi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsPleherimiTipi $settingsPleherimiTipi)
    {
        $form = $this->createDeleteForm($settingsPleherimiTipi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsPleherimiTipi);
            $em->flush();
        }

        return $this->redirectToRoute('settingspleherimitipi_index');
    }

    /**
     * Creates a form to delete a SettingsPleherimiTipi entity.
     *
     * @param SettingsPleherimiTipi $settingsPleherimiTipi The SettingsPleherimiTipi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsPleherimiTipi $settingsPleherimiTipi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingspleherimitipi_delete', array('id' => $settingsPleherimiTipi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
