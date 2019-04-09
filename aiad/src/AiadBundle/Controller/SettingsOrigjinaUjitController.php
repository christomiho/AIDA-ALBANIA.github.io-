<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsOrigjinaUjit;
use AiadBundle\Form\SettingsOrigjinaUjitType;

/**
 * SettingsOrigjinaUjit controller.
 *
 * @Route("/konfigurime/origjina_ujit")
 */
class SettingsOrigjinaUjitController extends Controller
{
    /**
     * Lists all SettingsOrigjinaUjit entities.
     *
     * @Route("/", name="settingsorigjinaujit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsOrigjinaUjits = $em->getRepository('AiadBundle:SettingsOrigjinaUjit')->findAll();

        return $this->render('settingsorigjinaujit/index.html.twig', array(
            'settingsOrigjinaUjits' => $settingsOrigjinaUjits,
        ));
    }

    /**
     * Creates a new SettingsOrigjinaUjit entity.
     *
     * @Route("/new", name="settingsorigjinaujit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsOrigjinaUjit = new SettingsOrigjinaUjit();
        $form = $this->createForm('AiadBundle\Form\SettingsOrigjinaUjitType', $settingsOrigjinaUjit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsOrigjinaUjit);
            $em->flush();

            return $this->redirectToRoute('settingsorigjinaujit_index');
        }

        return $this->render('settingsorigjinaujit/new.html.twig', array(
            'settingsOrigjinaUjit' => $settingsOrigjinaUjit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsOrigjinaUjit entity.
     *
     * @Route("/{id}", name="settingsorigjinaujit_show")
     * @Method("GET")
     */
    public function showAction(SettingsOrigjinaUjit $settingsOrigjinaUjit)
    {
        $deleteForm = $this->createDeleteForm($settingsOrigjinaUjit);

        return $this->render('settingsorigjinaujit/show.html.twig', array(
            'settingsOrigjinaUjit' => $settingsOrigjinaUjit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsOrigjinaUjit entity.
     *
     * @Route("/{id}/edit", name="settingsorigjinaujit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsOrigjinaUjit $settingsOrigjinaUjit)
    {
        $deleteForm = $this->createDeleteForm($settingsOrigjinaUjit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsOrigjinaUjitType', $settingsOrigjinaUjit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsOrigjinaUjit);
            $em->flush();

            return $this->redirectToRoute('settingsorientimi_index');
        }

        return $this->render('settingsorigjinaujit/edit.html.twig', array(
            'settingsOrigjinaUjit' => $settingsOrigjinaUjit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsOrigjinaUjit entity.
     *
     * @Route("/{id}", name="settingsorigjinaujit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsOrigjinaUjit $settingsOrigjinaUjit)
    {
        $form = $this->createDeleteForm($settingsOrigjinaUjit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsOrigjinaUjit);
            $em->flush();
        }

        return $this->redirectToRoute('settingsorigjinaujit_index');
    }

    /**
     * Creates a form to delete a SettingsOrigjinaUjit entity.
     *
     * @param SettingsOrigjinaUjit $settingsOrigjinaUjit The SettingsOrigjinaUjit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsOrigjinaUjit $settingsOrigjinaUjit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsorigjinaujit_delete', array('id' => $settingsOrigjinaUjit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
