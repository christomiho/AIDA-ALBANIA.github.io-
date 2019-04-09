<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsMjete;
use AiadBundle\Form\SettingsMjeteType;

/**
 * SettingsMjete controller.
 *
 * @Route("/konfigurime/mjete")
 */
class SettingsMjeteController extends Controller
{
    /**
     * Lists all SettingsMjete entities.
     *
     * @Route("/", name="settingsmjete_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsMjetes = $em->getRepository('AiadBundle:SettingsMjete')->findAll();

        return $this->render('settingsmjete/index.html.twig', array(
            'settingsMjetes' => $settingsMjetes,
        ));
    }

    /**
     * Creates a new SettingsMjete entity.
     *
     * @Route("/new", name="settingsmjete_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsMjete = new SettingsMjete();
        $form = $this->createForm('AiadBundle\Form\SettingsMjeteType', $settingsMjete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMjete);
            $em->flush();

            return $this->redirectToRoute('settingsmjete_index');
        }

        return $this->render('settingsmjete/new.html.twig', array(
            'settingsMjete' => $settingsMjete,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsMjete entity.
     *
     * @Route("/{id}", name="settingsmjete_show")
     * @Method("GET")
     */
    public function showAction(SettingsMjete $settingsMjete)
    {
        $deleteForm = $this->createDeleteForm($settingsMjete);

        return $this->render('settingsmjete/show.html.twig', array(
            'settingsMjete' => $settingsMjete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsMjete entity.
     *
     * @Route("/{id}/edit", name="settingsmjete_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsMjete $settingsMjete)
    {
        $deleteForm = $this->createDeleteForm($settingsMjete);
        $editForm = $this->createForm('AiadBundle\Form\SettingsMjeteType', $settingsMjete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMjete);
            $em->flush();

            return $this->redirectToRoute('settingsmjete_index');
        }

        return $this->render('settingsmjete/edit.html.twig', array(
            'settingsMjete' => $settingsMjete,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsMjete entity.
     *
     * @Route("/{id}", name="settingsmjete_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsMjete $settingsMjete)
    {
        $form = $this->createDeleteForm($settingsMjete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsMjete);
            $em->flush();
        }

        return $this->redirectToRoute('settingsmjete_index');
    }

    /**
     * Creates a form to delete a SettingsMjete entity.
     *
     * @param SettingsMjete $settingsMjete The SettingsMjete entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsMjete $settingsMjete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsmjete_delete', array('id' => $settingsMjete->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
