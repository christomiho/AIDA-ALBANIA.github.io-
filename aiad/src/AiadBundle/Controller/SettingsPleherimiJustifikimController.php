<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsPleherimiJustifikim;
use AiadBundle\Form\SettingsPleherimiJustifikimType;

/**
 * SettingsPleherimiJustifikim controller.
 *
 * @Route("/konfigurime/pleherimi_justifikim")
 */
class SettingsPleherimiJustifikimController extends Controller
{
    /**
     * Lists all SettingsPleherimiJustifikim entities.
     *
     * @Route("/", name="settingspleherimijustifikim_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsPleherimiJustifikims = $em->getRepository('AiadBundle:SettingsPleherimiJustifikim')->findAll();

        return $this->render('settingspleherimijustifikim/index.html.twig', array(
            'settingsPleherimiJustifikims' => $settingsPleherimiJustifikims,
        ));
    }

    /**
     * Creates a new SettingsPleherimiJustifikim entity.
     *
     * @Route("/new", name="settingspleherimijustifikim_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsPleherimiJustifikim = new SettingsPleherimiJustifikim();
        $form = $this->createForm('AiadBundle\Form\SettingsPleherimiJustifikimType', $settingsPleherimiJustifikim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsPleherimiJustifikim);
            $em->flush();

            return $this->redirectToRoute('settingspleherimijustifikim_index');
        }

        return $this->render('settingspleherimijustifikim/new.html.twig', array(
            'settingsPleherimiJustifikim' => $settingsPleherimiJustifikim,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsPleherimiJustifikim entity.
     *
     * @Route("/{id}", name="settingspleherimijustifikim_show")
     * @Method("GET")
     */
    public function showAction(SettingsPleherimiJustifikim $settingsPleherimiJustifikim)
    {
        $deleteForm = $this->createDeleteForm($settingsPleherimiJustifikim);

        return $this->render('settingspleherimijustifikim/show.html.twig', array(
            'settingsPleherimiJustifikim' => $settingsPleherimiJustifikim,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsPleherimiJustifikim entity.
     *
     * @Route("/{id}/edit", name="settingspleherimijustifikim_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsPleherimiJustifikim $settingsPleherimiJustifikim)
    {
        $deleteForm = $this->createDeleteForm($settingsPleherimiJustifikim);
        $editForm = $this->createForm('AiadBundle\Form\SettingsPleherimiJustifikimType', $settingsPleherimiJustifikim);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsPleherimiJustifikim);
            $em->flush();

            return $this->redirectToRoute('settingspleherimijustifikim_index');
        }

        return $this->render('settingspleherimijustifikim/edit.html.twig', array(
            'settingsPleherimiJustifikim' => $settingsPleherimiJustifikim,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsPleherimiJustifikim entity.
     *
     * @Route("/{id}", name="settingspleherimijustifikim_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsPleherimiJustifikim $settingsPleherimiJustifikim)
    {
        $form = $this->createDeleteForm($settingsPleherimiJustifikim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsPleherimiJustifikim);
            $em->flush();
        }

        return $this->redirectToRoute('settingspleherimijustifikim_index');
    }

    /**
     * Creates a form to delete a SettingsPleherimiJustifikim entity.
     *
     * @param SettingsPleherimiJustifikim $settingsPleherimiJustifikim The SettingsPleherimiJustifikim entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsPleherimiJustifikim $settingsPleherimiJustifikim)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingspleherimijustifikim_delete', array('id' => $settingsPleherimiJustifikim->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
