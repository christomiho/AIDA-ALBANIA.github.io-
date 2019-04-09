<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsPrejardhjaFrutit;
use AiadBundle\Form\SettingsPrejardhjaFrutitType;

/**
 * SettingsPrejardhjaFrutit controller.
 *
 * @Route("/konfigurime/prejardhja_frutit")
 */
class SettingsPrejardhjaFrutitController extends Controller
{
    /**
     * Lists all SettingsPrejardhjaFrutit entities.
     *
     * @Route("/", name="settingsprejardhjafrutit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsPrejardhjaFrutits = $em->getRepository('AiadBundle:SettingsPrejardhjaFrutit')->findAll();

        return $this->render('settingsprejardhjafrutit/index.html.twig', array(
            'settingsPrejardhjaFrutits' => $settingsPrejardhjaFrutits,
        ));
    }

    /**
     * Creates a new SettingsPrejardhjaFrutit entity.
     *
     * @Route("/new", name="settingsprejardhjafrutit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsPrejardhjaFrutit = new SettingsPrejardhjaFrutit();
        $form = $this->createForm('AiadBundle\Form\SettingsPrejardhjaFrutitType', $settingsPrejardhjaFrutit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsPrejardhjaFrutit);
            $em->flush();

            return $this->redirectToRoute('settingsprejardhjafrutit_index');
        }

        return $this->render('settingsprejardhjafrutit/new.html.twig', array(
            'settingsPrejardhjaFrutit' => $settingsPrejardhjaFrutit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsPrejardhjaFrutit entity.
     *
     * @Route("/{id}", name="settingsprejardhjafrutit_show")
     * @Method("GET")
     */
    public function showAction(SettingsPrejardhjaFrutit $settingsPrejardhjaFrutit)
    {
        $deleteForm = $this->createDeleteForm($settingsPrejardhjaFrutit);

        return $this->render('settingsprejardhjafrutit/show.html.twig', array(
            'settingsPrejardhjaFrutit' => $settingsPrejardhjaFrutit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsPrejardhjaFrutit entity.
     *
     * @Route("/{id}/edit", name="settingsprejardhjafrutit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsPrejardhjaFrutit $settingsPrejardhjaFrutit)
    {
        $deleteForm = $this->createDeleteForm($settingsPrejardhjaFrutit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsPrejardhjaFrutitType', $settingsPrejardhjaFrutit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsPrejardhjaFrutit);
            $em->flush();

            return $this->redirectToRoute('settingsprejardhjafrutit_index');
        }

        return $this->render('settingsprejardhjafrutit/edit.html.twig', array(
            'settingsPrejardhjaFrutit' => $settingsPrejardhjaFrutit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsPrejardhjaFrutit entity.
     *
     * @Route("/{id}", name="settingsprejardhjafrutit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsPrejardhjaFrutit $settingsPrejardhjaFrutit)
    {
        $form = $this->createDeleteForm($settingsPrejardhjaFrutit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsPrejardhjaFrutit);
            $em->flush();
        }

        return $this->redirectToRoute('settingsprejardhjafrutit_index');
    }

    /**
     * Creates a form to delete a SettingsPrejardhjaFrutit entity.
     *
     * @param SettingsPrejardhjaFrutit $settingsPrejardhjaFrutit The SettingsPrejardhjaFrutit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsPrejardhjaFrutit $settingsPrejardhjaFrutit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsprejardhjafrutit_delete', array('id' => $settingsPrejardhjaFrutit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
