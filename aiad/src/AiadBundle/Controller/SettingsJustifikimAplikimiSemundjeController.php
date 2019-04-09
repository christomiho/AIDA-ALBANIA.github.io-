<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsJustifikimAplikimiSemundje;
use AiadBundle\Form\SettingsJustifikimAplikimiSemundjeType;

/**
 * SettingsJustifikimAplikimiSemundje controller.
 *
 * @Route("/konfigurime/justifikim_aplikimi_semundje")
 */
class SettingsJustifikimAplikimiSemundjeController extends Controller
{
    /**
     * Lists all SettingsJustifikimAplikimiSemundje entities.
     *
     * @Route("/", name="settingsjustifikimaplikimisemundje_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsJustifikimAplikimiSemundjes = $em->getRepository('AiadBundle:SettingsJustifikimAplikimiSemundje')->findAll();

        return $this->render('settingsjustifikimaplikimisemundje/index.html.twig', array(
            'settingsJustifikimAplikimiSemundjes' => $settingsJustifikimAplikimiSemundjes,
        ));
    }

    /**
     * Creates a new SettingsJustifikimAplikimiSemundje entity.
     *
     * @Route("/new", name="settingsjustifikimaplikimisemundje_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsJustifikimAplikimiSemundje = new SettingsJustifikimAplikimiSemundje();
        $form = $this->createForm('AiadBundle\Form\SettingsJustifikimAplikimiSemundjeType', $settingsJustifikimAplikimiSemundje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsJustifikimAplikimiSemundje);
            $em->flush();

            return $this->redirectToRoute('settingsjustifikimaplikimisemundje_index');
        }

        return $this->render('settingsjustifikimaplikimisemundje/new.html.twig', array(
            'settingsJustifikimAplikimiSemundje' => $settingsJustifikimAplikimiSemundje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsJustifikimAplikimiSemundje entity.
     *
     * @Route("/{id}", name="settingsjustifikimaplikimisemundje_show")
     * @Method("GET")
     */
    public function showAction(SettingsJustifikimAplikimiSemundje $settingsJustifikimAplikimiSemundje)
    {
        $deleteForm = $this->createDeleteForm($settingsJustifikimAplikimiSemundje);

        return $this->render('settingsjustifikimaplikimisemundje/show.html.twig', array(
            'settingsJustifikimAplikimiSemundje' => $settingsJustifikimAplikimiSemundje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsJustifikimAplikimiSemundje entity.
     *
     * @Route("/{id}/edit", name="settingsjustifikimaplikimisemundje_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsJustifikimAplikimiSemundje $settingsJustifikimAplikimiSemundje)
    {
        $deleteForm = $this->createDeleteForm($settingsJustifikimAplikimiSemundje);
        $editForm = $this->createForm('AiadBundle\Form\SettingsJustifikimAplikimiSemundjeType', $settingsJustifikimAplikimiSemundje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsJustifikimAplikimiSemundje);
            $em->flush();

            return $this->redirectToRoute('settingsjustifikimaplikimisemundje_index');
        }

        return $this->render('settingsjustifikimaplikimisemundje/edit.html.twig', array(
            'settingsJustifikimAplikimiSemundje' => $settingsJustifikimAplikimiSemundje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsJustifikimAplikimiSemundje entity.
     *
     * @Route("/{id}", name="settingsjustifikimaplikimisemundje_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsJustifikimAplikimiSemundje $settingsJustifikimAplikimiSemundje)
    {
        $form = $this->createDeleteForm($settingsJustifikimAplikimiSemundje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsJustifikimAplikimiSemundje);
            $em->flush();
        }

        return $this->redirectToRoute('settingsjustifikimaplikimisemundje_index');
    }

    /**
     * Creates a form to delete a SettingsJustifikimAplikimiSemundje entity.
     *
     * @param SettingsJustifikimAplikimiSemundje $settingsJustifikimAplikimiSemundje The SettingsJustifikimAplikimiSemundje entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsJustifikimAplikimiSemundje $settingsJustifikimAplikimiSemundje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsjustifikimaplikimisemundje_delete', array('id' => $settingsJustifikimAplikimiSemundje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
