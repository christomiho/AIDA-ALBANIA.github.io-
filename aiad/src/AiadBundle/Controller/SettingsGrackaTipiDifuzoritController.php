<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsGrackaTipiDifuzorit;
use AiadBundle\Form\SettingsGrackaTipiDifuzoritType;

/**
 * SettingsGrackaTipiDifuzorit controller.
 *
 * @Route("/konfigurime/gracka_tipi_difuzorit")
 */
class SettingsGrackaTipiDifuzoritController extends Controller
{
    /**
     * Lists all SettingsGrackaTipiDifuzorit entities.
     *
     * @Route("/", name="settingsgrackatipidifuzorit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsGrackaTipiDifuzorits = $em->getRepository('AiadBundle:SettingsGrackaTipiDifuzorit')->findAll();

        return $this->render('settingsgrackatipidifuzorit/index.html.twig', array(
            'settingsGrackaTipiDifuzorits' => $settingsGrackaTipiDifuzorits,
        ));
    }

    /**
     * Creates a new SettingsGrackaTipiDifuzorit entity.
     *
     * @Route("/new", name="settingsgrackatipidifuzorit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsGrackaTipiDifuzorit = new SettingsGrackaTipiDifuzorit();
        $form = $this->createForm('AiadBundle\Form\SettingsGrackaTipiDifuzoritType', $settingsGrackaTipiDifuzorit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaTipiDifuzorit);
            $em->flush();

            return $this->redirectToRoute('settingsgrackatipidifuzorit_index');
        }

        return $this->render('settingsgrackatipidifuzorit/new.html.twig', array(
            'settingsGrackaTipiDifuzorit' => $settingsGrackaTipiDifuzorit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsGrackaTipiDifuzorit entity.
     *
     * @Route("/{id}", name="settingsgrackatipidifuzorit_show")
     * @Method("GET")
     */
    public function showAction(SettingsGrackaTipiDifuzorit $settingsGrackaTipiDifuzorit)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaTipiDifuzorit);

        return $this->render('settingsgrackatipidifuzorit/show.html.twig', array(
            'settingsGrackaTipiDifuzorit' => $settingsGrackaTipiDifuzorit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsGrackaTipiDifuzorit entity.
     *
     * @Route("/{id}/edit", name="settingsgrackatipidifuzorit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsGrackaTipiDifuzorit $settingsGrackaTipiDifuzorit)
    {
        $deleteForm = $this->createDeleteForm($settingsGrackaTipiDifuzorit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsGrackaTipiDifuzoritType', $settingsGrackaTipiDifuzorit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsGrackaTipiDifuzorit);
            $em->flush();

            return $this->redirectToRoute('settingsgrackatipidifuzorit_index');
        }

        return $this->render('settingsgrackatipidifuzorit/edit.html.twig', array(
            'settingsGrackaTipiDifuzorit' => $settingsGrackaTipiDifuzorit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsGrackaTipiDifuzorit entity.
     *
     * @Route("/{id}", name="settingsgrackatipidifuzorit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsGrackaTipiDifuzorit $settingsGrackaTipiDifuzorit)
    {
        $form = $this->createDeleteForm($settingsGrackaTipiDifuzorit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsGrackaTipiDifuzorit);
            $em->flush();
        }

        return $this->redirectToRoute('settingsgrackatipidifuzorit_index');
    }

    /**
     * Creates a form to delete a SettingsGrackaTipiDifuzorit entity.
     *
     * @param SettingsGrackaTipiDifuzorit $settingsGrackaTipiDifuzorit The SettingsGrackaTipiDifuzorit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsGrackaTipiDifuzorit $settingsGrackaTipiDifuzorit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsgrackatipidifuzorit_delete', array('id' => $settingsGrackaTipiDifuzorit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
