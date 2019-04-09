<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsMenyraVjeljes;
use AiadBundle\Form\SettingsMenyraVjeljesType;

/**
 * SettingsMenyraVjeljes controller.
 *
 * @Route("/konfigurime/menyra_vjeljes")
 */
class SettingsMenyraVjeljesController extends Controller
{
    /**
     * Lists all SettingsMenyraVjeljes entities.
     *
     * @Route("/", name="settingsmenyravjeljes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsMenyraVjeljes = $em->getRepository('AiadBundle:SettingsMenyraVjeljes')->findAll();

        return $this->render('settingsmenyravjeljes/index.html.twig', array(
            'settingsMenyraVjeljes' => $settingsMenyraVjeljes,
        ));
    }

    /**
     * Creates a new SettingsMenyraVjeljes entity.
     *
     * @Route("/new", name="settingsmenyravjeljes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsMenyraVjelje = new SettingsMenyraVjeljes();
        $form = $this->createForm('AiadBundle\Form\SettingsMenyraVjeljesType', $settingsMenyraVjelje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMenyraVjelje);
            $em->flush();

            return $this->redirectToRoute('settingsmenyravjeljes_index');
        }

        return $this->render('settingsmenyravjeljes/new.html.twig', array(
            'settingsMenyraVjelje' => $settingsMenyraVjelje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsMenyraVjeljes entity.
     *
     * @Route("/{id}", name="settingsmenyravjeljes_show")
     * @Method("GET")
     */
    public function showAction(SettingsMenyraVjeljes $settingsMenyraVjelje)
    {
        $deleteForm = $this->createDeleteForm($settingsMenyraVjelje);

        return $this->render('settingsmenyravjeljes/show.html.twig', array(
            'settingsMenyraVjelje' => $settingsMenyraVjelje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsMenyraVjeljes entity.
     *
     * @Route("/{id}/edit", name="settingsmenyravjeljes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsMenyraVjeljes $settingsMenyraVjelje)
    {
        $deleteForm = $this->createDeleteForm($settingsMenyraVjelje);
        $editForm = $this->createForm('AiadBundle\Form\SettingsMenyraVjeljesType', $settingsMenyraVjelje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMenyraVjelje);
            $em->flush();

            return $this->redirectToRoute('settingsmenyravjeljes_index');
        }

        return $this->render('settingsmenyravjeljes/edit.html.twig', array(
            'settingsMenyraVjelje' => $settingsMenyraVjelje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsMenyraVjeljes entity.
     *
     * @Route("/{id}", name="settingsmenyravjeljes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsMenyraVjeljes $settingsMenyraVjelje)
    {
        $form = $this->createDeleteForm($settingsMenyraVjelje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsMenyraVjelje);
            $em->flush();
        }

        return $this->redirectToRoute('settingsmenyravjeljes_index');
    }

    /**
     * Creates a form to delete a SettingsMenyraVjeljes entity.
     *
     * @param SettingsMenyraVjeljes $settingsMenyraVjelje The SettingsMenyraVjeljes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsMenyraVjeljes $settingsMenyraVjelje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsmenyravjeljes_delete', array('id' => $settingsMenyraVjelje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
