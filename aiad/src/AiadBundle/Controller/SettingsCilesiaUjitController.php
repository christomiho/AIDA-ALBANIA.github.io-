<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsCilesiaUjit;
use AiadBundle\Form\SettingsCilesiaUjitType;

/**
 * SettingsCilesiaUjit controller.
 *
 * @Route("/konfigurime/cilesia_ujit")
 */
class SettingsCilesiaUjitController extends Controller
{
    /**
     * Lists all SettingsCilesiaUjit entities.
     *
     * @Route("/", name="settingscilesiaujit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsCilesiaUjits = $em->getRepository('AiadBundle:SettingsCilesiaUjit')->findAll();

        return $this->render('settingscilesiaujit/index.html.twig', array(
            'settingsCilesiaUjits' => $settingsCilesiaUjits,
        ));
    }

    /**
     * Creates a new SettingsCilesiaUjit entity.
     *
     * @Route("/new", name="settingscilesiaujit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsCilesiaUjit = new SettingsCilesiaUjit();
        $form = $this->createForm('AiadBundle\Form\SettingsCilesiaUjitType', $settingsCilesiaUjit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsCilesiaUjit);
            $em->flush();

            return $this->redirectToRoute('settingscilesiaujit_index');
        }

        return $this->render('settingscilesiaujit/new.html.twig', array(
            'settingsCilesiaUjit' => $settingsCilesiaUjit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsCilesiaUjit entity.
     *
     * @Route("/{id}", name="settingscilesiaujit_show")
     * @Method("GET")
     */
    public function showAction(SettingsCilesiaUjit $settingsCilesiaUjit)
    {
        $deleteForm = $this->createDeleteForm($settingsCilesiaUjit);

        return $this->render('settingscilesiaujit/show.html.twig', array(
            'settingsCilesiaUjit' => $settingsCilesiaUjit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsCilesiaUjit entity.
     *
     * @Route("/{id}/edit", name="settingscilesiaujit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsCilesiaUjit $settingsCilesiaUjit)
    {
        $deleteForm = $this->createDeleteForm($settingsCilesiaUjit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsCilesiaUjitType', $settingsCilesiaUjit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsCilesiaUjit);
            $em->flush();

            return $this->redirectToRoute('settingscilesiaujit_index');
        }

        return $this->render('settingscilesiaujit/edit.html.twig', array(
            'settingsCilesiaUjit' => $settingsCilesiaUjit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsCilesiaUjit entity.
     *
     * @Route("/{id}", name="settingscilesiaujit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsCilesiaUjit $settingsCilesiaUjit)
    {
        $form = $this->createDeleteForm($settingsCilesiaUjit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsCilesiaUjit);
            $em->flush();
        }

        return $this->redirectToRoute('settingscilesiaujit_index');
    }

    /**
     * Creates a form to delete a SettingsCilesiaUjit entity.
     *
     * @param SettingsCilesiaUjit $settingsCilesiaUjit The SettingsCilesiaUjit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsCilesiaUjit $settingsCilesiaUjit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingscilesiaujit_delete', array('id' => $settingsCilesiaUjit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
