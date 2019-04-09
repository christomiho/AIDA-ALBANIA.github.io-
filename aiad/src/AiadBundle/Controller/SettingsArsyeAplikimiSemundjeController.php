<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsArsyeAplikimiSemundje;
use AiadBundle\Form\SettingsArsyeAplikimiSemundjeType;

/**
 * SettingsArsyeAplikimiSemundje controller.
 *
 * @Route("/konfigurime/arsye_aplikimi_semundje")
 */
class SettingsArsyeAplikimiSemundjeController extends Controller
{
    /**
     * Lists all SettingsArsyeAplikimiSemundje entities.
     *
     * @Route("/", name="settingsarsyeaplikimisemundje_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsArsyeAplikimiSemundjes = $em->getRepository('AiadBundle:SettingsArsyeAplikimiSemundje')->findAll();

        return $this->render('settingsarsyeaplikimisemundje/index.html.twig', array(
            'settingsArsyeAplikimiSemundjes' => $settingsArsyeAplikimiSemundjes,
        ));
    }

    /**
     * Creates a new SettingsArsyeAplikimiSemundje entity.
     *
     * @Route("/new", name="settingsarsyeaplikimisemundje_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsArsyeAplikimiSemundje = new SettingsArsyeAplikimiSemundje();
        $form = $this->createForm('AiadBundle\Form\SettingsArsyeAplikimiSemundjeType', $settingsArsyeAplikimiSemundje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsArsyeAplikimiSemundje);
            $em->flush();

            return $this->redirectToRoute('settingsarsyeaplikimisemundje_show', array('id' => $settingsArsyeAplikimiSemundje->getId()));
        }

        return $this->render('settingsarsyeaplikimisemundje/new.html.twig', array(
            'settingsArsyeAplikimiSemundje' => $settingsArsyeAplikimiSemundje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsArsyeAplikimiSemundje entity.
     *
     * @Route("/{id}", name="settingsarsyeaplikimisemundje_show")
     * @Method("GET")
     */
    public function showAction(SettingsArsyeAplikimiSemundje $settingsArsyeAplikimiSemundje)
    {
        $deleteForm = $this->createDeleteForm($settingsArsyeAplikimiSemundje);

        return $this->render('settingsarsyeaplikimisemundje/show.html.twig', array(
            'settingsArsyeAplikimiSemundje' => $settingsArsyeAplikimiSemundje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsArsyeAplikimiSemundje entity.
     *
     * @Route("/{id}/edit", name="settingsarsyeaplikimisemundje_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsArsyeAplikimiSemundje $settingsArsyeAplikimiSemundje)
    {
        $deleteForm = $this->createDeleteForm($settingsArsyeAplikimiSemundje);
        $editForm = $this->createForm('AiadBundle\Form\SettingsArsyeAplikimiSemundjeType', $settingsArsyeAplikimiSemundje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsArsyeAplikimiSemundje);
            $em->flush();

            return $this->redirectToRoute('settingsarsyeaplikimisemundje_edit', array('id' => $settingsArsyeAplikimiSemundje->getId()));
        }

        return $this->render('settingsarsyeaplikimisemundje/edit.html.twig', array(
            'settingsArsyeAplikimiSemundje' => $settingsArsyeAplikimiSemundje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsArsyeAplikimiSemundje entity.
     *
     * @Route("/{id}", name="settingsarsyeaplikimisemundje_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsArsyeAplikimiSemundje $settingsArsyeAplikimiSemundje)
    {
        $form = $this->createDeleteForm($settingsArsyeAplikimiSemundje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsArsyeAplikimiSemundje);
            $em->flush();
        }

        return $this->redirectToRoute('settingsarsyeaplikimisemundje_index');
    }

    /**
     * Creates a form to delete a SettingsArsyeAplikimiSemundje entity.
     *
     * @param SettingsArsyeAplikimiSemundje $settingsArsyeAplikimiSemundje The SettingsArsyeAplikimiSemundje entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsArsyeAplikimiSemundje $settingsArsyeAplikimiSemundje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsarsyeaplikimisemundje_delete', array('id' => $settingsArsyeAplikimiSemundje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
