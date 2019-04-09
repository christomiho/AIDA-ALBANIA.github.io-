<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsTipiPunimit;
use AiadBundle\Form\SettingsTipiPunimitType;

/**
 * SettingsTipiPunimit controller.
 *
 * @Route("/konfigurime/tipi_punimit")
 */
class SettingsTipiPunimitController extends Controller
{
    /**
     * Lists all SettingsTipiPunimit entities.
     *
     * @Route("/", name="settingstipipunimit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsTipiPunimits = $em->getRepository('AiadBundle:SettingsTipiPunimit')->findAll();

        return $this->render('settingstipipunimit/index.html.twig', array(
            'settingsTipiPunimits' => $settingsTipiPunimits,
        ));
    }

    /**
     * Creates a new SettingsTipiPunimit entity.
     *
     * @Route("/new", name="settingstipipunimit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsTipiPunimit = new SettingsTipiPunimit();
        $form = $this->createForm('AiadBundle\Form\SettingsTipiPunimitType', $settingsTipiPunimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsTipiPunimit);
            $em->flush();

            return $this->redirectToRoute('settingstipipunimit_index');
        }

        return $this->render('settingstipipunimit/new.html.twig', array(
            'settingsTipiPunimit' => $settingsTipiPunimit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsTipiPunimit entity.
     *
     * @Route("/{id}", name="settingstipipunimit_show")
     * @Method("GET")
     */
    public function showAction(SettingsTipiPunimit $settingsTipiPunimit)
    {
        $deleteForm = $this->createDeleteForm($settingsTipiPunimit);

        return $this->render('settingstipipunimit/show.html.twig', array(
            'settingsTipiPunimit' => $settingsTipiPunimit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsTipiPunimit entity.
     *
     * @Route("/{id}/edit", name="settingstipipunimit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsTipiPunimit $settingsTipiPunimit)
    {
        $deleteForm = $this->createDeleteForm($settingsTipiPunimit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsTipiPunimitType', $settingsTipiPunimit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsTipiPunimit);
            $em->flush();

            return $this->redirectToRoute('settingstipipunimit_index');
        }

        return $this->render('settingstipipunimit/edit.html.twig', array(
            'settingsTipiPunimit' => $settingsTipiPunimit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsTipiPunimit entity.
     *
     * @Route("/{id}", name="settingstipipunimit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsTipiPunimit $settingsTipiPunimit)
    {
        $form = $this->createDeleteForm($settingsTipiPunimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsTipiPunimit);
            $em->flush();
        }

        return $this->redirectToRoute('settingstipipunimit_index');
    }

    /**
     * Creates a form to delete a SettingsTipiPunimit entity.
     *
     * @param SettingsTipiPunimit $settingsTipiPunimit The SettingsTipiPunimit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsTipiPunimit $settingsTipiPunimit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingstipipunimit_delete', array('id' => $settingsTipiPunimit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
