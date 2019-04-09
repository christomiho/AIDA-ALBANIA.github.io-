<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsMtokesSpeciamb;
use AiadBundle\Form\SettingsMtokesSpeciambType;

/**
 * SettingsMtokesSpeciamb controller.
 *
 * @Route("/konfigurime/mbulesa_tokes_specia_mbjelle")
 */
class SettingsMtokesSpeciambController extends Controller
{
    /**
     * Lists all SettingsMtokesSpeciamb entities.
     *
     * @Route("/", name="settingsmtokesspeciamb_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsMtokesSpeciambs = $em->getRepository('AiadBundle:SettingsMtokesSpeciamb')->findAll();

        return $this->render('settingsmtokesspeciamb/index.html.twig', array(
            'settingsMtokesSpeciambs' => $settingsMtokesSpeciambs,
        ));
    }

    /**
     * Creates a new SettingsMtokesSpeciamb entity.
     *
     * @Route("/new", name="settingsmtokesspeciamb_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsMtokesSpeciamb = new SettingsMtokesSpeciamb();
        $form = $this->createForm('AiadBundle\Form\SettingsMtokesSpeciambType', $settingsMtokesSpeciamb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMtokesSpeciamb);
            $em->flush();

            return $this->redirectToRoute('settingsmtokesspeciamb_index');
        }

        return $this->render('settingsmtokesspeciamb/new.html.twig', array(
            'settingsMtokesSpeciamb' => $settingsMtokesSpeciamb,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsMtokesSpeciamb entity.
     *
     * @Route("/{id}", name="settingsmtokesspeciamb_show")
     * @Method("GET")
     */
    public function showAction(SettingsMtokesSpeciamb $settingsMtokesSpeciamb)
    {
        $deleteForm = $this->createDeleteForm($settingsMtokesSpeciamb);

        return $this->render('settingsmtokesspeciamb/show.html.twig', array(
            'settingsMtokesSpeciamb' => $settingsMtokesSpeciamb,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsMtokesSpeciamb entity.
     *
     * @Route("/{id}/edit", name="settingsmtokesspeciamb_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsMtokesSpeciamb $settingsMtokesSpeciamb)
    {
        $deleteForm = $this->createDeleteForm($settingsMtokesSpeciamb);
        $editForm = $this->createForm('AiadBundle\Form\SettingsMtokesSpeciambType', $settingsMtokesSpeciamb);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMtokesSpeciamb);
            $em->flush();

            return $this->redirectToRoute('settingsmtokesspeciamb_index');
        }

        return $this->render('settingsmtokesspeciamb/edit.html.twig', array(
            'settingsMtokesSpeciamb' => $settingsMtokesSpeciamb,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsMtokesSpeciamb entity.
     *
     * @Route("/{id}", name="settingsmtokesspeciamb_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsMtokesSpeciamb $settingsMtokesSpeciamb)
    {
        $form = $this->createDeleteForm($settingsMtokesSpeciamb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsMtokesSpeciamb);
            $em->flush();
        }

        return $this->redirectToRoute('settingsmtokesspeciamb_index');
    }

    /**
     * Creates a form to delete a SettingsMtokesSpeciamb entity.
     *
     * @param SettingsMtokesSpeciamb $settingsMtokesSpeciamb The SettingsMtokesSpeciamb entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsMtokesSpeciamb $settingsMtokesSpeciamb)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsmtokesspeciamb_delete', array('id' => $settingsMtokesSpeciamb->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
